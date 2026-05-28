/**
 * student.js — Eventhub Student Portal with Backend Integration
 */

// API Configuration
const API_BASE = '../php/';

// Global state
let currentUser = null;
let events = [];
let myRegistrations = [];
let registeredEventsSet = new Set();

// Page IDs
const PAGES = {
  home: 'page-home',
  events: 'page-events',
  registered: 'page-registered',
  profile: 'page-profile',
};

const NAV_BTNS = {
  home: 'btn-home',
  events: 'btn-events',
  registered: 'btn-registered',
  profile: 'btn-profile',
};

let currentPage = 'home';

// ═══════════════════════════════════════════════════════════
//  PAGE NAVIGATION
// ═══════════════════════════════════════════════════════════
function student_page(page) {
  if (!PAGES[page]) return;

  // Hide all pages
  Object.values(PAGES).forEach(id => {
    const el = document.getElementById(id);
    if (el) el.style.display = 'none';
  });

  // Remove active from all nav buttons
  Object.values(NAV_BTNS).forEach(id => {
    const btn = document.getElementById(id);
    if (btn) btn.classList.remove('active');
  });

  // Show selected page
  const target = document.getElementById(PAGES[page]);
  if (target) target.style.display = 'block';

  // Set active nav button
  const activeBtn = document.getElementById(NAV_BTNS[page]);
  if (activeBtn) activeBtn.classList.add('active');

  currentPage = page;

  // Load page data
  if (page === 'home') loadHomePage();
  if (page === 'events') loadEventsPage();
  if (page === 'registered') loadRegisteredPage();
  if (page === 'profile') loadProfilePage();

  window.scrollTo({ top: 0, behavior: 'smooth' });
}

// ═══════════════════════════════════════════════════════════
//  API CALLS
// ═══════════════════════════════════════════════════════════
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
    return await response.json();
  } catch (error) {
    console.error('API Error:', error);
    showToast('Connection error. Please try again.', 'error');
    return null;
  }
}

// ═══════════════════════════════════════════════════════════
//  TOAST NOTIFICATIONS
// ═══════════════════════════════════════════════════════════
let toastTimer = null;

function showToast(message, type = '') {
  const toast = document.getElementById('toast');
  if (!toast) return;

  toast.className = 'toast';
  toast.textContent = message;

  if (type) toast.classList.add(type);

  requestAnimationFrame(() => {
    requestAnimationFrame(() => {
      toast.classList.add('show');
    });
  });

  if (toastTimer) clearTimeout(toastTimer);
  toastTimer = setTimeout(() => {
    toast.classList.remove('show');
  }, 3000);
}

// ═══════════════════════════════════════════════════════════
//  LOAD FUNCTIONS
// ═══════════════════════════════════════════════════════════
async function loadHomePage() {
  try {
    // Load upcoming events
    const response = await fetch(API_BASE + 'events.php?action=upcoming&limit=3');
    const data = await response.json();
    
    if (data.success && data.events) {
      renderUpcomingEvents(data.events);
    }
    
    // Load user stats
    const statsResponse = await fetch(API_BASE + 'registrations.php?action=stats');
    const statsData = await statsResponse.json();
    
    if (statsData.success && statsData.stats) {
      updateStats(statsData.stats);
    }
  } catch (error) {
    console.error('Error loading home page:', error);
  }
}

function updateStats(stats) {
  const statElements = document.querySelectorAll('.sts-event-intro span:last-child');
  if (statElements.length >= 2) {
    statElements[0].textContent = stats.total || 0;
    statElements[1].textContent = stats.confirmed || 0;
  }
}

function renderUpcomingEvents(eventsList) {
  const container = document.querySelector('.sts-upcoming-events');
  if (!container) return;

  const eventCategories = {
    'Tech': 'tech',
    'Cultural': 'cultural',
    'Workshop': 'workshop',
    'Sports': 'sports'
  };

  container.innerHTML = eventsList.map(event => `
    <div class="sts-upcoming-event-card" data-event-id="${event.event_id}">
      <div class="sts-card-img-wrap">
        <img src="${event.image_url || 'https://via.placeholder.com/600x400?text=Event'}" alt="${event.title}">
        <span class="sts-card-badge ${eventCategories[event.category] || 'default'}">${event.category}</span>
      </div>
      <div class="sts-upcoming-event-intro">
        <div class="sts-upcomming-wrapper">
          <span class="ev-name">${escapeHtml(event.title)}</span>
          <div class="ev-meta">
            <i class="fa-regular fa-calendar"></i>
            <span>${formatDate(event.date)}</span>
            <span class="ev-sep">•</span>
            <span>${event.time}</span>
          </div>
          <div class="ev-meta">
            <i class="fa-solid fa-location-dot"></i>
            <span>${escapeHtml(event.venue)}</span>
          </div>
          <p class="ev-desc">${escapeHtml(event.description || 'No description available')}</p>
          <div class="ev-meta">
            <i class="fa-solid fa-users"></i>
            <span>${event.confirmed_registrations || 0} / ${event.capacity} registered</span>
          </div>
        </div>
        <button class="btn-register" onclick="registerForEvent(${event.event_id}, this)">Register Now</button>
      </div>
    </div>
  `).join('');
}

async function loadEventsPage() {
  try {
    const response = await fetch(API_BASE + 'events.php?action=list&limit=100');
    const data = await response.json();
    
    if (data.success && data.events) {
      renderAllEvents(data.events);
    }
  } catch (error) {
    console.error('Error loading events:', error);
  }
}

function renderAllEvents(eventsList) {
  const container = document.querySelector('.sts-events-grid');
  if (!container) return;

  const eventCategories = {
    'Tech': 'tech',
    'Cultural': 'cultural',
    'Workshop': 'workshop',
    'Sports': 'sports'
  };

  container.innerHTML = eventsList.map(event => `
    <div class="sts-upcoming-event-card" data-event-id="${event.event_id}">
      <div class="sts-card-img-wrap">
        <img src="${event.image_url || 'https://via.placeholder.com/600x400?text=Event'}" alt="${event.title}">
        <span class="sts-card-badge ${eventCategories[event.category] || 'default'}">${event.category}</span>
      </div>
      <div class="sts-upcoming-event-intro">
        <div class="sts-upcomming-wrapper">
          <span class="ev-name">${escapeHtml(event.title)}</span>
          <div class="ev-meta">
            <i class="fa-regular fa-calendar"></i>
            <span>${formatDate(event.date)}</span>
            <span class="ev-sep">•</span>
            <span>${event.time}</span>
          </div>
          <div class="ev-meta">
            <i class="fa-solid fa-location-dot"></i>
            <span>${escapeHtml(event.venue)}</span>
          </div>
          <p class="ev-desc">${escapeHtml(event.description || 'No description available')}</p>
          <div class="ev-meta">
            <i class="fa-solid fa-users"></i>
            <span>${event.confirmed_registrations || 0} / ${event.capacity} registered</span>
          </div>
        </div>
        <button class="btn-register" onclick="registerForEvent(${event.event_id}, this)">Register Now</button>
      </div>
    </div>
  `).join('');
}

async function loadRegisteredPage() {
  try {
    const response = await apiCall('registrations.php', { action: 'my' });
    
    if (response.success && response.registrations) {
      renderRegisteredEvents(response.registrations);
      updateRegisteredStats(response.registrations);
    }
  } catch (error) {
    console.error('Error loading registrations:', error);
  }
}

function renderRegisteredEvents(registrationsList) {
  const container = document.querySelector('.register-card-main');
  if (!container) return;

  container.innerHTML = registrationsList.map(reg => `
    <div class="register-card">
      <div class="register-card-img">
        <img src="${reg.image_url || 'https://via.placeholder.com/400x300?text=Event'}" alt="${reg.title}">
      </div>
      <div class="register-card-intro">
        <span><span>${escapeHtml(reg.title)}</span></span>
        <span><i class="fa-regular fa-calendar"></i><span>${formatDate(reg.date)}</span></span>
        <span><i class="fa-regular fa-clock"></i><span>${reg.time}</span></span>
        <span><i class="fa-solid fa-location-dot"></i><span>${escapeHtml(reg.venue)}</span></span>
        <span><i class="fa-regular fa-file-lines"></i><span>${escapeHtml(reg.description || 'No description')}</span></span>
        <span><i class="fa-solid fa-tag"></i><span>Status: <strong class="status-${reg.status}">${reg.status}</strong></span></span>
      </div>
      <div class="register-card-button">
        <button class="register-card-button-1" onclick="viewEventDetails(${reg.event_id})">View Details</button>
        ${reg.status === 'confirmed' ? `<button class="register-card-button-2" onclick="cancelRegistration(${reg.registration_id})">Cancel Registration</button>` : ''}
      </div>
    </div>
  `).join('');
}

function updateRegisteredStats(registrations) {
  const total = registrations.length;
  const upcoming = registrations.filter(r => r.date >= new Date().toISOString().split('T')[0] && r.status === 'confirmed').length;
  
  const statCards = document.querySelectorAll('.aside-card .card-1 span:last-child');
  if (statCards.length >= 2) {
    statCards[0].textContent = total;
    statCards[1].textContent = upcoming;
  }
}

async function loadProfilePage() {
  try {
    const response = await apiCall('profile.php', { action: 'get' });
    
    if (response.success && response.profile) {
      renderProfile(response.profile);
    }
  } catch (error) {
    console.error('Error loading profile:', error);
  }
}

function renderProfile(profile) {
  // Update profile name
  const profileNameElement = document.querySelector('.sts-profile-intro span:first-child');
  if (profileNameElement) profileNameElement.textContent = profile.name;
  
  // Update profile fields
  const fields = {
    'Full Name': profile.name,
    'Email Address': profile.email,
    'Department': profile.faculty || profile.department || 'Not specified',
    'Contact': profile.contact || 'Not specified',
    'Current Semester': profile.semester || 'Not specified',
    'College': profile.college || 'Not specified',
    'University': profile.university || 'Not specified',
    'Location': profile.location || profile.office_location || 'Not specified'
  };
  
  const profileGrid = document.querySelector('.profile-info-grid');
  if (profileGrid) {
    profileGrid.innerHTML = Object.entries(fields).map(([label, value]) => `
      <div class="profile-info-field">
        <label>${label}</label>
        <p>${escapeHtml(value)}</p>
      </div>
    `).join('');
  }
  
  // Update welcome message
  const welcomeSpan = document.querySelector('.sts-intro-text span');
  if (welcomeSpan) welcomeSpan.textContent = `Welcome, ${profile.name}`;
}

// ═══════════════════════════════════════════════════════════
//  EVENT ACTIONS
// ═══════════════════════════════════════════════════════════
async function registerForEvent(eventId, button) {
  try {
    const response = await apiCall('registrations.php', { 
      action: 'register',
      event_id: eventId
    });
    
    if (response.success) {
      showToast('Successfully registered for event!', 'success');
      button.textContent = 'Registered';
      button.disabled = true;
      button.style.background = '#065f46';
      
      // Reload current page to update stats
      if (currentPage === 'home') loadHomePage();
      if (currentPage === 'events') loadEventsPage();
      if (currentPage === 'registered') loadRegisteredPage();
    } else {
      showToast(response.message, 'error');
    }
  } catch (error) {
    showToast('Failed to register. Please try again.', 'error');
  }
}

async function cancelRegistration(registrationId) {
  if (!confirm('Are you sure you want to cancel this registration?')) return;
  
  try {
    const response = await apiCall('registrations.php', {
      action: 'cancel',
      registration_id: registrationId
    });
    
    if (response.success) {
      showToast('Registration cancelled successfully', 'success');
      loadRegisteredPage();
      if (currentPage === 'home') loadHomePage();
    } else {
      showToast(response.message, 'error');
    }
  } catch (error) {
    showToast('Failed to cancel registration', 'error');
  }
}

function viewEventDetails(eventId) {
  // Implement event details modal
  showToast('Event details coming soon', '');
}

// ═══════════════════════════════════════════════════════════
//  HELPER FUNCTIONS
// ═══════════════════════════════════════════════════════════
function formatDate(dateStr) {
  if (!dateStr) return '';
  const date = new Date(dateStr);
  return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
}

function escapeHtml(text) {
  if (!text) return '';
  const div = document.createElement('div');
  div.textContent = text;
  return div.innerHTML;
}

function initSearch() {
  const searchInput = document.querySelector('.header-search input');
  if (!searchInput) return;

  searchInput.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      const query = this.value.trim();
      if (query) {
        student_page('events');
        filterEventsBySearch(query);
        this.value = '';
      }
    }
  });
}

async function filterEventsBySearch(query) {
  try {
    const response = await fetch(API_BASE + `events.php?action=list&search=${encodeURIComponent(query)}`);
    const data = await response.json();
    
    if (data.success && data.events) {
      renderAllEvents(data.events);
      showToast(`Found ${data.events.length} events matching "${query}"`);
    }
  } catch (error) {
    console.error('Search error:', error);
  }
}

// ═══════════════════════════════════════════════════════════
//  CHECK LOGIN STATUS
// ═══════════════════════════════════════════════════════════
async function checkLoginStatus() {
  try {
    const response = await fetch(API_BASE + 'auth.php?action=check');
    const data = await response.json();
    
    if (!data.success) {
      // Not logged in, redirect to login
      window.location.href = 'login.html';
      return false;
    }
    
    currentUser = data.user;
    return true;
  } catch (error) {
    console.error('Session check error:', error);
    window.location.href = 'login.html';
    return false;
  }
}

// Logout function
async function logout() {
  try {
    const response = await fetch(API_BASE + 'auth.php', {
      method: 'POST',
      body: new URLSearchParams({ action: 'logout' })
    });
    const data = await response.json();
    
    if (data.success) {
      window.location.href = 'login.html';
    }
  } catch (error) {
    console.error('Logout error:', error);
    window.location.href = 'login.html';
  }
}

// ═══════════════════════════════════════════════════════════
//  INITIALIZATION
// ═══════════════════════════════════════════════════════════
document.addEventListener('DOMContentLoaded', async function() {
  // Check if user is logged in
  const loggedIn = await checkLoginStatus();
  if (!loggedIn) return;
  
  // Set up logout link
  const logoutLink = document.querySelector('header a[href="#"]');
  if (logoutLink) {
    logoutLink.onclick = (e) => {
      e.preventDefault();
      logout();
    };
  }
  
  // Show home page by default
  student_page('home');
  
  // Init search
  initSearch();
});