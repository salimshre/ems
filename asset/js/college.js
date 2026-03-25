

// ═══════════════════════════════════════════
//  STATE
// ═══════════════════════════════════════════
let events = [
    { id: 1, title: 'Annual Innovation Summit', date: '2026-10-24', time: '10:00 AM', venue: 'Main Auditorium', category: 'Tech', capacity: 300, registered: 187, desc: 'Deep dives into AI, Blockchain, and the future of the web.', image: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&auto=format&fit=crop' },
    { id: 2, title: 'Harmony Beats Concert', date: '2026-10-28', time: '06:00 PM', venue: 'Open Grounds', category: 'Cultural', capacity: 500, registered: 312, desc: 'Fusion of classical and contemporary music.', image: 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=600&auto=format&fit=crop' },
    { id: 3, title: "Founder's Pitch Deck 101", date: '2026-11-02', time: '11:30 AM', venue: 'Seminar Hall B', category: 'Workshop', capacity: 80, registered: 54, desc: 'Build a winning pitch deck for investors.', image: 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=600&auto=format&fit=crop' },
    { id: 4, title: 'Inter-College Football Cup', date: '2026-11-10', time: '09:00 AM', venue: 'Sports Complex', category: 'Sports', capacity: 200, registered: 96, desc: 'Annual inter-college football tournament.', image: '' },
];

let venues = [
    { id: 1, name: 'Main Auditorium', capacity: 400, location: 'Block A, Ground Floor', facilities: 'Projector, AC, Stage, Mic' },
    { id: 2, name: 'Open Grounds', capacity: 1000, location: 'Central Campus', facilities: 'Stage, Lighting, PA System' },
    { id: 3, name: 'Seminar Hall B', capacity: 100, location: 'Block C, 2nd Floor', facilities: 'Projector, AC, Whiteboard' },
    { id: 4, name: 'Sports Complex', capacity: 500, location: 'East Wing', facilities: 'Floodlights, Changing Rooms' },
];

let registrations = [
    { id: 1, student: 'Aarav Sharma', event: 'Annual Innovation Summit', date: '2026-09-15', status: 'Confirmed' },
    { id: 2, student: 'Priya Thapa', event: 'Harmony Beats Concert', date: '2026-09-18', status: 'Confirmed' },
    { id: 3, student: 'Rohan Bista', event: "Founder's Pitch Deck 101", date: '2026-09-20', status: 'Pending' },
    { id: 4, student: 'Sita Rai', event: 'Annual Innovation Summit', date: '2026-09-21', status: 'Confirmed' },
    { id: 5, student: 'Bikash Karki', event: 'Inter-College Football Cup', date: '2026-09-22', status: 'Confirmed' },
    { id: 6, student: 'Manisha Gurung', event: 'Harmony Beats Concert', date: '2026-09-23', status: 'Cancelled' },
];

let nextEventId = 5;
let nextVenueId = 5;
let editingEventId = null;
let editingVenueId = null;

// ═══════════════════════════════════════════
//  NAV / PAGE TOGGLE
// ═══════════════════════════════════════════
function showAdminPage(page) {
    document.querySelectorAll('.admin-page').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.nav-btn').forEach(b => b.classList.remove('active'));
    document.getElementById('page-' + page).classList.add('active');
    document.getElementById('nav-' + page).classList.add('active');
}

// ═══════════════════════════════════════════
//  STATS
// ═══════════════════════════════════════════
function updateStats() {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('totalEvents').textContent = events.length;
    document.getElementById('totalRegistrations').textContent = registrations.length;
    document.getElementById('upcomingEvents').textContent = events.filter(e => e.date >= today).length;
    document.getElementById('totalVenues').textContent = venues.length;
}

// ═══════════════════════════════════════════
//  RECENT EVENTS TABLE (Overview)
// ═══════════════════════════════════════════
function renderRecentEvents() {
    const tbody = document.getElementById('recentEventsBody');
    const recent = [...events].sort((a, b) => b.id - a.id).slice(0, 5);
    tbody.innerHTML = recent.map(e => `
        <tr>
            <td><strong>${e.title}</strong></td>
            <td>${formatDate(e.date)}</td>
            <td><span class="badge badge-${e.category.toLowerCase()}">${e.category}</span></td>
            <td>${e.registered} / ${e.capacity}</td>
        </tr>`).join('');
}

// ═══════════════════════════════════════════
//  EVENTS TABLE
// ═══════════════════════════════════════════
function renderEventsTable() {
    const tbody = document.getElementById('eventsTableBody');
    tbody.innerHTML = events.map(e => `
        <tr>
            <td>
                <div style="display:flex;align-items:center;gap:10px;">
                    ${e.image ? `<img src="${e.image}" style="width:40px;height:40px;border-radius:8px;object-fit:cover;flex-shrink:0;">` : `<div style="width:40px;height:40px;border-radius:8px;background:#eef2ff;display:flex;align-items:center;justify-content:center;color:var(--primary);flex-shrink:0;"><i class="fa-regular fa-image"></i></div>`}
                    <strong>${e.title}</strong>
                </div>
            </td>
            <td>${formatDate(e.date)}</td>
            <td>${e.time}</td>
            <td>${e.venue}</td>
            <td><span class="badge badge-${e.category.toLowerCase()}">${e.category}</span></td>
            <td>${e.capacity}</td>
            <td>${e.registered}</td>
            <td class="action-icons">
                <i class="fa-solid fa-pen-to-square" title="Edit" onclick="editEvent(${e.id})"></i>
                <i class="fa-solid fa-trash-alt" title="Delete" onclick="deleteEvent(${e.id})"></i>
            </td>
        </tr>`).join('');
}

// ═══════════════════════════════════════════
//  REGISTRATIONS TABLE
// ═══════════════════════════════════════════
function renderRegistrationsTable(filter = '') {
    const tbody = document.getElementById('registrationsTableBody');
    const filtered = filter
        ? registrations.filter(r => r.student.toLowerCase().includes(filter) || r.event.toLowerCase().includes(filter))
        : registrations;
    tbody.innerHTML = filtered.map(r => `
        <tr>
            <td><strong>${r.student}</strong></td>
            <td>${r.event}</td>
            <td>${formatDate(r.date)}</td>
            <td><span class="badge badge-status-${r.status.toLowerCase()}">${r.status}</span></td>
            <td>
                ${r.status !== 'Confirmed' ? `<button class="btn-primary btn-sm" onclick="updateRegStatus(${r.id},'Confirmed')">Confirm</button>` : ''}
                ${r.status !== 'Cancelled' ? `<button class="btn-danger btn-sm" onclick="updateRegStatus(${r.id},'Cancelled')">Cancel</button>` : ''}
            </td>
        </tr>`).join('');
}

function updateRegStatus(id, status) {
    const reg = registrations.find(r => r.id === id);
    if (reg) { reg.status = status; renderRegistrationsTable(); showToast(`Registration ${status.toLowerCase()}`, 'success'); }
}

// ═══════════════════════════════════════════
//  VENUES TABLE
// ═══════════════════════════════════════════
function renderVenuesTable() {
    const tbody = document.getElementById('venuesTableBody');
    tbody.innerHTML = venues.map(v => `
        <tr>
            <td><strong>${v.name}</strong></td>
            <td>${v.capacity}</td>
            <td>${v.location}</td>
            <td>${v.facilities}</td>
            <td class="action-icons">
                <i class="fa-solid fa-pen-to-square" title="Edit" onclick="editVenue(${v.id})"></i>
                <i class="fa-solid fa-trash-alt" title="Delete" onclick="deleteVenue(${v.id})"></i>
            </td>
        </tr>`).join('');
}

// ═══════════════════════════════════════════
//  EVENT MODAL
// ═══════════════════════════════════════════
function openEventModal(prefillId = null) {
    editingEventId = prefillId;
    const form = document.getElementById('eventForm');
    form.reset();
    removeImage();

    if (prefillId) {
        const e = events.find(ev => ev.id === prefillId);
        document.getElementById('eventTitle').value = e.title;
        document.getElementById('eventDate').value = e.date;
        document.getElementById('eventTime').value = e.time;
        document.getElementById('eventVenue').value = e.venue;
        document.getElementById('eventCategory').value = e.category;
        document.getElementById('eventCapacity').value = e.capacity;
        document.getElementById('eventDesc').value = e.desc;
        if (e.image) {
            const preview = document.getElementById('imagePreview');
            const placeholder = document.getElementById('imageUploadPlaceholder');
            const removeBtn = document.getElementById('removeImageBtn');
            const area = document.getElementById('imageUploadArea');
            preview.src = e.image;
            preview.style.display = 'block';
            placeholder.style.display = 'none';
            removeBtn.style.display = 'inline-flex';
            area.classList.add('has-image');
        }
        document.querySelector('#eventModal .modal-header h3').textContent = 'Edit Event';
    } else {
        document.querySelector('#eventModal .modal-header h3').textContent = 'Create Event';
    }
    document.getElementById('eventModal').classList.add('active');
}

function closeEventModal() {
    document.getElementById('eventModal').classList.remove('active');
    document.getElementById('eventForm').reset();
    removeImage();
    editingEventId = null;
}

function editEvent(id) { openEventModal(id); }

function deleteEvent(id) {
    if (!confirm('Delete this event?')) return;
    events = events.filter(e => e.id !== id);
    renderAll();
    showToast('Event deleted', 'success');
}

document.getElementById('eventForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const imagePreview = document.getElementById('imagePreview');
    const imageVal = imagePreview.style.display !== 'none' ? imagePreview.src : '';

    const data = {
        title: document.getElementById('eventTitle').value.trim(),
        date: document.getElementById('eventDate').value,
        time: document.getElementById('eventTime').value.trim(),
        venue: document.getElementById('eventVenue').value.trim(),
        category: document.getElementById('eventCategory').value,
        capacity: parseInt(document.getElementById('eventCapacity').value),
        desc: document.getElementById('eventDesc').value.trim(),
        image: imageVal,
    };

    if (editingEventId) {
        const idx = events.findIndex(ev => ev.id === editingEventId);
        events[idx] = { ...events[idx], ...data };
        showToast('Event updated', 'success');
    } else {
        events.push({ id: nextEventId++, registered: 0, ...data });
        showToast('Event created', 'success');
    }
    closeEventModal();
    renderAll();
});

// ═══════════════════════════════════════════
//  VENUE MODAL
// ═══════════════════════════════════════════
function openVenueModal(prefillId = null) {
    editingVenueId = prefillId;
    document.getElementById('venueForm').reset();
    if (prefillId) {
        const v = venues.find(vn => vn.id === prefillId);
        document.getElementById('venueName').value = v.name;
        document.getElementById('venueCapacity').value = v.capacity;
        document.getElementById('venueLocation').value = v.location;
        document.getElementById('venueFacilities').value = v.facilities;
        document.querySelector('#venueModal .modal-header h3').textContent = 'Edit Venue';
    } else {
        document.querySelector('#venueModal .modal-header h3').textContent = 'Add Venue';
    }
    document.getElementById('venueModal').classList.add('active');
}

function closeVenueModal() {
    document.getElementById('venueModal').classList.remove('active');
    editingVenueId = null;
}

function editVenue(id) { openVenueModal(id); }

function deleteVenue(id) {
    if (!confirm('Delete this venue?')) return;
    venues = venues.filter(v => v.id !== id);
    renderAll();
    showToast('Venue deleted', 'success');
}

document.getElementById('venueForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const data = {
        name: document.getElementById('venueName').value.trim(),
        capacity: parseInt(document.getElementById('venueCapacity').value),
        location: document.getElementById('venueLocation').value.trim(),
        facilities: document.getElementById('venueFacilities').value.trim(),
    };
    if (editingVenueId) {
        const idx = venues.findIndex(v => v.id === editingVenueId);
        venues[idx] = { ...venues[idx], ...data };
        showToast('Venue updated', 'success');
    } else {
        venues.push({ id: nextVenueId++, ...data });
        showToast('Venue added', 'success');
    }
    closeVenueModal();
    renderAll();
});

// Close modals on overlay click
document.getElementById('eventModal').addEventListener('click', function (e) { if (e.target === this) closeEventModal(); });
document.getElementById('venueModal').addEventListener('click', function (e) { if (e.target === this) closeVenueModal(); });

// ═══════════════════════════════════════════
//  SEARCH
// ═══════════════════════════════════════════
document.getElementById('searchReg').addEventListener('input', function () {
    renderRegistrationsTable(this.value.toLowerCase().trim());
});

// ═══════════════════════════════════════════
//  IMAGE UPLOAD
// ═══════════════════════════════════════════
function handleImageUpload(event) {
    const file = event.target.files[0];
    if (!file) return;
    if (file.size > 5 * 1024 * 1024) { showToast('Image must be under 5MB', 'error'); return; }
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
//  HELPERS
// ═══════════════════════════════════════════
function formatDate(d) {
    if (!d) return '';
    const [y, m, day] = d.split('-');
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    return `${months[parseInt(m) - 1]} ${parseInt(day)}, ${y}`;
}

function renderAll() {
    updateStats();
    renderRecentEvents();
    renderEventsTable();
    renderRegistrationsTable();
    renderVenuesTable();
}

// ═══════════════════════════════════════════
//  INIT
// ═══════════════════════════════════════════
document.addEventListener('DOMContentLoaded', renderAll);
