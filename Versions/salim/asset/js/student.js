/**
 * student.js — Eventhub Student Portal
 * Handles page navigation, active states, toast notifications, and search.
 */

// ── PAGE IDs ──────────────────────────────────────────────────────────────────
const PAGES = {
  home:       'page-home',
  events:     'page-events',
  registered: 'page-registered',
  profile:    'page-profile',
};

const NAV_BTNS = {
  home:       'btn-home',
  events:     'btn-events',
  registered: 'btn-registered',
  profile:    'btn-profile',
};

let currentPage = 'home';

// ── PAGE NAVIGATION ───────────────────────────────────────────────────────────
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

  // Scroll to top smoothly
  window.scrollTo({ top: 0, behavior: 'smooth' });
}

// ── TOAST NOTIFICATIONS ───────────────────────────────────────────────────────
let toastTimer = null;

function showToast(message, type = '') {
  const toast = document.getElementById('toast');
  if (!toast) return;

  // Reset
  toast.className = 'toast';
  toast.textContent = message;

  // Add type class if provided
  if (type) toast.classList.add(type);

  // Show
  requestAnimationFrame(() => {
    requestAnimationFrame(() => {
      toast.classList.add('show');
    });
  });

  // Auto-hide after 3s
  if (toastTimer) clearTimeout(toastTimer);
  toastTimer = setTimeout(() => {
    toast.classList.remove('show');
  }, 3000);
}

// ── SEARCH ────────────────────────────────────────────────────────────────────
function initSearch() {
  const searchInput = document.querySelector('.header-search input');
  if (!searchInput) return;

  searchInput.addEventListener('keydown', function (e) {
    if (e.key === 'Enter') {
      const query = this.value.trim();
      if (query.length > 0) {
        student_page('events');
        showToast('Showing results for: ' + query);
        this.value = '';
      }
    }
  });
}

// ── REGISTER BUTTON TRACKING ──────────────────────────────────────────────────
// Tracks which events the user has registered for in this session
const registeredEvents = new Set();

function handleRegister(btn, eventName) {
  if (registeredEvents.has(eventName)) {
    showToast('You are already registered for this event.', '');
    return;
  }
  registeredEvents.add(eventName);
  btn.textContent = 'Registered';
  btn.style.background = '#065f46';
  btn.style.cursor = 'default';
  btn.disabled = true;
  showToast('Registered for ' + eventName + '!', 'success');
}

// ── INIT ──────────────────────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', function () {
  // Show home page by default
  student_page('home');

  // Init search
  initSearch();

  // Attach register button tracking to all Register Now buttons
  document.querySelectorAll('.btn-register').forEach(function (btn) {
    const card = btn.closest('.sts-upcoming-event-card');
    if (!card) return;
    const eventName = card.querySelector('.ev-name')
      ? card.querySelector('.ev-name').textContent.trim()
      : 'this event';

    // Replace inline onclick with tracked version
    btn.removeAttribute('onclick');
    btn.addEventListener('click', function () {
      handleRegister(btn, eventName);
    });
  });
});