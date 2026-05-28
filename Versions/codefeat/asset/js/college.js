// ═══════════════════════════════════════════
//  STATE & API CONFIGURATION
// ═══════════════════════════════════════════
const API_BASE = '../php/';
let editingEventId = null;
let editingVenueId = null;

// ═══════════════════════════════════════════
//  API CALL HELPER
// ═══════════════════════════════════════════
async function apiCall(endpoint, data = {}) {
    const formData = new FormData();
    for (let key in data) {
        formData.append(key, data[key]);
    }

    try {
        const response = await fetch(API_BASE + endpoint, {
            method: 'POST',
            body: formData
        });
        const result = await response.json();
        return result;
    } catch (error) {
        console.error('API Error:', error);
        showToast('Connection error: ' + error.message, 'error');
        return null;
    }
}

async function apiGet(endpoint, params = {}) {
    const queryString = new URLSearchParams(params).toString();
    const url = API_BASE + endpoint + (queryString ? '?' + queryString : '');
    
    try {
        const response = await fetch(url);
        const result = await response.json();
        return result;
    } catch (error) {
        console.error('API Error:', error);
        showToast('Connection error: ' + error.message, 'error');
        return null;
    }
}

// ═══════════════════════════════════════════
//  LOAD DATA FROM BACKEND
// ═══════════════════════════════════════════
async function loadEvents() {
    const result = await apiGet('events.php', { action: 'list' });
    if (result && result.success) {
        return result.events;
    }
    return [];
}

async function loadVenues() {
    const result = await apiGet('venues.php', { action: 'list' });
    if (result && result.success) {
        return result.venues;
    }
    return [];
}

async function loadRegistrations() {
    const result = await apiGet('registrations.php', { action: 'list' });
    if (result && result.success) {
        return result.registrations;
    }
    return [];
}

async function loadStats() {
    const result = await apiGet('dashboard.php', { action: 'stats' });
    if (result && result.success) {
        return result.stats;
    }
    return null;
}

// ═══════════════════════════════════════════
//  NAV / PAGE TOGGLE
// ═══════════════════════════════════════════
function showAdminPage(page) {
    document.querySelectorAll('.admin-page').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.nav-btn').forEach(b => b.classList.remove('active'));
    document.getElementById('page-' + page).classList.add('active');
    document.getElementById('nav-' + page).classList.add('active');
    
    // Load data when switching pages
    if (page === 'overview') renderOverview();
    if (page === 'events') renderEventsTable();
    if (page === 'registrations') renderRegistrationsTable();
    if (page === 'venues') renderVenuesTable();
}

// ═══════════════════════════════════════════
//  OVERVIEW PAGE
// ═══════════════════════════════════════════
async function renderOverview() {
    const stats = await loadStats();
    if (stats) {
        document.getElementById('totalEvents').textContent = stats.total_events || 0;
        document.getElementById('totalRegistrations').textContent = stats.total_registrations || 0;
        document.getElementById('upcomingEvents').textContent = stats.upcoming_events || 0;
        document.getElementById('totalVenues').textContent = stats.total_venues || 0;
        
        // Render recent events
        if (stats.recent_events) {
            renderRecentEvents(stats.recent_events);
        }
    }
}

function renderRecentEvents(eventsList) {
    const tbody = document.getElementById('recentEventsBody');
    if (!tbody) return;
    
    tbody.innerHTML = eventsList.map(e => `
        <tr>
            <td><strong>${escapeHtml(e.title)}</strong></td>
            <td>${formatDate(e.date)}</td>
            <td><span class="badge badge-${e.category.toLowerCase()}">${e.category}</span></td>
            <td>${e.registered || 0} / ${e.capacity}</td>
        </tr>
    `).join('');
}

// ═══════════════════════════════════════════
//  EVENTS TABLE
// ═══════════════════════════════════════════
async function renderEventsTable() {
    const events = await loadEvents();
    const tbody = document.getElementById('eventsTableBody');
    if (!tbody) return;
    
    tbody.innerHTML = events.map(e => `
        <tr>
            <td>
                <div style="display:flex;align-items:center;gap:10px;">
                    ${e.image_url ? `<img src="${e.image_url}" style="width:40px;height:40px;border-radius:8px;object-fit:cover;flex-shrink:0;">` : `<div style="width:40px;height:40px;border-radius:8px;background:#eef2ff;display:flex;align-items:center;justify-content:center;color:var(--primary);flex-shrink:0;"><i class="fa-regular fa-image"></i></div>`}
                    <strong>${escapeHtml(e.title)}</strong>
                </div>
            </td>
            <td>${formatDate(e.date)}</td>
            <td>${e.time}</td>
            <td>${escapeHtml(e.venue)}</td>
            <td><span class="badge badge-${e.category.toLowerCase()}">${e.category}</span></td>
            <td>${e.capacity}</td>
            <td>${e.confirmed_registrations || e.registered || 0}</td>
            <td class="action-icons">
                <i class="fa-solid fa-pen-to-square" title="Edit" onclick="editEvent(${e.event_id})"></i>
                <i class="fa-solid fa-trash-alt" title="Delete" onclick="deleteEvent(${e.event_id})"></i>
            </td>
        </tr>
    `).join('');
}

// ═══════════════════════════════════════════
//  REGISTRATIONS TABLE
// ═══════════════════════════════════════════
let currentRegistrations = [];

async function renderRegistrationsTable(filter = '') {
    const registrations = await loadRegistrations();
    currentRegistrations = registrations;
    
    const filtered = filter
        ? registrations.filter(r => 
            r.student_name.toLowerCase().includes(filter) || 
            r.event_title.toLowerCase().includes(filter)
          )
        : registrations;
    
    const tbody = document.getElementById('registrationsTableBody');
    if (!tbody) return;
    
    tbody.innerHTML = filtered.map(r => `
        <tr>
            <td><strong>${escapeHtml(r.student_name)}</strong></td>
            <td>${escapeHtml(r.event_title)}</td>
            <td>${formatDate(r.registration_date)}</td>
            <td><span class="badge badge-status-${r.status.toLowerCase()}">${r.status}</span></td>
            <td>
                ${r.status !== 'confirmed' ? `<button class="btn-primary btn-sm" onclick="updateRegStatus(${r.registration_id},'confirmed')">Confirm</button>` : ''}
                ${r.status !== 'cancelled' ? `<button class="btn-danger btn-sm" onclick="updateRegStatus(${r.registration_id},'cancelled')">Cancel</button>` : ''}
                ${r.status !== 'attended' ? `<button class="btn-primary btn-sm" onclick="updateRegStatus(${r.registration_id},'attended')">Mark Attended</button>` : ''}
            </td>
        </tr>
    `).join('');
}

async function updateRegStatus(registrationId, status) {
    const result = await apiCall('registrations.php', {
        action: 'update',
        registration_id: registrationId,
        status: status
    });
    
    if (result && result.success) {
        showToast(`Registration ${status}`, 'success');
        renderRegistrationsTable();
        if (document.getElementById('page-overview').classList.contains('active')) {
            renderOverview();
        }
    } else {
        showToast(result?.message || 'Failed to update status', 'error');
    }
}

// ═══════════════════════════════════════════
//  VENUES TABLE
// ═══════════════════════════════════════════
async function renderVenuesTable() {
    const venues = await loadVenues();
    const tbody = document.getElementById('venuesTableBody');
    if (!tbody) return;
    
    tbody.innerHTML = venues.map(v => `
        <tr>
            <td><strong>${escapeHtml(v.name)}</strong></td>
            <td>${v.capacity}</td>
            <td>${escapeHtml(v.location || 'N/A')}</td>
            <td>${escapeHtml(v.facilities || 'N/A')}</td>
            <td class="action-icons">
                <i class="fa-solid fa-pen-to-square" title="Edit" onclick="editVenue(${v.venue_id})"></i>
                <i class="fa-solid fa-trash-alt" title="Delete" onclick="deleteVenue(${v.venue_id})"></i>
            </td>
        </tr>
    `).join('');
}

// ═══════════════════════════════════════════
//  EVENT CRUD OPERATIONS
// ═══════════════════════════════════════════
function openEventModal(prefillId = null) {
    editingEventId = prefillId;
    const form = document.getElementById('eventForm');
    form.reset();
    removeImage();

    if (prefillId) {
        // Load event data from API
        loadEventData(prefillId);
        document.querySelector('#eventModal .modal-header h3').textContent = 'Edit Event';
    } else {
        document.querySelector('#eventModal .modal-header h3').textContent = 'Create Event';
    }
    document.getElementById('eventModal').classList.add('active');
}

async function loadEventData(eventId) {
    const result = await apiGet('events.php', { action: 'get', id: eventId });
    if (result && result.success && result.event) {
        const e = result.event;
        document.getElementById('eventTitle').value = e.title;
        document.getElementById('eventDate').value = e.date;
        document.getElementById('eventTime').value = e.time;
        document.getElementById('eventVenue').value = e.venue;
        document.getElementById('eventCategory').value = e.category;
        document.getElementById('eventCapacity').value = e.capacity;
        document.getElementById('eventDesc').value = e.description || '';
        
        if (e.image_url) {
            const preview = document.getElementById('imagePreview');
            const placeholder = document.getElementById('imageUploadPlaceholder');
            const removeBtn = document.getElementById('removeImageBtn');
            const area = document.getElementById('imageUploadArea');
            preview.src = e.image_url;
            preview.style.display = 'block';
            placeholder.style.display = 'none';
            removeBtn.style.display = 'inline-flex';
            area.classList.add('has-image');
        }
    }
}

function closeEventModal() {
    document.getElementById('eventModal').classList.remove('active');
    document.getElementById('eventForm').reset();
    removeImage();
    editingEventId = null;
}

function editEvent(id) { 
    openEventModal(id); 
}

async function deleteEvent(id) {
    if (!confirm('Delete this event? This will also delete all registrations for this event.')) return;
    
    const result = await apiCall('events.php', {
        action: 'delete',
        id: id
    });
    
    if (result && result.success) {
        showToast('Event deleted successfully', 'success');
        renderEventsTable();
        renderOverview();
    } else {
        showToast(result?.message || 'Failed to delete event', 'error');
    }
}

document.getElementById('eventForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    
    const imagePreview = document.getElementById('imagePreview');
    const imageVal = imagePreview.style.display !== 'none' ? imagePreview.src : '';
    
    const data = {
        title: document.getElementById('eventTitle').value.trim(),
        description: document.getElementById('eventDesc').value.trim(),
        date: document.getElementById('eventDate').value,
        time: document.getElementById('eventTime').value.trim(),
        venue: document.getElementById('eventVenue').value.trim(),
        category: document.getElementById('eventCategory').value,
        capacity: parseInt(document.getElementById('eventCapacity').value),
        image: imageVal,
    };
    
    let result;
    if (editingEventId) {
        result = await apiCall('events.php', {
            action: 'update',
            id: editingEventId,
            ...data
        });
    } else {
        result = await apiCall('events.php', {
            action: 'create',
            ...data
        });
    }
    
    if (result && result.success) {
        showToast(editingEventId ? 'Event updated' : 'Event created', 'success');
        closeEventModal();
        renderEventsTable();
        renderOverview();
    } else {
        showToast(result?.message || 'Operation failed', 'error');
    }
});

// ═══════════════════════════════════════════
//  VENUE CRUD OPERATIONS
// ═══════════════════════════════════════════
function openVenueModal(prefillId = null) {
    editingVenueId = prefillId;
    document.getElementById('venueForm').reset();
    
    if (prefillId) {
        loadVenueData(prefillId);
        document.querySelector('#venueModal .modal-header h3').textContent = 'Edit Venue';
    } else {
        document.querySelector('#venueModal .modal-header h3').textContent = 'Add Venue';
    }
    document.getElementById('venueModal').classList.add('active');
}

async function loadVenueData(venueId) {
    const result = await apiGet('venues.php', { action: 'get', id: venueId });
    if (result && result.success && result.venue) {
        const v = result.venue;
        document.getElementById('venueName').value = v.name;
        document.getElementById('venueCapacity').value = v.capacity;
        document.getElementById('venueLocation').value = v.location || '';
        document.getElementById('venueFacilities').value = v.facilities || '';
    }
}

function closeVenueModal() {
    document.getElementById('venueModal').classList.remove('active');
    editingVenueId = null;
}

function editVenue(id) { 
    openVenueModal(id); 
}

async function deleteVenue(id) {
    if (!confirm('Delete this venue?')) return;
    
    const result = await apiCall('venues.php', {
        action: 'delete',
        id: id
    });
    
    if (result && result.success) {
        showToast('Venue deleted', 'success');
        renderVenuesTable();
        renderOverview();
    } else {
        showToast(result?.message || 'Failed to delete venue', 'error');
    }
}

document.getElementById('venueForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    
    const data = {
        name: document.getElementById('venueName').value.trim(),
        capacity: parseInt(document.getElementById('venueCapacity').value),
        location: document.getElementById('venueLocation').value.trim(),
        facilities: document.getElementById('venueFacilities').value.trim(),
    };
    
    let result;
    if (editingVenueId) {
        result = await apiCall('venues.php', {
            action: 'update',
            id: editingVenueId,
            ...data
        });
    } else {
        result = await apiCall('venues.php', {
            action: 'create',
            ...data
        });
    }
    
    if (result && result.success) {
        showToast(editingVenueId ? 'Venue updated' : 'Venue added', 'success');
        closeVenueModal();
        renderVenuesTable();
        renderOverview();
    } else {
        showToast(result?.message || 'Operation failed', 'error');
    }
});

// ═══════════════════════════════════════════
//  SEARCH
// ═══════════════════════════════════════════
document.getElementById('searchReg')?.addEventListener('input', function () {
    renderRegistrationsTable(this.value.toLowerCase().trim());
});

// ═══════════════════════════════════════════
//  IMAGE UPLOAD
// ═══════════════════════════════════════════
function handleImageUpload(event) {
    const file = event.target.files[0];
    if (!file) return;
    if (file.size > 5 * 1024 * 1024) { 
        showToast('Image must be under 5MB', 'error'); 
        return; 
    }
    const reader = new FileReader();
    reader.onload = function (e) {
        const preview = document.getElementById('imagePreview');
        const placeholder = document.getElementById('imageUploadPlaceholder');
        const removeBtn = document.getElementById('removeImageBtn');
        const area = document.getElementById('imageUploadArea');
        preview.src = e.target.result;
        preview.style.display = 'block';
        placeholder.style.display = 'none';
        removeBtn.style.display = 'inline-flex';
        area.classList.add('has-image');
    };
    reader.readAsDataURL(file);
}

function removeImage() {
    const preview = document.getElementById('imagePreview');
    const placeholder = document.getElementById('imageUploadPlaceholder');
    const removeBtn = document.getElementById('removeImageBtn');
    const area = document.getElementById('imageUploadArea');
    const input = document.getElementById('eventImage');
    if (!preview) return;
    preview.src = '';
    preview.style.display = 'none';
    placeholder.style.display = 'flex';
    removeBtn.style.display = 'none';
    area.classList.remove('has-image');
    input.value = '';
}

// ═══════════════════════════════════════════
//  TOAST
// ═══════════════════════════════════════════
function showToast(msg, type = '') {
    const toast = document.getElementById('toast');
    toast.textContent = msg;
    toast.className = 'toast show' + (type ? ' ' + type : '');
    clearTimeout(toast._timer);
    toast._timer = setTimeout(() => toast.classList.remove('show'), 3000);
}

// ═══════════════════════════════════════════
//  CHECK LOGIN STATUS
// ═══════════════════════════════════════════
async function checkAdminLogin() {
    const result = await apiGet('auth.php', { action: 'check' });
    
    if (!result || !result.success || result.user?.role !== 'admin') {
        // Not logged in as admin, redirect to login
        window.location.href = 'login.html';
        return false;
    }
    
    // Update admin name in header
    const adminInfoSpan = document.querySelector('.admin-info span');
    if (adminInfoSpan && result.user?.name) {
        adminInfoSpan.textContent = result.user.name;
    }
    
    return true;
}

// Logout function
async function logout() {
    const result = await apiCall('auth.php', { action: 'logout' });
    if (result && result.success) {
        window.location.href = 'login.html';
    }
}

// ═══════════════════════════════════════════
//  HELPERS
// ═══════════════════════════════════════════
function formatDate(d) {
    if (!d) return '';
    const date = new Date(d);
    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
}

function escapeHtml(text) {
    if (!text) return '';
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

// ═══════════════════════════════════════════
//  INIT
// ═══════════════════════════════════════════
document.addEventListener('DOMContentLoaded', async function() {
    // Check if admin is logged in
    const loggedIn = await checkAdminLogin();
    if (!loggedIn) return;
    
    // Setup logout link
    const logoutLink = document.querySelector('.logout-link');
    if (logoutLink) {
        logoutLink.onclick = (e) => {
            e.preventDefault();
            logout();
        };
    }
    
    // Load overview page by default
    renderOverview();
    
    // Close modals on overlay click
    document.getElementById('eventModal')?.addEventListener('click', function (e) { 
        if (e.target === this) closeEventModal(); 
    });
    document.getElementById('venueModal')?.addEventListener('click', function (e) { 
        if (e.target === this) closeVenueModal(); 
    });
});