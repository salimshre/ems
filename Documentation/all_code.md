inside my asset folder i have the following folder. js,pages,php,css
inside js folder i have
student.js
college.js
home.js

inside pages folder i have
admin.html
database.sql
login.html
sign.html
student

inside php folder i have
auth.php
dashboard.php
events.php
regisstrations.php
venues.php

inside of /php/config folder we have
db.php

inside css folder we have
college.css
home.css
login.css
sign.css
stsevent.css
stshome.css
stsproffile.css
stsreg.css



help me to include all in one file like in plan text format with each file and folder lable so i can copy paste and save on .
just don't make any changes on it. and give me the code as it is.


# 📁 Project Files – EventHub

Below are all files with their exact contents.  
Copy each block and save it in the corresponding folder structure.

---

## 📄 `/index.html`

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="asset/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e3a8a',
                        secondary: '#f59e0b',
                        accent: '#10b981',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-white">
    <header>
        <nav>
            <span class="text-xl font-bold text-primary">EventHub</span>
            <ul>
                <li><a href="#hero" class="active nav-bar-link">Home</a></li>
                <li><a href="#events" class="nav-bar-link">Events</a></li>
                <li><a href="#about" class="nav-bar-link">About</a></li>
                <li><a href="#contact" class="nav-bar-link">Contact</a></li>
            </ul>
            <div class="nav-search">
                <i class="fa fa-search"></i>
                <a href="asset/pages/login.html">Get started</a>
            </div>
        </nav>
    </header>

    <!-- HERO -->
    <div class="hero" id="hero">
        <div>
            <span>
                <i class="fa fa-star"></i>
                next-gen management
            </span>
            <div class="hero-intro">
                Manage College
                <span>Events</span>
                Effortlessly.
            </div>
            <p>
                The all-in-one platform to browse events, register instantly, and mark attendance with digital QR codes.
                Professionalism meets campus life.
            </p>
            <div class="hero-button">
                <a href="#events" class="border border-black p-2 rounded-full bg-primary/30 hover:bg-black hover:text-white">View
                    Events</a>
                <a href="asset/pages/login.html" class="border border-black p-2 rounded-full w-20 hover:bg-black hover:text-white">login</a>
            </div>
        </div>
        <div class="hero-image">
            <!-- Top-left card: Instant Check-in -->
            <div class="hero-image-card">
                <div class="hero-image-card-start">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <span>Instant Check-in</span>
                <p>Seamless QR scanning</p>
            </div>

            <!-- Center dark card -->
            <div class="hero-image-1">
                STUDENT
                <span>EVENTS</span>
            </div>

            <!-- Bottom-right card: Real-time Analytics -->
            <div class="hero-image-card">
                <div class="hero-image-card-start">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <span>Real-time Analytics</span>
                <p>Live attendance tracking</p>
            </div>
        </div>
    </div>

    <!-- ABOUT / FEATURE CARDS -->
    <section id="about">
        <div class="about-wrapper">
            <div class="about-cards">
                <i class="fa fa-qrcode"></i>
                <span>QR Attendance</span>
                <p>Swift check-in with unique QR codes for every participant, directly linked to your college ID.</p>
            </div>
            <div class="about-cards">
                <i class="fa fa-user-plus"></i>
                <span>Easy Registration</span>
                <p>One-click event sign-ups, linked directly to your college ID.</p>
            </div>
            <div class="about-cards">
                <i class="fa fa-table-columns"></i>
                <span>Organizer Dashboard</span>
                <p>Full control over event creation, management, and analytics.</p>
            </div>
            <div class="about-cards">
                <i class="fa fa-bell"></i>
                <span>Instant Updates</span>
                <p>Real-time alerts for venue changes or event schedule shifts.</p>
            </div>
        </div>
    </section>

    <!-- EVENTS SECTION -->
    <section id="events">
        <div class="event-wrapper">
            <div class="event-wrapper-header">
                <div>
                    <span>Upcoming Events</span>
                    <p>Don't miss out on the most anticipated workshops, seminars, and feasts happening this semester.</p>
                </div>
                <a href="#">View All Events <i class="fa fa-arrow-right"></i></a>
            </div>
            <div class="events-card-wrapper">
                <div class="events-cards">
                    <div class="events-cards-image">
                        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&auto=format&fit=crop" alt="Tech Summit">
                        <span class="event-badge">TechFest</span>
                    </div>
                    <div class="events-cards-content">
                        <span>
                            <i class="fa fa-calendar"></i>
                            <p>Oct 24, 2026</p>
                            <i class="fa fa-clock"></i>
                            <p>10:00 AM</p>
                        </span>
                        <span>Annual Innovation Summit</span>
                        <p>Join us for a day of deep dives into AI, Blockchain, and the future of web technology in education.</p>
                        <div class="card-warpper">
                            <button>Register</button>
                            <button>
                                <i class="fa fa-location-dot"></i>
                                <span>Main Audi</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="events-cards">
                    <div class="events-cards-image">
                        <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=600&auto=format&fit=crop" alt="Harmony Beats">
                        <span class="event-badge">Cultural</span>
                    </div>
                    <div class="events-cards-content">
                        <span>
                            <i class="fa fa-calendar"></i>
                            <p>Oct 28, 2026</p>
                            <i class="fa fa-clock"></i>
                            <p>06:00 PM</p>
                        </span>
                        <span>Harmony Beats Concert</span>
                        <p>The ultimate fusion of classical and contemporary music featuring top campus performers.</p>
                        <div class="card-warpper">
                            <button>Register</button>
                            <button>
                                <i class="fa fa-location-dot"></i>
                                <span>Open Grounds</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="events-cards">
                    <div class="events-cards-image">
                        <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=600&auto=format&fit=crop" alt="Pitch Deck">
                        <span class="event-badge">Workshop</span>
                    </div>
                    <div class="events-cards-content">
                        <span>
                            <i class="fa fa-calendar"></i>
                            <p>Nov 02, 2026</p>
                            <i class="fa fa-clock"></i>
                            <p>11:30 AM</p>
                        </span>
                        <span>Founder's Pitch Deck 101</span>
                        <p>Learn how to build a winning pitch deck and present your ideas to potential investors.</p>
                        <div class="card-warpper">
                            <button>Register</button>
                            <button>
                                <i class="fa fa-location-dot"></i>
                                <span>Seminar Hall B</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section id="how-it-works">
        <div class="work-wrapper">
            <h2>How It Works</h2>
            <p>Three simple steps to transition from discovery to check-in. It's that easy.</p>
        </div>
        <div class="work-cards">
            <div>
                <div class="work-icon">
                    <i class="fa fa-calendar-days"></i>
                </div>
                <h3>1. Browse Events</h3>
                <p>Find exciting fests and seminars that match your interests on our live calendar.</p>
            </div>
            <div>
                <div class="work-icon">
                    <i class="fa fa-qrcode"></i>
                </div>
                <h3>2. Register &amp; Get QR</h3>
                <p>Register in seconds. Your unique entry QR code will be generated instantly.</p>
            </div>
            <div>
                <div class="work-icon">
                    <i class="fa fa-camera"></i>
                </div>
                <h3>3. Scan &amp; Attend</h3>
                <p>Show your QR at the venue. Scan and enter without any paper queues.</p>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section id="cta">
        <div>
            <div class="cta-content">
                <h2>Ready to organize your next big event?</h2>
                <p>Join hundreds of college clubs using EventHub to manage registrations effortlessly.</p>
            </div>
            <div class="cta-buttons">
                <button>Get Started Now</button>
                <button>Contact Us</button>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-wrapepr">
            <div class="flex flex-col gap-4">
                <h3 class="font-bold text-white text-base">EventHub</h3>
                <p style="font-size:0.85rem;color:rgba(255,255,255,0.4);line-height:1.6;">Building the digital bridge between organizers and students since 2024. Designed for campus life.</p>
                <div class="footer-socials">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <h3 class="font-bold text-white text-base">Quick Links</h3>
                <a href="#" class="footer-links">About</a>
                <a href="#" class="footer-links">Contact</a>
                <a href="#" class="footer-links">Tech Stack</a>
            </div>

            <div class="flex flex-col gap-4">
                <h3 class="font-bold text-white text-base">Community</h3>
                <a href="#" class="footer-links">Team Name</a>
                <a href="#" class="footer-links">GitHub Link</a>
                <a href="#" class="footer-links">Careers</a>
            </div>

            <div class="flex flex-col gap-4">
                <h3 class="font-bold text-white text-base">Subscribe</h3>
                <p class="footer-links" style="cursor:default;">Get notified about new events happening around you.</p>
                <div style="display:flex;flex-direction:row;align-items:center;">
                    <input type="email" placeholder="Email">
                    <button class="footer-button">
                        <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <p>© 2026 EventHub. Built for functional elegance. All rights reserved.</p>
    </footer>

</body>
</html>
```

---

## 📄 `/README.md`

```markdown
-- =====================================================
-- EVENTHUB DATABASE SETUP
-- Run this entire script in phpMyAdmin SQL tab
-- =====================================================

-- Drop existing database if it exists (optional)
DROP DATABASE IF EXISTS ems;

-- Create fresh database
CREATE DATABASE ems;
USE ems;

-- =====================================================
-- TABLE: users (students)
-- =====================================================
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    contact VARCHAR(20),
    faculty VARCHAR(50),
    semester VARCHAR(10),
    college VARCHAR(100),
    university VARCHAR(100),
    location VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- =====================================================
-- TABLE: admin
-- =====================================================
CREATE TABLE admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    department VARCHAR(100),
    contact VARCHAR(20),
    office_location VARCHAR(100),
    admin_code VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- =====================================================
-- TABLE: events
-- =====================================================
CREATE TABLE events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT,
    date DATE NOT NULL,
    time VARCHAR(20) NOT NULL,
    venue VARCHAR(150) NOT NULL,
    category VARCHAR(50) NOT NULL,
    capacity INT NOT NULL DEFAULT 100,
    registered INT NOT NULL DEFAULT 0,
    image_url TEXT,
    status ENUM('upcoming', 'ongoing', 'completed', 'cancelled') DEFAULT 'upcoming',
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES admin(admin_id) ON DELETE SET NULL
);

-- =====================================================
-- TABLE: venues
-- =====================================================
CREATE TABLE venues (
    venue_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    capacity INT NOT NULL,
    location VARCHAR(200),
    facilities TEXT,
    status ENUM('active', 'inactive', 'maintenance') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- =====================================================
-- TABLE: registrations
-- =====================================================
CREATE TABLE registrations (
    registration_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    event_id INT NOT NULL,
    registration_date DATE NOT NULL,
    status ENUM('confirmed', 'pending', 'cancelled', 'attended') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    UNIQUE KEY unique_registration (user_id, event_id)
);

-- =====================================================
-- SAMPLE DATA
-- =====================================================

-- Insert Admin Account (password: admin123)
INSERT INTO admin (username, password, name, department, contact, office_location, admin_code) 
VALUES ('admin', 'admin123', 'Administrator', 'Admin Office', '1234567890', 'Admin Block, 2nd Floor', 'ADMIN001');

-- Insert Sample Students (password: password123)
INSERT INTO users (name, email, password, contact, faculty, semester, college, university, location) VALUES
('Aarav Sharma', 'aarav@example.com', 'password123', '9812345678', 'Computer Engineering', '6th Semester', 'Kantipur City College', 'Purwanchal University', 'Kathmandu'),
('Priya Thapa', 'priya@example.com', 'password123', '9823456789', 'Civil Engineering', '4th Semester', 'Pulchowk Campus', 'Tribhuvan University', 'Lalitpur'),
('Rohan Bista', 'rohan@example.com', 'password123', '9834567890', 'Electrical Engineering', '8th Semester', 'Thapathali Campus', 'Tribhuvan University', 'Kathmandu'),
('Sita Rai', 'sita@example.com', 'password123', '9845678901', 'Computer Engineering', '2nd Semester', 'Kantipur City College', 'Purwanchal University', 'Bhaktapur'),
('Bikash Karki', 'bikash@example.com', 'password123', '9856789012', 'Business Administration', '4th Semester', 'Kantipur City College', 'Purwanchal University', 'Kathmandu'),
('Manisha Gurung', 'manisha@example.com', 'password123', '9867890123', 'Architecture', '6th Semester', 'Pulchowk Campus', 'Tribhuvan University', 'Pokhara');

-- Insert Venues
INSERT INTO venues (name, capacity, location, facilities) VALUES
('Main Auditorium', 400, 'Block A, Ground Floor', 'Projector, AC, Stage, Mic, Sound System, Comfortable Seating'),
('Open Grounds', 1000, 'Central Campus', 'Large Stage, Professional Lighting, PA System, Food Stalls'),
('Seminar Hall B', 100, 'Block C, 2nd Floor', 'Projector, AC, Whiteboard, Conference Microphones, Video Recording'),
('Sports Complex', 500, 'East Wing', 'Floodlights, Changing Rooms, Equipment Storage, First Aid'),
('Innovation Hub', 150, 'Block D, 1st Floor', 'Smart Board, VR Setup, 3D Printers, Lab Equipment, High-speed WiFi'),
('Library Hall', 80, 'Block B, 3rd Floor', 'Projector, Quiet Environment, Reading Tables, WiFi');

-- Insert Events
INSERT INTO events (title, description, date, time, venue, category, capacity, registered, image_url, status) VALUES
('Annual Innovation Summit 2026', 'Deep dives into AI, Blockchain, and the future of the web. Industry experts will share insights on emerging technologies. Network with professionals and fellow students.', '2026-10-24', '10:00 AM', 'Main Auditorium', 'Tech', 300, 187, 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&auto=format&fit=crop', 'upcoming'),
('Harmony Beats Concert', 'Fusion of classical and contemporary music. Featuring renowned artists and student performers. A night of cultural celebration and musical excellence.', '2026-10-28', '06:00 PM', 'Open Grounds', 'Cultural', 500, 312, 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=600&auto=format&fit=crop', 'upcoming'),
('Founder\'s Pitch Deck 101', 'Build a winning pitch deck for investors. Learn from successful startup founders. Includes hands-on workshop and feedback session.', '2026-11-02', '11:30 AM', 'Seminar Hall B', 'Workshop', 80, 54, 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=600&auto=format&fit=crop', 'upcoming'),
('Inter-College Football Cup', 'Annual inter-college football tournament. 8 teams competing for the championship trophy. Prize money for winners and runners-up.', '2026-11-10', '09:00 AM', 'Sports Complex', 'Sports', 200, 96, 'https://images.unsplash.com/photo-1522778119026-d364f97ff1a5?w=600&auto=format&fit=crop', 'upcoming'),
('Future of AI: Student Summit', 'Explore the transformative power of generative AI in modern applications and research. Hands-on sessions with AI tools.', '2026-10-24', '10:00 AM', 'Innovation Hub', 'Tech', 250, 120, 'https://images.unsplash.com/photo-1677442135703-1787eea5ce01?w=600&auto=format&fit=crop', 'upcoming'),
('Global Music Fest 2026', 'A night of diverse musical performances from across the globe. Featuring international artists and local bands.', '2026-11-02', '5:30 PM', 'Open Grounds', 'Cultural', 600, 245, 'https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=600&auto=format&fit=crop', 'upcoming'),
('UX Design: From Zero to Hero', 'Hands-on workshop focusing on user research, wireframing, and creating high-fidelity prototypes using Figma.', '2026-10-28', '2:00 PM', 'Innovation Hub', 'Workshop', 50, 32, 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=600&auto=format&fit=crop', 'upcoming'),
('Annual Sports Day 2026', 'Compete across 12 sports disciplines including athletics, basketball, volleyball, and more. Open to all enrolled students.', '2026-11-10', '8:00 AM', 'Sports Complex', 'Sports', 300, 145, 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=600&auto=format&fit=crop', 'upcoming'),
('48-Hour Hackathon', 'Build real-world solutions in 48 hours. Cash prizes, mentorship from industry experts, and networking opportunities.', '2026-11-15', '9:00 AM', 'Innovation Hub', 'Tech', 100, 67, 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&auto=format&fit=crop', 'upcoming'),
('Career Fair 2026', 'Meet 60+ top companies, attend on-spot interviews, and kickstart your professional journey from campus. Bring your resumes!', '2026-11-20', '11:00 AM', 'Main Auditorium', 'Career', 500, 234, 'https://images.unsplash.com/photo-1560523159-4a9692d222ef?w=600&auto=format&fit=crop', 'upcoming');

-- Insert Registrations
INSERT INTO registrations (user_id, event_id, registration_date, status) VALUES
(1, 1, '2026-09-15', 'confirmed'),
(2, 2, '2026-09-18', 'confirmed'),
(3, 3, '2026-09-20', 'pending'),
(4, 1, '2026-09-21', 'confirmed'),
(5, 4, '2026-09-22', 'confirmed'),
(6, 2, '2026-09-23', 'cancelled'),
(1, 2, '2026-09-24', 'confirmed'),
(2, 3, '2026-09-25', 'confirmed'),
(3, 1, '2026-09-26', 'confirmed'),
(4, 3, '2026-09-27', 'pending'),
(5, 2, '2026-09-28', 'confirmed'),
(6, 4, '2026-09-29', 'confirmed'),
(1, 5, '2026-09-30', 'confirmed'),
(2, 6, '2026-10-01', 'confirmed'),
(3, 7, '2026-10-02', 'confirmed');

-- =====================================================
-- CREATE INDEXES FOR BETTER PERFORMANCE
-- =====================================================
CREATE INDEX idx_events_date ON events(date);
CREATE INDEX idx_events_category ON events(category);
CREATE INDEX idx_events_status ON events(status);
CREATE INDEX idx_registrations_user ON registrations(user_id);
CREATE INDEX idx_registrations_event ON registrations(event_id);
CREATE INDEX idx_registrations_status ON registrations(status);
CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_admin_username ON admin(username);

-- =====================================================
-- VERIFICATION QUERIES (Run these to check if everything worked)
-- =====================================================
SELECT 'Database Setup Complete!' as Status;
SELECT COUNT(*) as Total_Users FROM users;
SELECT COUNT(*) as Total_Admins FROM admin;
SELECT COUNT(*) as Total_Events FROM events;
SELECT COUNT(*) as Total_Venues FROM venues;
SELECT COUNT(*) as Total_Registrations FROM registrations;
```

---

## 📄 `/asset/js/college.js`

```javascript
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
```

---

## 📄 `/asset/js/student.js`

```javascript
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
```

---

## 📄 `/asset/pages/database.sql` (first one, from README's separate file)

```sql
-- Create database
CREATE DATABASE IF NOT EXISTS ems;
USE ems;

-- Users table (students)
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    contact VARCHAR(20),
    faculty VARCHAR(50),
    semester VARCHAR(10),
    college VARCHAR(100),
    university VARCHAR(100),
    location VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Admin table
CREATE TABLE IF NOT EXISTS admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    department VARCHAR(100),
    contact VARCHAR(20),
    office_location VARCHAR(100),
    admin_code VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Events table
CREATE TABLE IF NOT EXISTS events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT,
    date DATE NOT NULL,
    time VARCHAR(20) NOT NULL,
    venue VARCHAR(150) NOT NULL,
    category VARCHAR(50) NOT NULL,
    capacity INT NOT NULL DEFAULT 100,
    registered INT NOT NULL DEFAULT 0,
    image_url TEXT,
    status ENUM('upcoming', 'ongoing', 'completed', 'cancelled') DEFAULT 'upcoming',
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES admin(admin_id) ON DELETE SET NULL
);

-- Venues table
CREATE TABLE IF NOT EXISTS venues (
    venue_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    capacity INT NOT NULL,
    location VARCHAR(200),
    facilities TEXT,
    status ENUM('active', 'inactive', 'maintenance') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Registrations table
CREATE TABLE IF NOT EXISTS registrations (
    registration_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    event_id INT NOT NULL,
    registration_date DATE NOT NULL,
    status ENUM('confirmed', 'pending', 'cancelled', 'attended') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    UNIQUE KEY unique_registration (user_id, event_id)
);

-- Insert sample admin (password: admin123)
INSERT INTO admin (username, password, name, department, contact, office_location, admin_code) 
VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'Admin Office', '1234567890', 'Admin Block', 'ADMIN001');

-- Insert sample users (password: password123 for all)
INSERT INTO users (name, email, password, contact, faculty, semester, college, university, location) VALUES
('Aarav Sharma', 'aarav@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9812345678', 'Computer Engineering', '6th', 'Kantipur City College', 'Purwanchal University', 'Kathmandu'),
('Priya Thapa', 'priya@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9823456789', 'Civil Engineering', '4th', 'Pulchowk Campus', 'Tribhuvan University', 'Lalitpur'),
('Rohan Bista', 'rohan@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9834567890', 'Electrical Engineering', '8th', 'Thapathali Campus', 'Tribhuvan University', 'Kathmandu');

-- Insert sample venues
INSERT INTO venues (name, capacity, location, facilities) VALUES
('Main Auditorium', 400, 'Block A, Ground Floor', 'Projector, AC, Stage, Mic, Sound System'),
('Open Grounds', 1000, 'Central Campus', 'Stage, Lighting, PA System, Seating Arrangement'),
('Seminar Hall B', 100, 'Block C, 2nd Floor', 'Projector, AC, Whiteboard, Conference System'),
('Sports Complex', 500, 'East Wing', 'Floodlights, Changing Rooms, Equipment Storage'),
('Innovation Hub', 150, 'Block D, 1st Floor', 'Smart Board, VR Setup, 3D Printers, Lab Equipment');

-- Insert sample events
INSERT INTO events (title, description, date, time, venue, category, capacity, registered, image_url, status) VALUES
('Annual Innovation Summit', 'Deep dives into AI, Blockchain, and the future of the web. Industry experts will share insights on emerging technologies.', '2026-10-24', '10:00 AM', 'Main Auditorium', 'Tech', 300, 187, 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&auto=format&fit=crop', 'upcoming'),
('Harmony Beats Concert', 'Fusion of classical and contemporary music. Featuring renowned artists and student performers.', '2026-10-28', '06:00 PM', 'Open Grounds', 'Cultural', 500, 312, 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=600&auto=format&fit=crop', 'upcoming'),
('Founder\'s Pitch Deck 101', 'Build a winning pitch deck for investors. Learn from successful startup founders.', '2026-11-02', '11:30 AM', 'Seminar Hall B', 'Workshop', 80, 54, 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=600&auto=format&fit=crop', 'upcoming'),
('Inter-College Football Cup', 'Annual inter-college football tournament. 8 teams competing for the championship.', '2026-11-10', '09:00 AM', 'Sports Complex', 'Sports', 200, 96, '', 'upcoming'),
('Future of AI Summit', 'Explore the transformative power of generative AI in modern applications and research.', '2026-10-24', '10:00 AM', 'Main Auditorium', 'Tech', 250, 120, 'https://images.unsplash.com/photo-1677442135703-1787eea5ce01?w=600&auto=format&fit=crop', 'upcoming'),
('Global Music Fest', 'A night of diverse musical performances from across the globe.', '2026-11-02', '5:30 PM', 'Open Grounds', 'Cultural', 600, 245, 'https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=600&auto=format&fit=crop', 'upcoming'),
('UX Design Workshop', 'Hands-on workshop focusing on user research, wireframing, and creating high-fidelity prototypes.', '2026-10-28', '2:00 PM', 'Innovation Hub', 'Workshop', 50, 32, 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=600&auto=format&fit=crop', 'upcoming');

-- Insert sample registrations
INSERT INTO registrations (user_id, event_id, registration_date, status) VALUES
(1, 1, '2026-09-15', 'confirmed'),
(2, 2, '2026-09-18', 'confirmed'),
(3, 3, '2026-09-20', 'pending'),
(1, 2, '2026-09-21', 'confirmed'),
(3, 4, '2026-09-22', 'confirmed'),
(2, 1, '2026-09-23', 'cancelled');

-- Create indexes for better performance
CREATE INDEX idx_events_date ON events(date);
CREATE INDEX idx_events_category ON events(category);
CREATE INDEX idx_events_status ON events(status);
CREATE INDEX idx_registrations_user ON registrations(user_id);
CREATE INDEX idx_registrations_event ON registrations(event_id);
CREATE INDEX idx_registrations_status ON registrations(status);
```

---

## 📄 `/asset/pages/login.html`

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — EventHub</title>
    <link rel="stylesheet" href="../css/sign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="login-bg">

<div class="login-container">

    <h2 class="logo">EventHub</h2>
    <p class="subtitle">Access your dashboard</p>

    <!-- ROLE SWITCH -->
    <div class="role-switch">
        <button class="active" type="button" onclick="setRole('user', this)">Student</button>
        <button type="button" onclick="setRole('admin', this)">Admin</button>
    </div>

    <!-- ERROR BANNER -->
    <div class="auth-error" id="authError"></div>

    <!-- LOGIN FORM -->
    <form id="loginForm" novalidate>
        <input type="hidden" name="action" value="login">
        <input type="hidden" name="role"   id="role" value="user">

        <div class="input-box">
            <i class="fa fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email / Username" required autocomplete="username">
        </div>

        <div class="input-box" style="margin-top:10px;">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required autocomplete="current-password">
            <i class="fa fa-eye toggle-pw" id="togglePw" onclick="togglePassword('password','togglePw')"></i>
        </div>

        <div class="forgot">
            <a href="#">Forgot password?</a>
        </div>

        <button class="login-btn" type="submit" id="loginBtn">
            <span id="loginLabel">Login</span>
            <i class="fa fa-arrow-right" id="loginIcon"></i>
            <span class="spinner" id="loginSpinner" style="display:none;"></span>
        </button>
    </form>

    <p class="register-text">
        Don't have an account? <a href="sign.html">Register</a>
    </p>

</div>

<script>
    function setRole(role, btn) {
        document.getElementById('role').value = role;
        document.querySelectorAll('.role-switch button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById('email').placeholder = role === 'admin' ? 'Admin Username' : 'Email Address';
    }

    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon  = document.getElementById(iconId);
        const show  = input.type === 'password';
        input.type  = show ? 'text' : 'password';
        icon.className = 'fa toggle-pw ' + (show ? 'fa-eye-slash' : 'fa-eye');
    }

    function showError(msg) {
        const el = document.getElementById('authError');
        el.textContent = msg;
        el.style.display = msg ? 'block' : 'none';
    }

    function setLoading(loading) {
        document.getElementById('loginBtn').disabled    = loading;
        document.getElementById('loginLabel').style.display  = loading ? 'none' : 'inline';
        document.getElementById('loginIcon').style.display   = loading ? 'none' : 'inline';
        document.getElementById('loginSpinner').style.display = loading ? 'inline-block' : 'none';
    }

    document.getElementById('loginForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        showError('');
        setLoading(true);

        try {
            const data = new FormData(this);
            const res  = await fetch('../php/auth.php', { method: 'POST', body: data });
            const json = await res.json();

            if (json.success) {
                window.location.href = json.redirect ?? 'index.html';
            } else {
                showError(json.message);
                setLoading(false);
            }
        } catch (err) {
            showError('Something went wrong. Please try again.');
            setLoading(false);
        }
    });
</script>

</body>
</html>
```

---

## 📄 `/asset/pages/sign.html`

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account — EventHub</title>
    <link rel="stylesheet" href="../css/sign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="login-bg">

<div class="register-container">

    <h2 class="logo">EventHub</h2>
    <p class="subtitle">Create your account</p>

    <!-- ERROR / SUCCESS BANNER -->
    <div class="auth-error"   id="authError"   style="display:none;"></div>
    <div class="auth-success" id="authSuccess" style="display:none;"></div>

    <form id="signupForm" novalidate>
        <input type="hidden" name="action" value="signup">
        <input type="hidden" name="role"   id="roleHidden" value="user">

        <!-- ── BASIC INFO ───────────────────────── -->
        <div class="form-section">
            <p class="section-title"><i class="fa fa-user-circle"></i> Basic Information</p>

            <div class="input-box">
                <i class="fa fa-user"></i>
                <input type="text" name="name" id="name" placeholder="Full Name" required>
            </div>

            <div class="input-box">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email Address" required autocomplete="username">
            </div>

            <div class="input-box">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password (min 6 chars)" required autocomplete="new-password">
                <i class="fa fa-eye toggle-pw" id="togglePw" onclick="togglePassword('password','togglePw')"></i>
            </div>

            <!-- Password strength bar -->
            <div class="pw-strength-bar" id="pwStrengthBar">
                <div class="pw-strength-fill" id="pwStrengthFill"></div>
            </div>
            <p class="pw-strength-label" id="pwStrengthLabel"></p>
        </div>

        <!-- ── ROLE SELECTOR ───────────────────── -->
        <div class="form-section">
            <p class="section-title"><i class="fa fa-id-badge"></i> Select Role</p>
            <div class="role-switch">
                <button type="button" class="active" onclick="setRole('user', this)">Student</button>
                <button type="button" onclick="setRole('admin', this)">Admin</button>
            </div>
        </div>

        <!-- ── STUDENT FIELDS ──────────────────── -->
        <div id="studentFields" class="role-fields" style="display:block;">
            <div class="form-section">
                <p class="section-title"><i class="fa fa-graduation-cap"></i> Student Details</p>

                <div class="input-box">
                    <i class="fa fa-phone"></i>
                    <input type="tel" name="contact" id="contact" placeholder="Contact Number">
                </div>

                <div class="select-box">
                    <i class="fa fa-book"></i>
                    <select name="faculty" id="faculty">
                        <option value="">— Faculty —</option>
                        <option value="civil">Civil Engineering</option>
                        <option value="computer">Computer Engineering</option>
                        <option value="electrical">Electrical Engineering</option>
                        <option value="architecture">Architecture</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="select-box">
                    <i class="fa fa-layer-group"></i>
                    <select name="semester" id="semester">
                        <option value="">— Semester —</option>
                        <option value="i">I</option>
                        <option value="ii">II</option>
                        <option value="iii">III</option>
                        <option value="iv">IV</option>
                        <option value="v">V</option>
                        <option value="vi">VI</option>
                        <option value="vii">VII</option>
                        <option value="viii">VIII</option>
                    </select>
                </div>

                <div class="select-box">
                    <i class="fa fa-building-columns"></i>
                    <select name="college" id="college">
                        <option value="">— College —</option>
                        <option value="kantipur">Kantipur City College</option>
                        <option value="pulchowk">Pulchowk Campus</option>
                        <option value="thapathali">Thapathali Campus</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="input-box">
                    <i class="fa fa-university"></i>
                    <input type="text" name="university" id="university" placeholder="University">
                </div>

                <div class="input-box">
                    <i class="fa fa-location-dot"></i>
                    <input type="text" name="location" id="location" placeholder="City / Location">
                </div>
            </div>
        </div>

        <!-- ── ADMIN FIELDS ───────────────────── -->
        <div id="adminFields" class="role-fields" style="display:none;">
            <div class="form-section">
                <p class="section-title"><i class="fa fa-shield-halved"></i> Admin Details</p>

                <div class="input-box">
                    <i class="fa fa-id-card"></i>
                    <input type="text" name="adminID" id="adminID" placeholder="Admin ID / Code">
                </div>

                <div class="input-box">
                    <i class="fa fa-building"></i>
                    <input type="text" name="adminDept" id="adminDept" placeholder="Department">
                </div>

                <div class="input-box">
                    <i class="fa fa-phone"></i>
                    <input type="tel" name="adminContact" id="adminContact" placeholder="Contact Number">
                </div>

                <div class="input-box">
                    <i class="fa fa-location-dot"></i>
                    <input type="text" name="officeLocation" id="officeLocation" placeholder="Office Location">
                </div>
            </div>
        </div>

        <button class="login-btn" type="submit" id="signupBtn">
            <span id="signupLabel">Create Account</span>
            <i class="fa fa-arrow-right" id="signupIcon"></i>
            <span class="spinner" id="signupSpinner" style="display:none;"></span>
        </button>

        <p class="register-text">
            Already have an account? <a href="login.html">Login</a>
        </p>
    </form>

</div>

<script>
    function setRole(role, btn) {
        document.getElementById('roleHidden').value = role;
        document.querySelectorAll('.role-switch button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById('studentFields').style.display = role === 'user'  ? 'block' : 'none';
        document.getElementById('adminFields').style.display   = role === 'admin' ? 'block' : 'none';
    }

    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon  = document.getElementById(iconId);
        const show  = input.type === 'password';
        input.type  = show ? 'text' : 'password';
        icon.className = 'fa toggle-pw ' + (show ? 'fa-eye-slash' : 'fa-eye');
    }

    // Password strength meter
    document.getElementById('password').addEventListener('input', function() {
        const val = this.value;
        const fill  = document.getElementById('pwStrengthFill');
        const label = document.getElementById('pwStrengthLabel');
        let score = 0;
        if (val.length >= 6)  score++;
        if (val.length >= 10) score++;
        if (/[A-Z]/.test(val)) score++;
        if (/[0-9]/.test(val)) score++;
        if (/[^A-Za-z0-9]/.test(val)) score++;

        const levels = [
            { pct: '0%',   color: 'transparent', text: '' },
            { pct: '25%',  color: '#ef4444',      text: 'Weak' },
            { pct: '50%',  color: '#f59e0b',      text: 'Fair' },
            { pct: '75%',  color: '#3b82f6',      text: 'Good' },
            { pct: '100%', color: '#10b981',      text: 'Strong' },
        ];
        const level = levels[Math.min(score, 4)];
        fill.style.width      = level.pct;
        fill.style.background = level.color;
        label.textContent     = level.text;
        label.style.color     = level.color;
    });

    function showBanner(type, msg) {
        const el = document.getElementById(type === 'error' ? 'authError' : 'authSuccess');
        const hide = document.getElementById(type === 'error' ? 'authSuccess' : 'authError');
        hide.style.display = 'none';
        el.textContent = msg;
        el.style.display = msg ? 'block' : 'none';
        if (msg) el.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function setLoading(loading) {
        document.getElementById('signupBtn').disabled        = loading;
        document.getElementById('signupLabel').style.display  = loading ? 'none' : 'inline';
        document.getElementById('signupIcon').style.display   = loading ? 'none' : 'inline';
        document.getElementById('signupSpinner').style.display = loading ? 'inline-block' : 'none';
    }

    document.getElementById('signupForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        showBanner('error', '');
        showBanner('success', '');
        setLoading(true);

        try {
            const data = new FormData(this);
            const res  = await fetch('../php/auth.php', { method: 'POST', body: data });
            const json = await res.json();

            if (json.success) {
                showBanner('success', json.message + ' Redirecting to login…');
                setTimeout(() => { window.location.href = 'login.html'; }, 1800);
            } else {
                showBanner('error', json.message);
                setLoading(false);
            }
        } catch (err) {
            showBanner('error', 'Something went wrong. Please try again.');
            setLoading(false);
        }
    });
</script>

</body>
</html>
```

---

## 📄 `/asset/pages/student.html`

```html
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eventhub - Student Portal</title>
  <link rel="stylesheet" href="../css/stshome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

  <!-- HEADER -->
  <header>
    <span>Eventhub</span>
    <nav>
      <ul>
        <li><button onclick="student_page('home')" id="btn-home" class="active">Home</button></li>
        <li><button onclick="student_page('events')" id="btn-events">Events</button></li>
        <li><button onclick="student_page('registered')" id="btn-registered">Registered</button></li>
        <li><button onclick="student_page('profile')" id="btn-profile">Profile</button></li>
      </ul>
    </nav>
    <div>
      <div class="header-search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Search events...">
      </div>
      <a href="#">Logout</a>
    </div>
  </header>


  <!-- HOME PAGE -->
  <div class="sts-hero" id="page-home">

    <!-- Intro -->
    <div class="sts-intro">
      <div class="sts-intro-text">
        <span>Welcome, Gaurab</span>
        <p>Check upcoming events and manage your registrations.</p>
      </div>
      <button class="btn-explore-all" onclick="student_page('events')">Explore All Events</button>
    </div>

    <!-- Stats -->
    <div class="sts-stats">
      <div class="sts-event-card">
        <div class="sts-event-card-icon blue">
          <i class="fa-regular fa-calendar"></i>
        </div>
        <div class="sts-event-intro">
          <span>Events Available</span>
          <span>24</span>
        </div>
      </div>
      <div class="sts-event-card">
        <div class="sts-event-card-icon teal">
          <i class="fa-solid fa-user-check"></i>
        </div>
        <div class="sts-event-intro">
          <span>Events Registered</span>
          <span>08</span>
        </div>
      </div>
      <div class="sts-event-card">
        <div class="sts-event-card-icon amber">
          <i class="fa-solid fa-shield-check"></i>
        </div>
        <div class="sts-event-intro">
          <span>Events Attended</span>
          <span>12</span>
        </div>
      </div>
    </div>

    <!-- Upcoming Events -->
    <div class="sts-section-header">
      <h2>Upcoming Events</h2>
      <a href="#" onclick="student_page('events'); return false;">View Schedule <i class="fa-solid fa-arrow-right"></i></a>
    </div>

    <div class="sts-upcoming-events">

      <div class="sts-upcoming-event-card">
        <div class="sts-card-img-wrap">
          <img src="https://images.unsplash.com/photo-1677442135703-1787eea5ce01?w=600&auto=format&fit=crop" alt="Future of AI: Student Summit 2024">
          <span class="sts-card-badge tech">Tech</span>
        </div>
        <div class="sts-upcoming-event-intro">
          <div class="sts-upcomming-wrapper">
            <span class="ev-name">Future of AI: Student Summit 2024</span>
            <div class="ev-meta">
              <i class="fa-regular fa-calendar"></i>
              <span>Oct 24</span>
              <span class="ev-sep">•</span>
              <span>10:00 AM</span>
            </div>
            <div class="ev-meta">
              <i class="fa-solid fa-location-dot"></i>
              <span>Main Auditorium, Hall A</span>
            </div>
            <p class="ev-desc">Join industry leaders as we explore the transformative power of generative AI in modern applications and research.</p>
          </div>
          <button class="btn-register" onclick="showToast('Registered for Future of AI Summit!', 'success')">Register Now</button>
        </div>
      </div>

      <div class="sts-upcoming-event-card">
        <div class="sts-card-img-wrap">
          <img src="https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=600&auto=format&fit=crop" alt="Global Rhythm: Annual Music Fest">
          <span class="sts-card-badge cultural">Cultural</span>
        </div>
        <div class="sts-upcoming-event-intro">
          <div class="sts-upcomming-wrapper">
            <span class="ev-name">Global Rhythm: Annual Music Fest</span>
            <div class="ev-meta">
              <i class="fa-regular fa-calendar"></i>
              <span>Nov 02</span>
              <span class="ev-sep">•</span>
              <span>5:30 PM</span>
            </div>
            <div class="ev-meta">
              <i class="fa-solid fa-location-dot"></i>
              <span>Campus Open Grounds</span>
            </div>
            <p class="ev-desc">A night of diverse musical performances from across the globe, featuring student bands and local artists.</p>
          </div>
          <button class="btn-register" onclick="showToast('Registered for Global Rhythm Fest!', 'success')">Register Now</button>
        </div>
      </div>

      <div class="sts-upcoming-event-card">
        <div class="sts-card-img-wrap">
          <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=600&auto=format&fit=crop" alt="UX Design: From Zero to Hero">
          <span class="sts-card-badge workshop">Workshop</span>
        </div>
        <div class="sts-upcoming-event-intro">
          <div class="sts-upcomming-wrapper">
            <span class="ev-name">UX Design: From Zero to Hero</span>
            <div class="ev-meta">
              <i class="fa-regular fa-calendar"></i>
              <span>Oct 28</span>
              <span class="ev-sep">•</span>
              <span>2:00 PM</span>
            </div>
            <div class="ev-meta">
              <i class="fa-solid fa-location-dot"></i>
              <span>Design Lab, 3rd Floor</span>
            </div>
            <p class="ev-desc">A hands-on intensive workshop focusing on user research, wireframing, and creating high-fidelity prototypes.</p>
          </div>
          <button class="btn-register" onclick="showToast('Registered for UX Design Workshop!', 'success')">Register Now</button>
        </div>
      </div>

    </div>
  </div>


  <!-- REGISTERED PAGE -->
  <div class="register" id="page-registered">

    <div class="register-intro">
      <span>Student Portal</span>
      <span>My Registered Events</span>
      <p>Manage your upcoming schedule, view details, or modify your attendance.</p>
    </div>

    <div class="register-card-wrapepr">

      <div class="regsiter-card-wrapper-aaside">
        <div class="aside-card">
          <div class="card-1">
            <span>Total Registrations</span>
            <span>03</span>
          </div>
          <div class="card-1">
            <span>Upcoming Events</span>
            <span>02</span>
          </div>
          <div class="card-3">
            <span>Calendar View <i class="fa-regular fa-calendar"></i></span>
          </div>
        </div>

        <div class="register-wrapper-aaside-card-2">
          <span>Career Fair 2024</span>
          <p>Don't forget — registration closes in 2 days.</p>
          <button onclick="showToast('Opening Career Fair details...', 'success')">Explore</button>
        </div>
      </div>

      <div class="register-card-main">

        <div class="register-card">
          <div class="register-card-img">
            <img src="https://images.unsplash.com/photo-1677442135703-1787eea5ce01?w=400&auto=format&fit=crop" alt="Future of AI Summit">
          </div>
          <div class="register-card-intro">
            <span><span>Future of AI: Student Summit 2024</span></span>
            <span><i class="fa-regular fa-calendar"></i><span>Oct 24, 2024</span></span>
            <span><i class="fa-regular fa-clock"></i><span>10:00 AM</span></span>
            <span><i class="fa-solid fa-location-dot"></i><span>Main Auditorium, Hall A</span></span>
            <span><i class="fa-regular fa-file-lines"></i><span>Generative AI, research talks, live demos</span></span>
          </div>
          <div class="register-card-button">
            <button class="register-card-button-1">View Details</button>
            <button class="register-card-button-2" onclick="showToast('Registration cancelled.', 'error')">Cancel Registration</button>
          </div>
        </div>

        <div class="register-card">
          <div class="register-card-img">
            <img src="https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=400&auto=format&fit=crop" alt="Global Rhythm Fest">
          </div>
          <div class="register-card-intro">
            <span><span>Global Rhythm: Annual Music Fest</span></span>
            <span><i class="fa-regular fa-calendar"></i><span>Nov 02, 2024</span></span>
            <span><i class="fa-regular fa-clock"></i><span>5:30 PM</span></span>
            <span><i class="fa-solid fa-location-dot"></i><span>Campus Open Grounds</span></span>
            <span><i class="fa-regular fa-file-lines"></i><span>Live music, student bands, cultural performances</span></span>
          </div>
          <div class="register-card-button">
            <button class="register-card-button-1">View Details</button>
            <button class="register-card-button-2" onclick="showToast('Registration cancelled.', 'error')">Cancel Registration</button>
          </div>
        </div>

        <div class="register-card">
          <div class="register-card-img">
            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=400&auto=format&fit=crop" alt="UX Workshop">
          </div>
          <div class="register-card-intro">
            <span><span>UX Design: From Zero to Hero</span></span>
            <span><i class="fa-regular fa-calendar"></i><span>Oct 28, 2024</span></span>
            <span><i class="fa-regular fa-clock"></i><span>2:00 PM</span></span>
            <span><i class="fa-solid fa-location-dot"></i><span>Design Lab, 3rd Floor</span></span>
            <span><i class="fa-regular fa-file-lines"></i><span>Wireframing, prototyping, Figma hands-on</span></span>
          </div>
          <div class="register-card-button">
            <button class="register-card-button-1">View Details</button>
            <button class="register-card-button-2" onclick="showToast('Registration cancelled.', 'error')">Cancel Registration</button>
          </div>
        </div>

      </div>
    </div>
  </div>


  <!-- PROFILE PAGE -->
  <div class="student-profile" id="page-profile">

    <div class="profile-intro">
      <span>Student Profile</span>
      <p>Manage your profile and settings</p>
    </div>

    <div class="profile-main">

      <div class="profile-aside">
        <div class="sts-profile">
          <div class="sts-profile-img">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&auto=format&fit=crop&crop=face" alt="Profile">
          </div>
          <div class="sts-profile-intro">
            <span>Gaurab</span>
            <span>Student</span>
          </div>
          <div class="sts-profile-status">
            <i class="fa-solid fa-circle-check"></i>
            <span>Verified</span>
          </div>
        </div>
      </div>

      <div class="profile-info-grid">
        <div class="profile-info-field">
          <label>Full Name</label>
          <p>Gaurab</p>
        </div>
        <div class="profile-info-field">
          <label>Email Address</label>
          <p>gaurab@university.edu</p>
        </div>
        <div class="profile-info-field">
          <label>Department</label>
          <p>Computer Science &amp; Engineering</p>
        </div>
        <div class="profile-info-field">
          <label>Roll Number</label>
          <p>CSE-2021-042</p>
        </div>
        <div class="profile-info-field">
          <label>Current Semester</label>
          <p>6th Semester</p>
        </div>
        <div class="profile-info-field">
          <label>Campus Location</label>
          <p>Main Block, Building A</p>
        </div>
      </div>

      <div class="profile-activity">
        <h4>Recent Activity</h4>
        <div class="profile-activity-cards">
          <div class="activity-card">
            <div class="activity-card-icon">
              <i class="fa-regular fa-calendar-check"></i>
            </div>
            <div>
              <p>Events Joined</p>
              <p>12</p>
            </div>
          </div>
          <div class="activity-card">
            <div class="activity-card-icon tertiary">
              <i class="fa-solid fa-trophy"></i>
            </div>
            <div>
              <p>Certificates</p>
              <p>08</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


  <!-- EVENTS BROWSE PAGE -->
  <div class="sts-events-page" id="page-events">

    <div class="sts-events-page-header">
      <h1>All Events</h1>
      <p>Browse and register for events happening across campus</p>
    </div>

    <div class="sts-events-grid">

      <div class="sts-upcoming-event-card">
        <div class="sts-card-img-wrap">
          <img src="https://images.unsplash.com/photo-1677442135703-1787eea5ce01?w=600&auto=format&fit=crop" alt="AI Summit">
          <span class="sts-card-badge tech">Tech</span>
        </div>
        <div class="sts-upcoming-event-intro">
          <div class="sts-upcomming-wrapper">
            <span class="ev-name">Future of AI: Student Summit 2024</span>
            <div class="ev-meta"><i class="fa-regular fa-calendar"></i><span>Oct 24</span><span class="ev-sep">•</span><span>10:00 AM</span></div>
            <div class="ev-meta"><i class="fa-solid fa-location-dot"></i><span>Main Auditorium, Hall A</span></div>
            <p class="ev-desc">Join industry leaders as we explore the transformative power of generative AI in modern applications and research.</p>
          </div>
          <button class="btn-register" onclick="showToast('Registered for Future of AI Summit!', 'success')">Register Now</button>
        </div>
      </div>

      <div class="sts-upcoming-event-card">
        <div class="sts-card-img-wrap">
          <img src="https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=600&auto=format&fit=crop" alt="Music Fest">
          <span class="sts-card-badge cultural">Cultural</span>
        </div>
        <div class="sts-upcoming-event-intro">
          <div class="sts-upcomming-wrapper">
            <span class="ev-name">Global Rhythm: Annual Music Fest</span>
            <div class="ev-meta"><i class="fa-regular fa-calendar"></i><span>Nov 02</span><span class="ev-sep">•</span><span>5:30 PM</span></div>
            <div class="ev-meta"><i class="fa-solid fa-location-dot"></i><span>Campus Open Grounds</span></div>
            <p class="ev-desc">A night of diverse musical performances from across the globe, featuring student bands and local artists.</p>
          </div>
          <button class="btn-register" onclick="showToast('Registered for Global Rhythm Fest!', 'success')">Register Now</button>
        </div>
      </div>

      <div class="sts-upcoming-event-card">
        <div class="sts-card-img-wrap">
          <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=600&auto=format&fit=crop" alt="UX Workshop">
          <span class="sts-card-badge workshop">Workshop</span>
        </div>
        <div class="sts-upcoming-event-intro">
          <div class="sts-upcomming-wrapper">
            <span class="ev-name">UX Design: From Zero to Hero</span>
            <div class="ev-meta"><i class="fa-regular fa-calendar"></i><span>Oct 28</span><span class="ev-sep">•</span><span>2:00 PM</span></div>
            <div class="ev-meta"><i class="fa-solid fa-location-dot"></i><span>Design Lab, 3rd Floor</span></div>
            <p class="ev-desc">A hands-on intensive workshop focusing on user research, wireframing, and creating high-fidelity prototypes.</p>
          </div>
          <button class="btn-register" onclick="showToast('Registered for UX Design Workshop!', 'success')">Register Now</button>
        </div>
      </div>

      <div class="sts-upcoming-event-card">
        <div class="sts-card-img-wrap">
          <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=600&auto=format&fit=crop" alt="Sports Day">
          <span class="sts-card-badge sports">Sports</span>
        </div>
        <div class="sts-upcoming-event-intro">
          <div class="sts-upcomming-wrapper">
            <span class="ev-name">Annual Sports Day 2024</span>
            <div class="ev-meta"><i class="fa-regular fa-calendar"></i><span>Nov 10</span><span class="ev-sep">•</span><span>8:00 AM</span></div>
            <div class="ev-meta"><i class="fa-solid fa-location-dot"></i><span>University Sports Ground</span></div>
            <p class="ev-desc">Compete across 12 sports disciplines, from athletics to team events. Open to all enrolled students.</p>
          </div>
          <button class="btn-register" onclick="showToast('Registered for Sports Day!', 'success')">Register Now</button>
        </div>
      </div>

      <div class="sts-upcoming-event-card">
        <div class="sts-card-img-wrap">
          <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&auto=format&fit=crop" alt="Hackathon">
          <span class="sts-card-badge tech">Tech</span>
        </div>
        <div class="sts-upcoming-event-intro">
          <div class="sts-upcomming-wrapper">
            <span class="ev-name">48-Hour Hackathon: Build for Impact</span>
            <div class="ev-meta"><i class="fa-regular fa-calendar"></i><span>Nov 15</span><span class="ev-sep">•</span><span>9:00 AM</span></div>
            <div class="ev-meta"><i class="fa-solid fa-location-dot"></i><span>Innovation Hub, Block C</span></div>
            <p class="ev-desc">Build real-world solutions in 48 hours. Cash prizes, mentorship from industry experts, and networking opportunities.</p>
          </div>
          <button class="btn-register" onclick="showToast('Registered for Hackathon!', 'success')">Register Now</button>
        </div>
      </div>

      <div class="sts-upcoming-event-card">
        <div class="sts-card-img-wrap">
          <img src="https://images.unsplash.com/photo-1560523159-4a9692d222ef?w=600&auto=format&fit=crop" alt="Career Fair">
          <span class="sts-card-badge default">Career</span>
        </div>
        <div class="sts-upcoming-event-intro">
          <div class="sts-upcomming-wrapper">
            <span class="ev-name">Career Fair 2024</span>
            <div class="ev-meta"><i class="fa-regular fa-calendar"></i><span>Nov 20</span><span class="ev-sep">•</span><span>11:00 AM</span></div>
            <div class="ev-meta"><i class="fa-solid fa-location-dot"></i><span>Convention Hall</span></div>
            <p class="ev-desc">Meet 60+ top companies, attend on-spot interviews, and kickstart your professional journey from campus.</p>
          </div>
          <button class="btn-register" onclick="showToast('Registered for Career Fair!', 'success')">Register Now</button>
        </div>
      </div>

    </div>
  </div>


  <!-- FOOTER -->
  <footer>
    <div class="fotter-wrapper">
      <div class="footer-intro">
        <span>Eventhub</span>
        <p>Eventhub is a platform for students to find and register for events across campus.</p>
      </div>
      <div class="footer-links">
        <ul>
          <li><a href="#" onclick="student_page('home'); return false;">Home</a></li>
          <li><a href="#" onclick="student_page('events'); return false;">Events</a></li>
          <li><a href="#" onclick="student_page('registered'); return false;">Registered</a></li>
          <li><a href="#" onclick="student_page('profile'); return false;">Profile</a></li>
        </ul>
      </div>
      <div class="footer-support">
        <ul>
          <li><a href="#">Help</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="fotter-email">
        <span>Newsletter</span>
        <p>Get the latest updates on events</p>
        <div class="fotter-email-input">
          <input type="email" placeholder="Enter your email">
          <button onclick="showToast('Subscribed successfully!', 'success')"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>Copyright &copy; 2026 Eventhub. All rights reserved.</p>
    </div>
  </footer>

  <!-- TOAST -->
  <div class="toast" id="toast"></div>

  <script src="../js/student.js"></script>

</body>
</html>
```

---

## 📄 `/asset/pages/admin.html`

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventHub - College Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../css/college.css">

</head>

<body>

    <header class="admin-header">
        <div style="display: flex; align-items: center;">
            <span class="logo">EventHub</span>
            <span class="admin-badge">Admin Portal</span>
        </div>
        <nav>
            <ul>
                <li><button class="nav-btn active" onclick="showAdminPage('overview')"
                        id="nav-overview">Overview</button></li>
                <li><button class="nav-btn" onclick="showAdminPage('events')" id="nav-events">Manage Events</button>
                </li>
                <li><button class="nav-btn" onclick="showAdminPage('registrations')"
                        id="nav-registrations">Registrations</button></li>
                <li><button class="nav-btn" onclick="showAdminPage('venues')" id="nav-venues">Venues</button></li>
            </ul>
        </nav>
        <div class="header-right">
            <div class="admin-info">
                <div class="admin-avatar">A</div>
                <span style="font-weight: 600;">Admin</span>
            </div>
            <a href="#" class="logout-link" onclick="showToast('Logged out successfully', 'success'); return false;"><i
                    class="fa-solid fa-sign-out-alt"></i> Logout</a>
        </div>
    </header>

    <div class="dashboard-container">
        <!-- OVERVIEW PAGE -->
        <div id="page-overview" class="admin-page active">
            <div class="stats-grid" id="statsGrid">
                <div class="stat-card">
                    <div class="stat-left">
                        <h3 id="totalEvents">0</h3>
                        <p>Total Events</p>
                    </div>
                    <div class="stat-icon"><i class="fa-regular fa-calendar"></i></div>
                </div>
                <div class="stat-card">
                    <div class="stat-left">
                        <h3 id="totalRegistrations">0</h3>
                        <p>Total Registrations</p>
                    </div>
                    <div class="stat-icon"><i class="fa-solid fa-user-check"></i></div>
                </div>
                <div class="stat-card">
                    <div class="stat-left">
                        <h3 id="upcomingEvents">0</h3>
                        <p>Upcoming Events</p>
                    </div>
                    <div class="stat-icon"><i class="fa-regular fa-clock"></i></div>
                </div>
                <div class="stat-card">
                    <div class="stat-left">
                        <h3 id="totalVenues">0</h3>
                        <p>Active Venues</p>
                    </div>
                    <div class="stat-icon"><i class="fa-solid fa-location-dot"></i></div>
                </div>
            </div>
            <div class="section-header">
                <h2>Recent Events</h2><button class="btn-outline" onclick="showAdminPage('events')">View All <i
                        class="fa-solid fa-arrow-right"></i></button>
            </div>
            <div class="data-table-wrapper">
                <table class="data-table" id="recentEventsTable">
                    <thead>
                        <tr>
                            <th>Event</th>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Registrations</th>
                        </tr>
                    </thead>
                    <tbody id="recentEventsBody"></tbody>
                </table>
            </div>
        </div>

        <!-- MANAGE EVENTS PAGE -->
        <div id="page-events" class="admin-page">
            <div class="section-header">
                <h2><i class="fa-regular fa-calendar-plus"></i> All Events</h2><button class="btn-primary"
                    onclick="openEventModal()"><i class="fa-solid fa-plus"></i> Create Event</button>
            </div>
            <div class="data-table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Venue</th>
                            <th>Category</th>
                            <th>Capacity</th>
                            <th>Registered</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="eventsTableBody"></tbody>
                </table>
            </div>
        </div>

        <!-- REGISTRATIONS PAGE -->
        <div id="page-registrations" class="admin-page">
            <div class="section-header">
                <h2><i class="fa-solid fa-list-check"></i> Student Registrations</h2>
                <div><input type="text" id="searchReg" placeholder="Search by student or event..."
                        style="padding: 8px 14px; border: 1px solid var(--border); border-radius: 8px; width: 240px;">
                </div>
            </div>
            <div class="data-table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Event</th>
                            <th>Registration Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="registrationsTableBody"></tbody>
                </table>
            </div>
        </div>

        <!-- VENUES PAGE -->
        <div id="page-venues" class="admin-page">
            <div class="section-header">
                <h2><i class="fa-solid fa-building"></i> Campus Venues</h2><button class="btn-primary"
                    onclick="openVenueModal()"><i class="fa-solid fa-plus"></i> Add Venue</button>
            </div>
            <div class="data-table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Venue Name</th>
                            <th>Capacity</th>
                            <th>Location</th>
                            <th>Facilities</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="venuesTableBody"></tbody>
                </table>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-wrapper">
            <div><span class="logo" style="font-size:1rem;">EventHub Admin</span>
                <p style="color:var(--text-mid); font-size:0.8rem; margin-top:8px;">College Event Management System</p>
            </div>
            <div>
                <ul style="list-style:none;">
                    <li>Dashboard</li>
                    <li>Events</li>
                    <li>Reports</li>
                </ul>
            </div>
            <div>
                <ul style="list-style:none;">
                    <li>Support</li>
                    <li>Privacy</li>
                </ul>
            </div>
            <div><span>© 2026 EventHub</span></div>
        </div>
        <div class="footer-bottom">
            <p>Admin Dashboard — Manage college events seamlessly</p>
        </div>
    </footer>

    <div id="eventModal" class="modal-overlay">
        <div class="modal">
            <div class="modal-header">
                <h3>Create / Edit Event</h3><button class="modal-close" onclick="closeEventModal()"><i
                        class="fa-solid fa-times"></i></button>
            </div>
            <form id="eventForm"><input type="hidden" id="eventId">
                <div class="form-group"><label>Event Title</label><input type="text" id="eventTitle" required></div>
                <div class="form-row">
                    <div class="form-group"><label>Date</label><input type="date" id="eventDate" required></div>
                    <div class="form-group"><label>Time</label><input type="text" id="eventTime" placeholder="10:00 AM"
                            required></div>
                </div>
                <div class="form-group"><label>Venue</label><input type="text" id="eventVenue" required></div>
                <div class="form-row">
                    <div class="form-group"><label>Category</label><select id="eventCategory">
                            <option>Tech</option>
                            <option>Cultural</option>
                            <option>Workshop</option>
                            <option>Sports</option>
                            <option>Academic</option>
                        </select></div>
                    <div class="form-group"><label>Capacity</label><input type="number" id="eventCapacity" value="100"
                            required></div>
                </div>
                <div class="form-group"><label>Description</label><textarea id="eventDesc" rows="3"
                        placeholder="Event description..."></textarea></div>
                <div class="form-group">
                    <label>Event Image</label>
                    <div class="image-upload-area" id="imageUploadArea" onclick="document.getElementById('eventImage').click()">
                        <input type="file" id="eventImage" accept="image/*" style="display:none;" onchange="handleImageUpload(event)">
                        <div class="image-upload-placeholder" id="imageUploadPlaceholder">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <span>Click to upload image</span>
                            <p>PNG, JPG, WEBP up to 5MB</p>
                        </div>
                        <img id="imagePreview" class="image-preview" src="" alt="Preview" style="display:none;">
                    </div>
                    <button type="button" class="btn-remove-image" id="removeImageBtn" onclick="removeImage()" style="display:none;">
                        <i class="fa-solid fa-times"></i> Remove image
                    </button>
                </div>
                <div class="modal-actions"><button type="button" class="btn-outline"
                        onclick="closeEventModal()">Cancel</button><button type="submit" class="btn-primary">Save
                        Event</button></div>
            </form>
        </div>
    </div>

    <div id="venueModal" class="modal-overlay">
        <div class="modal">
            <div class="modal-header">
                <h3>Add / Edit Venue</h3><button class="modal-close" onclick="closeVenueModal()"><i
                        class="fa-solid fa-times"></i></button>
            </div>
            <form id="venueForm"><input type="hidden" id="venueId">
                <div class="form-group"><label>Venue Name</label><input type="text" id="venueName" required></div>
                <div class="form-group"><label>Capacity</label><input type="number" id="venueCapacity" required></div>
                <div class="form-group"><label>Location</label><input type="text" id="venueLocation" required></div>
                <div class="form-group"><label>Facilities</label><input type="text" id="venueFacilities"
                        placeholder="Projector, AC, etc"></div>
                <div class="modal-actions"><button type="button" class="btn-outline"
                        onclick="closeVenueModal()">Cancel</button><button type="submit" class="btn-primary">Save
                        Venue</button></div>
            </form>
        </div>
    </div>

    <div id="toast" class="toast"></div>

</body>
<script src="../js/college.js"></script>
</html>
```

---

## 📄 `/asset/php/config/db.php`

```php
<?php
// config/db.php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ems');

class Database {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->conn) {
            die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . mysqli_connect_error()]));
        }
        mysqli_set_charset($this->conn, 'utf8mb4');
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }

    public function prepare($sql) {
        return mysqli_prepare($this->conn, $sql);
    }

    public function escape($string) {
        return mysqli_real_escape_string($this->conn, $string);
    }

    public function lastInsertId() {
        return mysqli_insert_id($this->conn);
    }
}

function getConn() {
    return Database::getInstance()->getConnection();
}
```

---

## 📄 `/asset/css/home.css`

```css
/* ── ROOT VARIABLES ── */
:root {
    --primary: #1e3a8a;
    --secondary: #f59e0b;
    --accent: #10b981;
    --text: #111827;
    --muted: #6b7280;
    --bg-light: #f0f4ff;
    --white: #ffffff;
    --border: #e5e7eb;
    --radius: 12px;
    --font: 'Segoe UI', system-ui, sans-serif;
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: var(--font);
    color: var(--text);
    background: var(--white);
}

/* ══════════════════════════════
   NAV
══════════════════════════════ */
header {
    position: sticky;
    top: 0;
    z-index: 50;
    background: var(--white);
    border-bottom: 1px solid var(--border);
    border-left: none;
    border-right: none;
    border-top: none;
}

nav {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    height: 64px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

nav ul {
    list-style: none;
    display: flex;
    gap: 2.5rem;
    align-items: center;
}

.nav-bar-link {
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--muted);
    transition: color 0.2s;
    padding-bottom: 2px;
}

.nav-bar-link:hover {
    color: var(--primary);
}

.nav-bar-link.active {
    color: var(--primary);
    border-bottom: 2px solid var(--primary);
}

.nav-search {
    display: flex;
    align-items: center;
    gap: 1.25rem;
}

.nav-search i {
    color: var(--muted);
    font-size: 1rem;
    cursor: pointer;
}

.nav-search a {
    text-decoration: none;
    background: var(--primary);
    color: var(--white);
    padding: 0.5rem 1.25rem;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 600;
    transition: background 0.2s;
}

.nav-search a:hover {
    background: #1e40af;
}

/* ══════════════════════════════
   HERO
══════════════════════════════ */
.hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 3rem;
    padding: 5rem 2rem;
    max-width: 1200px;
    margin: 0 auto;
    min-height: calc(100vh - 64px);
    border-bottom: 1px solid var(--border);
}

/* hero left column */
.hero > div:first-child {
    flex: 1;
    max-width: 520px;
    display: flex;
    flex-direction: column;
    gap: 0;
}

.hero > div:first-child > span:first-child {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--primary);
    background: #dbeafe;
    padding: 0.3rem 0.9rem;
    border-radius: 999px;
    margin-bottom: 1.5rem;
    width: fit-content;
}

.hero-intro {
    font-size: clamp(2rem, 3.5vw, 3rem);
    font-weight: 800;
    line-height: 1.15;
    color: var(--text);
    margin-bottom: 1.25rem;
}

.hero-intro span {
    color: var(--primary);
    font-style: italic;
    display: block;
}

.hero > div:first-child > p {
    color: var(--muted);
    font-size: 0.95rem;
    line-height: 1.7;
    margin-bottom: 2rem;
    max-width: 420px;
}

.hero-button {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.hero-button button:first-child {
    background: var(--primary);
    color: var(--white);
    border: none;
    padding: 0.75rem 1.75rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    text-transform: capitalize;
    transition: background 0.2s;
}

.hero-button button:first-child:hover {
    background: #1e40af;
}

.hero-button button:last-child {
    background: transparent;
    color: var(--primary);
    border: 2px solid var(--primary);
    padding: 0.75rem 1.75rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    text-transform: capitalize;
    transition: all 0.2s;
}

.hero-button button:last-child:hover {
    background: var(--primary);
    color: var(--white);
}

/* hero right visual */
.hero-image {
    flex: 1;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 420px;
}

.hero-image-1 {
    width: 300px;
    height: 320px;
    background: #0f172a;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 1.4rem;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    box-shadow: 0 25px 60px rgba(30, 58, 138, 0.25);
    position: relative;
    z-index: 1;
}

.hero-image-1 > span {
    font-size: 0.75rem;
    color: #94a3b8;
    letter-spacing: 0.25em;
    margin-top: 0.4rem;
}

/* Top-left card (instant check-in) */
.hero-image > .hero-image-card:first-child {
    position: absolute;
    top: 20px;
    left: -10px;
    z-index: 2;
}

/* Bottom-right card (real-time analytics) */
.hero-image > .hero-image-card:last-child {
    position: absolute;
    bottom: 30px;
    right: -10px;
    z-index: 2;
}

.hero-image-card {
    background: var(--white);
    border-radius: 12px;
    padding: 0.75rem 1rem;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    min-width: 175px;
}

.hero-image-card-start {
    display: flex;
    align-items: center;
    gap: 0.4rem;
    margin-bottom: 0.4rem;
}

.hero-image-card-start span:first-child {
    width: 28px;
    height: 28px;
    border-radius: 8px;
    display: inline-block;
    background-color: #dbeafe;
    flex-shrink: 0;
}

.hero-image-card-start span:not(:first-child) {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
    background: var(--muted);
}

.hero-image-card > span {
    display: block;
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--text);
}

.hero-image-card > p {
    font-size: 0.7rem;
    color: var(--muted);
    margin-top: 0.2rem;
}

/* ══════════════════════════════
   ABOUT / FEATURE CARDS
══════════════════════════════ */
.about-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 4rem 2rem;
    display: flex;
    gap: 1.25rem;
}

.about-cards {
    flex: 1;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 1.75rem;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    transition: box-shadow 0.2s;
}

.about-cards:hover {
    box-shadow: 0 8px 30px rgba(30, 58, 138, 0.08);
}

.about-cards i {
    font-size: 1.1rem;
    color: var(--primary);
    background: #dbeafe;
    width: 42px;
    height: 42px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.about-cards span {
    font-size: 1rem;
    font-weight: 700;
    color: var(--text);
    text-transform: capitalize;
}

.about-cards p {
    font-size: 0.85rem;
    color: var(--muted);
    line-height: 1.6;
}

/* ══════════════════════════════
   EVENTS SECTION
══════════════════════════════ */
.event-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 4rem 2rem;
}

.event-wrapper-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 2.5rem;
}

.event-wrapper > span,
.event-wrapper-header > div > span {
    display: block;
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--text);
    margin-bottom: 0.5rem;
    text-transform: capitalize;
}

.event-wrapper > p,
.event-wrapper-header > div > p {
    color: var(--muted);
    font-size: 0.9rem;
    max-width: 480px;
    line-height: 1.6;
}

/* "View All Events" link */
.event-wrapper-header > a {
    display: flex;
    align-items: center;
    gap: 0.4rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--primary);
    text-decoration: none;
    white-space: nowrap;
    margin-top: 0.5rem;
    transition: gap 0.2s;
}

.event-wrapper-header > a:hover {
    gap: 0.65rem;
}

.events-card-wrapper {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
}

.events-cards {
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
    background: var(--white);
    transition: box-shadow 0.2s;
}

.events-cards:hover {
    box-shadow: 0 8px 30px rgba(30, 58, 138, 0.1);
}

.events-cards-image {
    width: 100%;
    height: 180px;
    background: #0f172a;
    overflow: hidden;
    position: relative;
}

.events-cards-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Category badge on the image */
.events-cards-image .event-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    font-size: 0.65rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: 0.25rem 0.6rem;
    border-radius: 999px;
    background: rgba(255, 255, 255, 0.15);
    color: var(--white);
    backdrop-filter: blur(4px);
    border: 1px solid rgba(255, 255, 255, 0.25);
}

.events-cards-content {
    padding: 1.25rem;
    display: flex;
    flex-direction: column;
    gap: 0.6rem;
}

/* Date + time row */
.events-cards-content > span:first-child {
    display: flex;
    align-items: center;
    gap: 0.4rem;
    font-size: 0.75rem;
    color: var(--muted);
    flex-wrap: wrap;
}

.events-cards-content > span:first-child i {
    font-size: 0.7rem;
}

.events-cards-content > span:first-child p {
    margin: 0;
    font-size: 0.75rem;
    color: var(--muted);
}

/* Event title */
.events-cards-content > span:nth-child(2) {
    font-size: 1rem;
    font-weight: 700;
    color: var(--text);
    text-transform: capitalize;
    line-height: 1.3;
}

/* Description */
.events-cards-content > p {
    font-size: 0.82rem;
    color: var(--muted);
    line-height: 1.6;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-warpper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 0.5rem;
    gap: 0.5rem;
}

.card-warpper button:first-child {
    background: var(--primary);
    color: var(--white);
    border: none;
    padding: 0.5rem 1.1rem;
    border-radius: 7px;
    font-size: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    text-transform: capitalize;
    transition: background 0.2s;
}

.card-warpper button:first-child:hover {
    background: #1e40af;
}

.card-warpper button:last-child {
    background: transparent;
    border: 1px solid var(--border);
    color: var(--muted);
    padding: 0.45rem 0.85rem;
    border-radius: 7px;
    font-size: 0.8rem;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.35rem;
    transition: border-color 0.2s;
}

.card-warpper button:last-child:hover {
    border-color: var(--primary);
    color: var(--primary);
}

/* ══════════════════════════════
   HOW IT WORKS
══════════════════════════════ */
#how-it-works {
    padding: 5rem 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.work-wrapper {
    text-align: center;
    margin-bottom: 3rem;
}

.work-wrapper h2 {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--text);
    margin-bottom: 0.5rem;
}

.work-wrapper p {
    color: var(--muted);
    font-size: 0.9rem;
}

.work-cards {
    display: flex;
    gap: 2rem;
    justify-content: space-between;
    align-items: flex-start;
}

.work-cards > div {
    flex: 1;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
}

.work-icon {
    width: 64px;
    height: 64px;
    background: #f0f4ff;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    color: var(--primary);
    margin-bottom: 0.25rem;
}

.work-cards h3 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--text);
}

.work-cards p {
    font-size: 0.85rem;
    color: var(--muted);
    line-height: 1.6;
    max-width: 220px;
}

/* hide the decorative span used as divider */
.work-cards span.h-full {
    display: none;
}

/* ══════════════════════════════
   CTA
══════════════════════════════ */
#cta {
    margin: 3rem 2rem;
}

#cta > div {
    background: var(--primary);
    border-radius: 20px;
    padding: 3rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 2rem;
    width: 100%;
}

.cta-content h2 {
    font-size: 1.6rem;
    font-weight: 800;
    color: var(--white);
    max-width: 380px;
    line-height: 1.3;
    margin-bottom: 0.5rem;
}

.cta-content p {
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.7);
    max-width: 360px;
}

.cta-buttons {
    display: flex;
    gap: 0.75rem;
    flex-shrink: 0;
}

.cta-buttons button:first-child {
    background: var(--white);
    color: var(--primary);
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 700;
    font-size: 0.875rem;
    cursor: pointer;
    transition: opacity 0.2s;
}

.cta-buttons button:first-child:hover {
    opacity: 0.9;
}

.cta-buttons button:last-child {
    background: rgba(255, 255, 255, 0.15);
    color: var(--white);
    border: 1px solid rgba(255, 255, 255, 0.3);
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 700;
    font-size: 0.875rem;
    cursor: pointer;
    transition: background 0.2s;
}

.cta-buttons button:last-child:hover {
    background: rgba(255, 255, 255, 0.25);
}

/* ══════════════════════════════
   FOOTER
══════════════════════════════ */
footer {
    background: #0f172a;
    padding: 3rem 2rem 1.5rem;
}

.footer-wrapepr {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1.5fr;
    gap: 2.5rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    margin-bottom: 1.5rem;
}

footer > p {
    text-align: center;
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.35);
    max-width: 1200px;
    margin: 0 auto;
}

.footer-links {
    font-size: 0.85rem;
    color: rgba(255, 255, 255, 0.6);
    cursor: pointer;
    transition: color 0.2s;
    text-decoration: none;
    display: block;
}

.footer-links:hover {
    color: var(--white);
}

footer input {
    width: 100%;
    height: 2.5rem;
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px 0 0 8px;
    padding: 0 0.75rem;
    color: var(--white);
    font-size: 0.85rem;
    outline: none;
    border-right: none;
}

footer input::placeholder {
    color: rgba(255, 255, 255, 0.4);
}

footer button.footer-button {
    margin-top: 0;
    background: var(--primary);
    border: none;
    color: var(--white);
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 0 8px 8px 0;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
    flex-shrink: 0;
}

footer button.footer-button:hover {
    background: #1e40af;
}

/* Footer social icons row */
.footer-socials {
    display: flex;
    gap: 0.75rem;
    margin-top: 0.5rem;
}

.footer-socials a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.08);
    color: rgba(255, 255, 255, 0.6);
    text-decoration: none;
    font-size: 0.85rem;
    transition: background 0.2s, color 0.2s;
}

.footer-socials a:hover {
    background: rgba(255, 255, 255, 0.15);
    color: var(--white);
}

/* ── Legacy footer-link class ── */
.footer-link {
    text-decoration: none;
    color: #fff;
    font-size: 0.9rem;
    position: relative;
}

.footer-link::before {
    content: "➤";
    position: absolute;
    left: -14px;
    top: 50%;
    transform: translateY(-50%);
}

/* ══════════════════════════════
   SECTION BG ALTERNATION
══════════════════════════════ */
section:nth-of-type(even) {
    background: var(--bg-light);
}
```

---

## 📄 `/asset/css/login.css`

```css
/* RESET */
* {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', sans-serif;
}

/* BODY */
body {
    background: #f4f6fb;
}

/* NAVBAR */
.navbar {
    display: flex;
    justify-content: space-between;
    padding: 15px 40px;
    background: white;
    align-items: center;
}

.navbar ul {
    display: flex;
    list-style: none;
    gap: 20px;
}

.navbar a {
    text-decoration: none;
    color: black;
}

.btn {
    background: #2b4eff;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 20px;
}

/* HERO */
.hero {
    display: flex;
    justify-content: space-between;
    padding: 60px;
    align-items: center;
}

.hero-text h1 {
    font-size: 40px;
}

.hero-text span {
    color: #2b4eff;
}

.hero-text p {
    margin: 20px 0;
    color: gray;
}

.hero-buttons button {
    padding: 10px 20px;
    margin-right: 10px;
    border-radius: 8px;
    border: none;
}

.primary {
    background: #2b4eff;
    color: white;
}

.hero-card {
    width: 300px;
    height: 200px;
    background: #0f1c3f;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 20px;
}

/* FEATURES */
.features {
    display: flex;
    justify-content: space-around;
    padding: 40px;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 10px;
}

/* EVENTS */
.events {
    padding: 40px;
}

.event-grid {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

.event-card {
    background: white;
    padding: 20px;
    border-radius: 10px;
    width: 200px;
}

/* LOGIN */
.center {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-box {
    background: white;
    padding: 30px;
    border-radius: 10px;
    width: 300px;
}

.login-box input {
    width: 100%;
    margin: 10px 0;
    padding: 10px;
}

.login-box button {
    width: 100%;
    padding: 10px;
    background: #2b4eff;
    color: white;
    border: none;
}

/* BACKGROUND */
.login-bg {
    height: 100vh;
    background: linear-gradient(135deg, #e8ecff, #f6f7fb);
    display: flex;
    justify-content: center;
    align-items: center;
}

/* LOGIN BOX */
.login-container {
    background: white;
    padding: 40px;
    width: 350px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    text-align: center;
}

/* LOGO */
.logo {
    color: #2b4eff;
    margin-bottom: 5px;
}

.subtitle {
    font-size: 14px;
    color: gray;
    margin-bottom: 20px;
}

/* ROLE SWITCH */
.role-switch {
    display: flex;
    background: #f1f2f6;
    border-radius: 10px;
    margin-bottom: 20px;
}

.role-switch button {
    flex: 1;
    padding: 8px;
    border: none;
    background: transparent;
    cursor: pointer;
}

.role-switch .active {
    background: white;
    border-radius: 10px;
    font-weight: bold;
}

/* INPUT */
.login-container input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 8px;
    border: 1px solid #ddd;
}

/* FORGOT */
.forgot {
    text-align: right;
    font-size: 12px;
    margin-bottom: 10px;
}

/* BUTTON */
.login-btn {
    width: 100%;
    padding: 12px;
    background: #2b4eff;
    color: white;
    border: none;
    border-radius: 8px;
    margin-top: 10px;
    cursor: pointer;
}

/* REGISTER TEXT */
.register-text {
    margin-top: 15px;
    font-size: 13px;
}
```

---

## 📄 `/asset/css/sign.css`

```css
/* ── RESET ──────────────────────────────────── */
*, *::before, *::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* ── ROOT ───────────────────────────────────── */
:root {
    --primary:      #1e3a8a;
    --primary-lt:   #3b5bdb;
    --primary-bg:   #eef2ff;
    --accent:       #10b981;
    --danger:       #ef4444;
    --success:      #10b981;
    --text:         #0f172a;
    --text-mid:     #475569;
    --text-light:   #94a3b8;
    --border:       #e2e8f0;
    --white:        #ffffff;
    --bg:           #f1f5ff;
    --radius:       12px;
    --radius-sm:    8px;
    --shadow:       0 16px 48px rgba(30, 58, 138, 0.12);
    --font:         'Segoe UI', system-ui, sans-serif;
}

/* ── BODY ───────────────────────────────────── */
body, .login-bg {
    min-height: 100vh;
    background: radial-gradient(ellipse at 60% 0%, #dde6ff 0%, #f0f4ff 45%, #f8fafc 100%);
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 2.5rem 1rem;
    font-family: var(--font);
    color: var(--text);
}

/* ── CONTAINERS ─────────────────────────────── */
.login-container,
.register-container {
    background: var(--white);
    width: 100%;
    max-width: 420px;
    border-radius: 20px;
    padding: 2.5rem 2rem;
    box-shadow: var(--shadow);
    border: 1px solid rgba(30, 58, 138, 0.07);
}

/* ── LOGO ───────────────────────────────────── */
.logo {
    font-size: 1.75rem;
    font-weight: 800;
    background: linear-gradient(135deg, var(--primary), var(--primary-lt));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    text-align: center;
    margin-bottom: 0.25rem;
}

.subtitle {
    text-align: center;
    font-size: 0.875rem;
    color: var(--text-mid);
    margin-bottom: 1.5rem;
}

/* ── ROLE SWITCH ────────────────────────────── */
.role-switch {
    display: flex;
    background: var(--bg);
    border-radius: 10px;
    padding: 4px;
    margin-bottom: 1.25rem;
    gap: 4px;
}

.role-switch button {
    flex: 1;
    padding: 0.55rem 0;
    border: none;
    background: transparent;
    border-radius: 7px;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-mid);
    cursor: pointer;
    transition: all 0.2s;
    font-family: var(--font);
}

.role-switch button:hover {
    color: var(--primary);
}

.role-switch button.active {
    background: var(--white);
    color: var(--primary);
    box-shadow: 0 2px 8px rgba(30, 58, 138, 0.15);
}

/* ── BANNERS ────────────────────────────────── */
.auth-error,
.auth-success {
    padding: 0.65rem 1rem;
    border-radius: var(--radius-sm);
    font-size: 0.82rem;
    font-weight: 500;
    margin-bottom: 1rem;
    display: none;
}

.auth-error {
    background: #fef2f2;
    color: #991b1b;
    border: 1px solid #fecaca;
}

.auth-success {
    background: #f0fdf4;
    color: #166534;
    border: 1px solid #bbf7d0;
}

/* ── FORM SECTION ───────────────────────────── */
.form-section {
    background: var(--bg);
    border-radius: var(--radius);
    padding: 1rem 1rem 0.5rem;
    margin-bottom: 1rem;
    border: 1px solid rgba(30, 58, 138, 0.06);
    transition: box-shadow 0.2s;
}

.form-section:focus-within {
    box-shadow: 0 4px 16px rgba(30, 58, 138, 0.08);
}

.section-title {
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--primary);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

/* ── INPUT BOX (icon + input) ───────────────── */
.input-box {
    display: flex;
    align-items: center;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    padding: 0 0.9rem;
    height: 44px;
    margin-bottom: 0.65rem;
    transition: border-color 0.2s, box-shadow 0.2s;
    gap: 0.6rem;
}

.input-box:focus-within {
    border-color: var(--primary-lt);
    box-shadow: 0 0 0 3px rgba(59, 91, 219, 0.12);
}

.input-box i {
    font-size: 0.85rem;
    color: var(--text-light);
    flex-shrink: 0;
    width: 14px;
    text-align: center;
}

.input-box input {
    flex: 1;
    border: none;
    background: transparent;
    outline: none;
    font-size: 0.875rem;
    color: var(--text);
    font-family: var(--font);
    height: 100%;
}

.input-box input::placeholder {
    color: var(--text-light);
}

/* toggle password eye icon */
.toggle-pw {
    cursor: pointer;
    font-size: 0.85rem !important;
    color: var(--text-light) !important;
    transition: color 0.2s;
}

.toggle-pw:hover {
    color: var(--primary) !important;
}

/* ── SELECT BOX ─────────────────────────────── */
.select-box {
    display: flex;
    align-items: center;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    padding: 0 0.9rem;
    height: 44px;
    margin-bottom: 0.65rem;
    gap: 0.6rem;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.select-box:focus-within {
    border-color: var(--primary-lt);
    box-shadow: 0 0 0 3px rgba(59, 91, 219, 0.12);
}

.select-box i {
    font-size: 0.85rem;
    color: var(--text-light);
    flex-shrink: 0;
    width: 14px;
    text-align: center;
}

.select-box select {
    flex: 1;
    border: none;
    background: transparent;
    outline: none;
    font-size: 0.875rem;
    color: var(--text);
    font-family: var(--font);
    height: 100%;
    cursor: pointer;
    appearance: none;
    -webkit-appearance: none;
}

/* keep old raw select inside form-section working too */
.form-section > select,
.login-container select,
.register-container > select {
    width: 100%;
    padding: 0.65rem 0.9rem;
    margin-bottom: 0.65rem;
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    background: var(--white);
    font-size: 0.875rem;
    font-family: var(--font);
    color: var(--text);
    outline: none;
    appearance: none;
    cursor: pointer;
    transition: border-color 0.2s;
}

.form-section > select:focus {
    border-color: var(--primary-lt);
    box-shadow: 0 0 0 3px rgba(59, 91, 219, 0.12);
}

/* ── PASSWORD STRENGTH ──────────────────────── */
.pw-strength-bar {
    height: 4px;
    background: var(--border);
    border-radius: 999px;
    margin: 0 0 0.35rem;
    overflow: hidden;
}

.pw-strength-fill {
    height: 100%;
    width: 0%;
    border-radius: 999px;
    transition: width 0.3s, background 0.3s;
}

.pw-strength-label {
    font-size: 0.7rem;
    font-weight: 600;
    text-align: right;
    min-height: 1rem;
    margin-bottom: 0.25rem;
}

/* ── FORGOT ─────────────────────────────────── */
.forgot {
    text-align: right;
    font-size: 0.75rem;
    margin-bottom: 0.75rem;
}

.forgot a {
    color: var(--primary-lt);
    text-decoration: none;
    font-weight: 500;
}

.forgot a:hover {
    text-decoration: underline;
}

/* ── SUBMIT BUTTON ──────────────────────────── */
.login-btn {
    width: 100%;
    padding: 0.8rem;
    background: var(--primary);
    color: var(--white);
    border: none;
    border-radius: var(--radius-sm);
    font-size: 0.925rem;
    font-weight: 700;
    font-family: var(--font);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 0.5rem;
    transition: background 0.2s, transform 0.15s;
}

.login-btn:hover:not(:disabled) {
    background: #1e40af;
    transform: translateY(-1px);
}

.login-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

/* ── SPINNER ────────────────────────────────── */
.spinner {
    width: 16px;
    height: 16px;
    border: 2px solid rgba(255, 255, 255, 0.4);
    border-top-color: var(--white);
    border-radius: 50%;
    animation: spin 0.7s linear infinite;
    display: inline-block;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* ── BOTTOM TEXT ────────────────────────────── */
.register-text {
    text-align: center;
    margin-top: 1.25rem;
    font-size: 0.82rem;
    color: var(--text-mid);
}

.register-text a {
    color: var(--primary-lt);
    font-weight: 600;
    text-decoration: none;
}

.register-text a:hover {
    text-decoration: underline;
}

/* ── ROLE FIELDS (toggled by JS) ────────────── */
.role-fields {
    display: none;
}

/* ── RESPONSIVE ─────────────────────────────── */
@media (max-width: 480px) {
    .login-container,
    .register-container {
        padding: 1.75rem 1.25rem;
        border-radius: 16px;
    }
}
```

---

## 📄 `/asset/css/college.css`

```css
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    --primary: #1e3a8a;
    --primary-dk: #0f2b6d;
    --primary-light: #3b5bdb;
    --secondary: #f59e0b;
    --accent-teal: #0ea5b0;
    --accent-amber: #f59e0b;
    --text-dark: #0f172a;
    --text-mid: #334155;
    --text-light: #64748b;
    --bg: #f8fafc;
    --white: #ffffff;
    --border: #e2e8f0;
    --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.04);
    --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 12px 32px rgba(0, 0, 0, 0.1);
    --radius: 16px;
    --radius-md: 12px;
    --radius-sm: 8px;
    --success: #10b981;
    --danger: #ef4444;
    --warning: #f59e0b;
}

body {
    font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
    background: var(--bg);
    color: var(--text-dark);
    line-height: 1.5;
}

/* Header */
.admin-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 48px;
    height: 70px;
    background: var(--white);
    border-bottom: 1px solid var(--border);
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: var(--shadow-sm);
}

.logo {
    font-family: 'Inter', sans-serif;
    font-size: 1.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.admin-badge {
    background: var(--primary-light);
    color: white;
    padding: 6px 14px;
    border-radius: 40px;
    font-size: 0.75rem;
    font-weight: 600;
    margin-left: 12px;
}

nav ul {
    display: flex;
    list-style: none;
    gap: 12px;
}

.nav-btn {
    background: none;
    border: none;
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--text-mid);
    padding: 8px 20px;
    border-radius: 40px;
    cursor: pointer;
    transition: all 0.2s;
    font-family: inherit;
}

.nav-btn:hover {
    background: var(--bg);
    color: var(--primary);
}

.nav-btn.active {
    background: var(--primary);
    color: white;
    box-shadow: 0 2px 8px rgba(30, 58, 138, 0.3);
}

.header-right {
    display: flex;
    align-items: center;
    gap: 24px;
}

.admin-info {
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
    padding: 6px 12px;
    border-radius: 40px;
    transition: background 0.2s;
}

.admin-info:hover {
    background: var(--bg);
}

.admin-avatar {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    overflow: hidden;
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
}

.admin-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.admin-name {
    font-weight: 600;
    color: var(--text-dark);
}

.admin-role {
    font-size: 0.7rem;
    color: var(--text-light);
}

.logout-link {
    text-decoration: none;
    color: var(--text-mid);
    font-weight: 500;
    transition: color 0.2s;
}

.logout-link:hover {
    color: var(--danger);
}

/* Main Container */
.dashboard-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 32px 24px 60px;
}

/* Page Sections */
.admin-page {
    display: none;
    animation: fadeIn 0.3s ease;
}

.admin-page.active {
    display: block;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(8px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    margin-bottom: 40px;
}

.stat-card {
    background: var(--white);
    border-radius: var(--radius);
    padding: 24px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border);
    transition: transform 0.2s, box-shadow 0.2s;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
}

.stat-left h3 {
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--text-dark);
}

.stat-left p {
    font-size: 0.85rem;
    color: var(--text-light);
    font-weight: 500;
}

.stat-icon {
    width: 52px;
    height: 52px;
    background: #eef2ff;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: var(--primary);
}

/* Section Header */
.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    flex-wrap: wrap;
    gap: 16px;
}

.section-header h2 {
    font-size: 1.35rem;
    font-weight: 700;
    color: var(--text-dark);
}

.btn-primary {
    background: var(--primary);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: background 0.2s;
}

.btn-primary:hover {
    background: var(--primary-dk);
}

.btn-outline {
    background: transparent;
    border: 1px solid var(--border);
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
}

.btn-outline:hover {
    border-color: var(--primary);
    color: var(--primary);
}

.btn-danger {
    background: var(--danger);
    color: white;
    border: none;
    padding: 6px 14px;
    border-radius: 6px;
    font-size: 0.75rem;
    cursor: pointer;
    transition: opacity 0.2s;
}

.btn-danger:hover {
    opacity: 0.8;
}

.btn-sm {
    padding: 4px 12px;
    font-size: 0.7rem;
}

/* Tables */
.data-table-wrapper {
    background: var(--white);
    border-radius: var(--radius);
    border: 1px solid var(--border);
    overflow-x: auto;
    box-shadow: var(--shadow-sm);
}

.data-table {
    width: 100%;
    border-collapse: collapse;
}

.data-table th,
.data-table td {
    padding: 16px 20px;
    text-align: left;
    border-bottom: 1px solid var(--border);
}

.data-table th {
    background: var(--bg);
    font-weight: 700;
    color: var(--text-mid);
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.data-table tr:hover {
    background: var(--bg);
}

.badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.7rem;
    font-weight: 600;
    display: inline-block;
}

.badge-tech {
    background: #dee0ff;
    color: #293ca0;
}

.badge-cultural {
    background: #ffdcc6;
    color: #713700;
}

.badge-workshop {
    background: #d4edda;
    color: #155724;
}

.badge-sports {
    background: #fff3cd;
    color: #856404;
}

.badge-academic {
    background: #cce7ff;
    color: #0047ab;
}

.action-icons i {
    margin: 0 6px;
    cursor: pointer;
    color: var(--text-light);
    transition: color 0.2s;
}

.action-icons i:hover {
    color: var(--primary);
}

.action-icons .fa-trash-alt:hover {
    color: var(--danger);
}

/* Modal */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s;
}

.modal-overlay.active {
    opacity: 1;
    visibility: visible;
}

.modal {
    background: var(--white);
    border-radius: var(--radius);
    width: 90%;
    max-width: 550px;
    max-height: 85vh;
    overflow-y: auto;
    padding: 28px;
    box-shadow: var(--shadow-lg);
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}

.modal-header h3 {
    font-size: 1.3rem;
    font-weight: 700;
}

.modal-close {
    background: none;
    border: none;
    font-size: 1.2rem;
    cursor: pointer;
    color: var(--text-light);
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-size: 0.8rem;
    font-weight: 600;
    margin-bottom: 6px;
    color: var(--text-mid);
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 14px;
    border: 1px solid var(--border);
    border-radius: 10px;
    font-family: inherit;
    font-size: 0.9rem;
    outline: none;
    transition: border-color 0.2s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: var(--primary);
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

.modal-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 24px;
}

/* Profile Section inside Admin */
.admin-profile-layout {
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 32px;
}

.admin-profile-card {
    background: var(--white);
    border-radius: var(--radius);
    padding: 32px 24px;
    text-align: center;
    border: 1px solid var(--border);
}

.admin-profile-avatar {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 20px;
    border: 4px solid var(--primary-light);
}

.admin-profile-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.admin-profile-name {
    font-size: 1.4rem;
    font-weight: 800;
    margin-bottom: 6px;
}

.admin-profile-role {
    background: #eef2ff;
    color: var(--primary);
    padding: 4px 16px;
    border-radius: 40px;
    font-size: 0.75rem;
    font-weight: 600;
    display: inline-block;
}

.admin-info-grid {
    background: var(--white);
    border-radius: var(--radius);
    padding: 32px;
    border: 1px solid var(--border);
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 28px;
}

/* Toast */
.toast {
    position: fixed;
    bottom: 28px;
    right: 28px;
    background: var(--text-dark);
    color: #fff;
    padding: 14px 22px;
    border-radius: 10px;
    font-size: 0.875rem;
    font-weight: 500;
    z-index: 9999;
    opacity: 0;
    transform: translateY(12px);
    transition: opacity 0.3s, transform 0.3s;
    pointer-events: none;
}

.toast.show {
    opacity: 1;
    transform: translateY(0);
}

.toast.success {
    background: #065f46;
}

.toast.error {
    background: #991b1b;
}

/* Footer */
footer {
    background: var(--white);
    border-top: 1px solid var(--border);
    margin-top: 60px;
}

.footer-wrapper {
    max-width: 1400px;
    margin: 0 auto;
    padding: 40px 24px 24px;
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 2fr;
    gap: 40px;
}

.footer-bottom {
    text-align: center;
    padding: 20px;
    border-top: 1px solid var(--border);
    font-size: 0.75rem;
    color: var(--text-light);
}

/* ── Image Upload ── */
.image-upload-area {
    border: 2px dashed var(--border);
    border-radius: var(--radius-md);
    cursor: pointer;
    overflow: hidden;
    transition: border-color 0.2s, background 0.2s;
    min-height: 140px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    background: var(--bg);
}

.image-upload-area:hover {
    border-color: var(--primary);
    background: #eef2ff;
}

.image-upload-area.has-image {
    border-style: solid;
    border-color: var(--primary);
    min-height: 200px;
}

.image-upload-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    color: var(--text-light);
    padding: 24px;
    pointer-events: none;
}

.image-upload-placeholder i {
    font-size: 2rem;
    color: var(--primary);
    opacity: 0.6;
}

.image-upload-placeholder span {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-mid);
}

.image-upload-placeholder p {
    font-size: 0.75rem;
    color: var(--text-light);
}

.image-preview {
    width: 100%;
    height: 200px;
    object-fit: cover;
    display: block;
    pointer-events: none;
}

.btn-remove-image {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: 8px;
    background: none;
    border: 1px solid var(--border);
    color: var(--danger);
    font-size: 0.75rem;
    font-weight: 600;
    padding: 5px 12px;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.2s, border-color 0.2s;
}

.btn-remove-image:hover {
    background: #fef2f2;
    border-color: var(--danger);
}
```

---

## 📄 `/asset/css/stshome.css`

```css
@import url('https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,400;0,500;0,600;1,400&display=swap');

*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  --primary: #1a1aaf;
  --primary-dark: #12127e;
  --primary-light: #eeeeff;
  --accent-orange: #f97316;
  --accent-teal: #0ea5b0;
  --accent-amber: #f59e0b;
  --text-dark: #0f0f1a;
  --text-mid: #444466;
  --text-light: #888aaa;
  --border: #e4e5f0;
  --bg: #f5f6fb;
  --white: #ffffff;
  --card-shadow: 0 2px 14px rgba(26, 26, 175, 0.07);
  --card-shadow-hover: 0 12px 36px rgba(26, 26, 175, 0.14);
  --radius: 14px;
  --radius-sm: 8px;
}

html {
  scroll-behavior: smooth;
}

body {
  font-family: 'DM Sans', sans-serif;
  background: var(--bg);
  color: var(--text-dark);
  line-height: 1.6;
}

/* ── HIDDEN BY DEFAULT (JS toggles) ── */
.register,
.student-profile,
.sts-events-page {
  display: none;
}

/* ── HEADER ── */
header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 48px;
  height: 64px;
  background: var(--white);
  border-bottom: 1px solid var(--border);
  position: sticky;
  top: 0;
  z-index: 100;
  gap: 24px;
}

header>span {
  font-family: 'Sora', sans-serif;
  font-size: 1.25rem;
  font-weight: 800;
  color: var(--primary);
  letter-spacing: -0.5px;
  white-space: nowrap;
}

header nav ul {
  display: flex;
  list-style: none;
  gap: 4px;
}

header nav ul li button {
  background: none;
  border: none;
  font-family: 'DM Sans', sans-serif;
  font-size: 0.9rem;
  font-weight: 500;
  color: var(--text-mid);
  padding: 7px 16px;
  border-radius: 7px;
  cursor: pointer;
  transition: color 0.2s, background 0.2s;
}

header nav ul li button:hover {
  color: var(--primary);
  background: var(--primary-light);
}

header nav ul li button.active {
  color: var(--primary);
  font-weight: 600;
  background: var(--primary-light);
}

header>div {
  display: flex;
  align-items: center;
  gap: 16px;
}

.header-search {
  display: flex;
  align-items: center;
  gap: 8px;
  background: var(--bg);
  border: 1px solid var(--border);
  border-radius: 8px;
  padding: 7px 14px;
  width: 220px;
  transition: border-color 0.2s;
}

.header-search:focus-within {
  border-color: var(--primary);
}

.header-search i {
  color: var(--text-light);
  font-size: 0.85rem;
  flex-shrink: 0;
}

.header-search input {
  border: none;
  background: transparent;
  outline: none;
  font-family: 'DM Sans', sans-serif;
  font-size: 0.875rem;
  color: var(--text-dark);
  width: 100%;
}

.header-search input::placeholder {
  color: var(--text-light);
}

header>div>a {
  text-decoration: none;
  font-size: 0.875rem;
  font-weight: 500;
  color: var(--text-mid);
  transition: color 0.2s;
  white-space: nowrap;
}

header>div>a:hover {
  color: var(--primary);
}

/* ─────────────────────────────────────────────────
   HOME PAGE
───────────────────────────────────────────────── */
.sts-hero {
  max-width: 1120px;
  margin: 0 auto;
  padding: 48px 24px 72px;
}

/* Intro row */
.sts-intro {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  margin-bottom: 40px;
  gap: 24px;
}

.sts-intro-text {}

.sts-intro-text>span {
  font-family: 'Sora', sans-serif;
  font-size: 2rem;
  font-weight: 800;
  color: var(--text-dark);
  line-height: 1.2;
  display: block;
}

.sts-intro-text p {
  font-size: 0.95rem;
  color: var(--text-mid);
  margin-top: 6px;
}

.btn-explore-all {
  align-self: center;
  background: var(--primary);
  color: #fff;
  font-family: 'DM Sans', sans-serif;
  font-size: 0.875rem;
  font-weight: 600;
  padding: 12px 22px;
  border-radius: 9px;
  border: none;
  cursor: pointer;
  white-space: nowrap;
  transition: background 0.2s, transform 0.15s;
  flex-shrink: 0;
}

.btn-explore-all:hover {
  background: var(--primary-dark);
  transform: translateY(-1px);
}

/* Stats cards */
.sts-stats {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  margin-bottom: 52px;
}

.sts-event-card {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 24px 28px;
  display: flex;
  align-items: center;
  gap: 20px;
  box-shadow: var(--card-shadow);
  transition: box-shadow 0.2s;
}

.sts-event-card:hover {
  box-shadow: var(--card-shadow-hover);
}

.sts-event-card-icon {
  width: 50px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 12px;
  font-size: 1.25rem;
  flex-shrink: 0;
}

.sts-event-card-icon.blue {
  background: #e8e8ff;
  color: var(--primary);
}

.sts-event-card-icon.teal {
  background: #e0f7f9;
  color: var(--accent-teal);
}

.sts-event-card-icon.amber {
  background: #fff3e0;
  color: var(--accent-amber);
}

.sts-event-intro {
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.sts-event-intro span:first-child {
  font-size: 0.72rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.07em;
  color: var(--text-light);
}

.sts-event-intro span:last-child {
  font-family: 'Sora', sans-serif;
  font-size: 1.9rem;
  font-weight: 800;
  color: var(--text-dark);
  line-height: 1;
}

/* Upcoming events section */
.sts-section-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 24px;
}

.sts-section-header h2 {
  font-family: 'Sora', sans-serif;
  font-size: 1.35rem;
  font-weight: 700;
  color: var(--text-dark);
}

.sts-section-header a {
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--primary);
  text-decoration: none;
  display: flex;
  align-items: center;
  gap: 4px;
  transition: gap 0.2s;
}

.sts-section-header a:hover {
  gap: 8px;
}

.sts-upcoming-events {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}

.sts-upcoming-event-card {
  background: var(--white);
  border-radius: var(--radius);
  overflow: hidden;
  border: 1px solid var(--border);
  box-shadow: var(--card-shadow);
  display: flex;
  flex-direction: column;
  transition: transform 0.25s, box-shadow 0.25s;
}

.sts-upcoming-event-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--card-shadow-hover);
}

/* Card image with badge */
.sts-card-img-wrap {
  position: relative;
  height: 185px;
  overflow: hidden;
}

.sts-card-img-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.4s;
}

.sts-upcoming-event-card:hover .sts-card-img-wrap img {
  transform: scale(1.04);
}

.sts-card-badge {
  position: absolute;
  top: 12px;
  right: 12px;
  padding: 4px 10px;
  border-radius: 20px;
  font-size: 0.68rem;
  font-weight: 700;
  letter-spacing: 0.06em;
  text-transform: uppercase;
}

.sts-card-badge.tech {
  background: #dbeafe;
  color: #1d4ed8;
}

.sts-card-badge.cultural {
  background: #fef3c7;
  color: #b45309;
}

.sts-card-badge.workshop {
  background: #d1fae5;
  color: #065f46;
}

.sts-card-badge.sports {
  background: #fce7f3;
  color: #9d174d;
}

.sts-card-badge.default {
  background: #ede9fe;
  color: #6d28d9;
}

.sts-upcoming-event-intro {
  padding: 20px;
  display: flex;
  flex-direction: column;
  gap: 14px;
  flex: 1;
}

.sts-upcomming-wrapper {
  display: flex;
  flex-direction: column;
  gap: 6px;
  flex: 1;
}

.sts-upcomming-wrapper .ev-name {
  font-family: 'Sora', sans-serif;
  font-size: 1rem;
  font-weight: 700;
  color: var(--text-dark);
  line-height: 1.35;
}

.ev-meta {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.8rem;
  color: var(--text-mid);
  font-weight: 500;
}

.ev-meta i {
  color: var(--text-light);
  font-size: 0.75rem;
  width: 14px;
  text-align: center;
}

.ev-sep {
  color: var(--border);
  margin: 0 2px;
}

.ev-desc {
  font-size: 0.8rem;
  color: var(--text-light);
  margin-top: 2px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  line-height: 1.5;
}

.btn-register {
  width: 100%;
  padding: 12px;
  background: var(--primary);
  color: #fff;
  border: none;
  border-radius: 9px;
  font-family: 'DM Sans', sans-serif;
  font-size: 0.9rem;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.2s, transform 0.15s;
  letter-spacing: 0.01em;
}

.btn-register:hover {
  background: var(--primary-dark);
  transform: translateY(-1px);
}

/* ─────────────────────────────────────────────────
   REGISTERED PAGE
───────────────────────────────────────────────── */
.register {
  max-width: 1120px;
  margin: 0 auto;
  padding: 48px 24px 72px;
}

.register-intro {
  margin-bottom: 36px;
}

.register-intro>span:first-child {
  font-size: 0.72rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--primary);
  display: block;
  margin-bottom: 6px;
}

.register-intro>span:last-of-type {
  font-family: 'Sora', sans-serif;
  font-size: 1.75rem;
  font-weight: 800;
  color: var(--text-dark);
  display: block;
  margin-bottom: 8px;
}

.register-intro p {
  font-size: 0.95rem;
  color: var(--text-mid);
}

.register-card-wrapepr {
  display: grid;
  grid-template-columns: 280px 1fr;
  gap: 28px;
  align-items: start;
}

.regsiter-card-wrapper-aaside {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.aside-card {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 20px;
  box-shadow: var(--card-shadow);
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.card-1 {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 12px 0;
  border-bottom: 1px solid var(--border);
}

.card-1:last-of-type {
  border-bottom: none;
}

.card-1 span:first-child {
  font-size: 0.83rem;
  color: var(--text-mid);
  font-weight: 500;
}

.card-1 span:last-child {
  font-family: 'Sora', sans-serif;
  font-size: 1.5rem;
  font-weight: 800;
  color: var(--primary);
}

.card-3 {
  background: var(--primary-light);
  border-radius: 8px;
  padding: 10px 14px;
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--primary);
  cursor: pointer;
  text-align: center;
  transition: background 0.2s;
}

.card-3:hover {
  background: #dddeff;
}

.register-wrapper-aaside-card-2 {
  background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
  border-radius: var(--radius);
  padding: 20px;
  color: #fff;
}

.register-wrapper-aaside-card-2 span {
  font-family: 'Sora', sans-serif;
  font-size: 1rem;
  font-weight: 700;
  display: block;
  margin-bottom: 6px;
}

.register-wrapper-aaside-card-2 p {
  font-size: 0.83rem;
  opacity: 0.8;
  margin-bottom: 14px;
}

.register-wrapper-aaside-card-2 button {
  background: rgba(255, 255, 255, 0.15);
  border: 1px solid rgba(255, 255, 255, 0.3);
  color: #fff;
  font-family: 'DM Sans', sans-serif;
  font-size: 0.83rem;
  font-weight: 600;
  padding: 8px 16px;
  border-radius: 7px;
  cursor: pointer;
  transition: background 0.2s;
}

.register-wrapper-aaside-card-2 button:hover {
  background: rgba(255, 255, 255, 0.25);
}

.register-card-main {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.register-card {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  overflow: hidden;
  box-shadow: var(--card-shadow);
  display: grid;
  grid-template-columns: 200px 1fr auto;
  gap: 0;
  transition: box-shadow 0.2s;
}

.register-card:hover {
  box-shadow: var(--card-shadow-hover);
}

.register-card-img {
  height: 160px;
}

.register-card-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.register-card-intro {
  padding: 20px 24px;
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.register-card-intro>span {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.85rem;
  color: var(--text-mid);
}

.register-card-intro>span>span:first-child {
  font-family: 'Sora', sans-serif;
  font-size: 1rem;
  font-weight: 700;
  color: var(--text-dark);
  display: block;
}

.register-card-intro i {
  color: var(--text-light);
  font-size: 0.8rem;
  width: 14px;
}

.register-card-button {
  display: flex;
  flex-direction: column;
  gap: 10px;
  padding: 20px;
  justify-content: center;
  border-left: 1px solid var(--border);
  min-width: 160px;
}

.register-card-button-1 {
  padding: 10px 18px;
  border-radius: 8px;
  border: 1.5px solid var(--primary);
  background: transparent;
  color: var(--primary);
  font-family: 'DM Sans', sans-serif;
  font-size: 0.83rem;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.2s, color 0.2s;
}

.register-card-button-1:hover {
  background: var(--primary-light);
}

.register-card-button-2 {
  padding: 10px 18px;
  border-radius: 8px;
  border: 1.5px solid #fee2e2;
  background: transparent;
  color: #dc2626;
  font-family: 'DM Sans', sans-serif;
  font-size: 0.83rem;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.2s;
}

.register-card-button-2:hover {
  background: #fff5f5;
}

/* ─────────────────────────────────────────────────
   PROFILE PAGE
───────────────────────────────────────────────── */
.student-profile {
  max-width: 1120px;
  margin: 0 auto;
  padding: 48px 24px 72px;
}

.profile-intro {
  margin-bottom: 36px;
}

.profile-intro>span {
  font-family: 'Sora', sans-serif;
  font-size: 1.75rem;
  font-weight: 800;
  color: var(--text-dark);
  display: block;
  margin-bottom: 6px;
}

.profile-intro p {
  font-size: 0.95rem;
  color: var(--text-mid);
}

.profile-main {
  display: grid;
  grid-template-columns: 260px 1fr;
  grid-template-rows: auto auto;
  gap: 24px;
}

.profile-aside {
  grid-row: 1 / 3;
}

.sts-profile {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 28px 24px;
  box-shadow: var(--card-shadow);
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 12px;
}

.sts-profile-img {
  width: 88px;
  height: 88px;
  border-radius: 50%;
  overflow: hidden;
  border: 3px solid var(--primary-light);
}

.sts-profile-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  background: linear-gradient(135deg, #1a1aaf, #0d0d5e);
}

.sts-profile-intro span:first-child {
  font-family: 'Sora', sans-serif;
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--text-dark);
  display: block;
}

.sts-profile-intro span:last-child {
  font-size: 0.83rem;
  color: var(--text-mid);
}

.sts-profile-status {
  display: flex;
  align-items: center;
  gap: 6px;
  background: #d1fae5;
  color: #065f46;
  padding: 5px 14px;
  border-radius: 20px;
  font-size: 0.78rem;
  font-weight: 600;
}

.sts-profile-status i {
  font-size: 0.75rem;
}

.profile-info-grid {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 28px;
  box-shadow: var(--card-shadow);
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px 32px;
}

.profile-info-field label {
  font-size: 0.72rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.07em;
  color: var(--text-light);
  display: block;
  margin-bottom: 4px;
}

.profile-info-field p {
  font-size: 0.95rem;
  font-weight: 500;
  color: var(--text-dark);
}

.profile-activity {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 24px 28px;
  box-shadow: var(--card-shadow);
}

.profile-activity h4 {
  font-family: 'Sora', sans-serif;
  font-size: 1rem;
  font-weight: 700;
  color: var(--text-dark);
  margin-bottom: 16px;
}

.profile-activity-cards {
  display: flex;
  gap: 16px;
}

.activity-card {
  flex: 1;
  display: flex;
  align-items: center;
  gap: 14px;
  background: var(--bg);
  border-radius: 10px;
  padding: 16px 18px;
}

.activity-card-icon {
  width: 44px;
  height: 44px;
  border-radius: 10px;
  background: var(--primary-light);
  color: var(--primary);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1rem;
  flex-shrink: 0;
}

.activity-card-icon.tertiary {
  background: #fef3c7;
  color: #b45309;
}

.activity-card div p:first-child {
  font-size: 0.8rem;
  color: var(--text-mid);
  margin-bottom: 2px;
}

.activity-card div p:last-child {
  font-family: 'Sora', sans-serif;
  font-size: 1.5rem;
  font-weight: 800;
  color: var(--text-dark);
  line-height: 1;
}

/* ─────────────────────────────────────────────────
   EVENTS BROWSE PAGE
───────────────────────────────────────────────── */
.sts-events-page {
  max-width: 1120px;
  margin: 0 auto;
  padding: 48px 24px 72px;
}

.sts-events-page-header {
  margin-bottom: 32px;
}

.sts-events-page-header h1 {
  font-family: 'Sora', sans-serif;
  font-size: 1.75rem;
  font-weight: 800;
  color: var(--text-dark);
  margin-bottom: 6px;
}

.sts-events-page-header p {
  font-size: 0.95rem;
  color: var(--text-mid);
}

.sts-events-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}

/* ─────────────────────────────────────────────────
   FOOTER
───────────────────────────────────────────────── */
footer {
  background: var(--white);
  border-top: 1px solid var(--border);
  margin-top: 60px;
}

.fotter-wrapper {
  max-width: 1120px;
  margin: 0 auto;
  padding: 56px 24px 40px;
  display: grid;
  grid-template-columns: 2fr 1fr 1fr 2fr;
  gap: 40px;
}

.footer-intro span {
  font-family: 'Sora', sans-serif;
  font-size: 1.1rem;
  font-weight: 800;
  color: var(--primary);
  display: block;
  margin-bottom: 10px;
}

.footer-intro p {
  font-size: 0.875rem;
  color: var(--text-mid);
  line-height: 1.7;
  max-width: 220px;
}

.footer-links ul,
.footer-support ul {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.footer-links a,
.footer-support a {
  text-decoration: none;
  font-size: 0.875rem;
  color: var(--text-mid);
  transition: color 0.2s;
}

.footer-links a:hover,
.footer-support a:hover {
  color: var(--primary);
}

.fotter-email span {
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--text-dark);
  display: block;
  margin-bottom: 8px;
}

.fotter-email p {
  font-size: 0.875rem;
  color: var(--text-mid);
  margin-bottom: 16px;
}

.fotter-email-input {
  display: flex;
  gap: 8px;
}

.fotter-email-input input {
  flex: 1;
  padding: 10px 14px;
  border: 1px solid var(--border);
  border-radius: 8px;
  font-family: 'DM Sans', sans-serif;
  font-size: 0.875rem;
  outline: none;
  color: var(--text-dark);
  background: var(--bg);
  transition: border-color 0.2s;
}

.fotter-email-input input:focus {
  border-color: var(--primary);
}

.fotter-email-input button {
  width: 40px;
  height: 40px;
  background: var(--primary);
  color: #fff;
  border: none;
  border-radius: 8px;
  font-size: 0.9rem;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background 0.2s;
  flex-shrink: 0;
}

.fotter-email-input button:hover {
  background: var(--primary-dark);
}

.footer-bottom {
  border-top: 1px solid var(--border);
  text-align: center;
  padding: 20px 24px;
}

.footer-bottom p {
  font-size: 0.8rem;
  color: var(--text-light);
}

/* ─────────────────────────────────────────────────
   TOAST NOTIFICATION
───────────────────────────────────────────────── */
.toast {
  position: fixed;
  bottom: 28px;
  right: 28px;
  background: var(--text-dark);
  color: #fff;
  padding: 14px 22px;
  border-radius: 10px;
  font-size: 0.875rem;
  font-weight: 500;
  z-index: 9999;
  opacity: 0;
  transform: translateY(12px);
  transition: opacity 0.3s, transform 0.3s;
  pointer-events: none;
  max-width: 320px;
}

.toast.show {
  opacity: 1;
  transform: translateY(0);
}

.toast.success {
  background: #065f46;
}

.toast.error {
  background: #991b1b;
}
```

---

## 📄 `/asset/css/stsevent.css`

```css
/* =============================================
   EventHub — stsevents.css
   All Events browsing page
   ============================================= */

/* ── EVENTS PAGE WRAPPER ── */
.events-page {
    max-width: 1120px;
    margin: 0 auto;
    padding: 52px 24px 80px;
}

/* ── PAGE INTRO ── */
.events-page-intro {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 24px;
    margin-bottom: 36px;
}

.events-page-intro h1 {
    font-family: 'Sora', sans-serif;
    font-size: 2rem;
    font-weight: 800;
    color: var(--text-dark);
    letter-spacing: -0.02em;
    line-height: 1.2;
    margin-bottom: 6px;
}

.events-page-intro p {
    font-size: 0.95rem;
    color: var(--text-mid);
}

/* Search bar in header of events */
.events-search-bar {
    display: flex;
    align-items: center;
    gap: 10px;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 10px 16px;
    width: 280px;
    box-shadow: var(--shadow-sm);
}

.events-search-bar i {
    color: var(--text-light);
}

.events-search-bar input {
    border: none;
    background: transparent;
    outline: none;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.875rem;
    color: var(--text-dark);
    width: 100%;
}

.events-search-bar input::placeholder {
    color: var(--text-light);
}

/* ── FILTER BAR ── */
.events-filters {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 32px;
    flex-wrap: wrap;
}

.filter-chip {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 999px;
    padding: 7px 18px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--text-mid);
    cursor: pointer;
    transition: all 0.2s;
}

.filter-chip:hover {
    border-color: var(--primary);
    color: var(--primary);
}

.filter-chip.active {
    background: var(--primary);
    border-color: var(--primary);
    color: #fff;
}

.filter-right {
    margin-left: auto;
}

.filter-select {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 7px 14px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.85rem;
    font-weight: 500;
    color: var(--text-mid);
    outline: none;
    cursor: pointer;
    appearance: none;
    padding-right: 32px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23888aaa' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
}

/* ── EVENTS GRID ── */
.events-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

/* ── EVENT CARD ── */
.ev-card {
    background: var(--white);
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    display: flex;
    flex-direction: column;
    transition: transform 0.25s, box-shadow 0.25s;
}

.ev-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.ev-card-img-wrap {
    position: relative;
}

.ev-card-img-wrap img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    display: block;
    background: linear-gradient(135deg, var(--primary) 0%, #0d0d5e 100%);
}

.ev-card-tag {
    position: absolute;
    top: 12px;
    right: 12px;
    padding: 3px 10px;
    border-radius: 999px;
    font-size: 0.68rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}

.ev-card-tag.tech {
    background: #dee0ff;
    color: #293ca0;
}

.ev-card-tag.cultural {
    background: #ffdcc6;
    color: #713700;
}

.ev-card-tag.workshop {
    background: #dee0ff;
    color: #293ca0;
}

.ev-card-tag.academic {
    background: #d4edda;
    color: #155724;
}

.ev-card-tag.sports {
    background: #fff3cd;
    color: #856404;
}

.ev-card-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    flex: 1;
}

.ev-card-body h3 {
    font-family: 'Sora', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    color: var(--text-dark);
    line-height: 1.35;
}

.ev-card-meta {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.ev-card-meta span {
    font-size: 0.8rem;
    color: var(--text-mid);
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 6px;
}

.ev-card-meta i {
    color: var(--primary);
    width: 14px;
}

.ev-card-desc {
    font-size: 0.8rem;
    color: var(--text-light);
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    line-height: 1.5;
    flex: 1;
}

.btn-register-full {
    width: 100%;
    padding: 12px;
    background: var(--primary);
    color: #fff;
    border: none;
    border-radius: 8px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.9rem;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.2s, transform 0.15s;
    margin-top: auto;
}

.btn-register-full:hover {
    background: var(--primary-dk);
}

.btn-register-full:active {
    transform: scale(0.97);
}


* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    --primary: #1e3a8a;
    --primary-dk: #0f2b6d;
    --primary-light: #3b5bdb;
    --secondary: #f59e0b;
    --accent: #10b981;
    --text-dark: #0f172a;
    --text-mid: #334155;
    --text-light: #64748b;
    --bg: #f8fafc;
    --white: #ffffff;
    --border: #e2e8f0;
    --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.04);
    --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 12px 32px rgba(0, 0, 0, 0.1);
    --radius: 16px;
    --radius-md: 12px;
    --radius-sm: 8px;
}

body {
    font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
    background: var(--bg);
    color: var(--text-dark);
    line-height: 1.5;
}

/* Header */
header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 48px;
    height: 70px;
    background: var(--white);
    border-bottom: 1px solid var(--border);
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: var(--shadow-sm);
}

.logo {
    font-family: 'Inter', sans-serif;
    font-size: 1.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

nav ul {
    display: flex;
    list-style: none;
    gap: 12px;
}

.nav-btn {
    background: none;
    border: none;
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--text-mid);
    padding: 8px 20px;
    border-radius: 40px;
    cursor: pointer;
    transition: all 0.2s;
    font-family: inherit;
}

.nav-btn:hover {
    background: var(--bg);
    color: var(--primary);
}

.nav-btn.active {
    background: var(--primary);
    color: white;
    box-shadow: 0 2px 8px rgba(30, 58, 138, 0.3);
}

.header-search {
    display: flex;
    align-items: center;
    gap: 10px;
    background: var(--bg);
    border: 1px solid var(--border);
    border-radius: 40px;
    padding: 8px 18px;
}

.header-search i {
    color: var(--text-light);
}

.header-search input {
    border: none;
    background: transparent;
    outline: none;
    width: 180px;
    font-size: 0.85rem;
}

.logout-btn {
    text-decoration: none;
    font-weight: 600;
    color: var(--text-mid);
    transition: color 0.2s;
}

.logout-btn:hover {
    color: var(--primary);
}

/* Pages Container */
.page {
    display: none;
    animation: fadeIn 0.3s ease;
}

.page.active {
    display: block;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(8px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 24px 60px;
}

/* Hero Cards */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-bottom: 48px;
}

.stat-card {
    background: var(--white);
    border-radius: var(--radius);
    padding: 24px 28px;
    display: flex;
    align-items: center;
    gap: 20px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border);
    transition: transform 0.2s;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
}

.stat-card i {
    width: 52px;
    height: 52px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #eef2ff;
    color: var(--primary);
    border-radius: 18px;
    font-size: 1.5rem;
}

.stat-info span:first-child {
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--text-light);
}

.stat-info span:last-child {
    font-size: 2rem;
    font-weight: 800;
    color: var(--text-dark);
    line-height: 1.2;
}

/* Section header */
.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 28px;
    flex-wrap: wrap;
    gap: 16px;
}

.section-header h2 {
    font-size: 1.5rem;
    font-weight: 700;
}

.explore-link {
    color: var(--primary);
    font-weight: 600;
    cursor: pointer;
    font-size: 0.9rem;
}

/* Event Cards Grid */
.events-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
}

.event-card {
    background: var(--white);
    border-radius: var(--radius);
    overflow: hidden;
    border: 1px solid var(--border);
    transition: all 0.25s;
    box-shadow: var(--shadow-sm);
}

.event-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.card-img {
    height: 160px;
    background: linear-gradient(135deg, var(--primary) 0%, #2d4a9e 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
}

.card-content {
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.card-content h3 {
    font-size: 1.1rem;
    font-weight: 700;
}

.event-meta {
    display: flex;
    flex-direction: column;
    gap: 6px;
    font-size: 0.8rem;
    color: var(--text-mid);
}

.event-meta i {
    width: 18px;
    color: var(--primary);
}

.event-desc {
    font-size: 0.8rem;
    color: var(--text-light);
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.btn-register {
    background: var(--primary);
    color: white;
    border: none;
    padding: 10px;
    border-radius: 40px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    margin-top: 8px;
}

.btn-register:hover {
    background: var(--primary-dk);
}

.btn-register.registered {
    background: #10b981;
    cursor: default;
}

/* Registered Events List */
.registered-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.reg-event-item {
    background: var(--white);
    border-radius: var(--radius-md);
    border: 1px solid var(--border);
    display: grid;
    grid-template-columns: 100px 1fr auto;
    gap: 20px;
    align-items: center;
    padding: 12px 20px;
}

.reg-event-img {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-light), var(--primary));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

.reg-event-info h4 {
    font-weight: 700;
    margin-bottom: 6px;
}

.reg-event-info p {
    font-size: 0.8rem;
    color: var(--text-mid);
}

.cancel-btn {
    background: #fee2e2;
    border: none;
    padding: 8px 18px;
    border-radius: 30px;
    color: #b91c1c;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}

.cancel-btn:hover {
    background: #fecaca;
    transform: scale(0.97);
}

/* Profile Page */
.profile-layout {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 32px;
}

.profile-card {
    background: var(--white);
    border-radius: var(--radius);
    padding: 32px 24px;
    text-align: center;
    border: 1px solid var(--border);
}

.avatar {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, var(--primary), #5b7bc3);
    border-radius: 60px;
    margin: 0 auto 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: white;
}

.profile-name {
    font-size: 1.4rem;
    font-weight: 800;
    margin-bottom: 6px;
}

.profile-badge {
    background: #eef2ff;
    color: var(--primary);
    padding: 4px 12px;
    border-radius: 40px;
    font-size: 0.7rem;
    font-weight: 600;
    display: inline-block;
}

.info-grid {
    background: var(--white);
    border-radius: var(--radius);
    padding: 32px;
    border: 1px solid var(--border);
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 28px;
}

.info-field label {
    font-size: 0.7rem;
    text-transform: uppercase;
    font-weight: 700;
    color: var(--text-light);
    letter-spacing: 0.05em;
}

.info-field p {
    font-weight: 600;
    margin-top: 4px;
    font-size: 1rem;
}

.activity-stats {
    margin-top: 24px;
    display: flex;
    gap: 20px;
}

.activity-card {
    background: var(--bg);
    padding: 16px 24px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    gap: 14px;
    flex: 1;
}

/* Footer */
footer {
    background: var(--white);
    border-top: 1px solid var(--border);
    margin-top: 60px;
}

.footer-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 48px 24px 32px;
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 2fr;
    gap: 40px;
}

.footer-logo {
    font-weight: 800;
    font-size: 1.2rem;
    color: var(--primary);
    margin-bottom: 12px;
}

.footer-links ul {
    list-style: none;
}

.footer-links li {
    margin-bottom: 8px;
}

.footer-links a {
    text-decoration: none;
    color: var(--text-mid);
    font-size: 0.85rem;
}

.footer-bottom {
    text-align: center;
    padding: 20px;
    border-top: 1px solid var(--border);
    font-size: 0.75rem;
    color: var(--text-light);
}

@media (max-width: 900px) {

    .events-grid,
    .stats-grid {
        grid-template-columns: 1fr 1fr;
    }

    .profile-layout {
        grid-template-columns: 1fr;
    }

    .footer-wrapper {
        grid-template-columns: 1fr;
    }

    header {
        padding: 0 20px;
        flex-wrap: wrap;
        height: auto;
        gap: 12px;
        padding: 12px;
    }

    nav ul {
        flex-wrap: wrap;
        justify-content: center;
    }
}

@media (max-width: 640px) {

    .events-grid,
    .stats-grid {
        grid-template-columns: 1fr;
    }

    .reg-event-item {
        grid-template-columns: 1fr;
        text-align: center;
    }
}

.empty-message {
    text-align: center;
    padding: 40px;
    background: var(--white);
    border-radius: var(--radius);
    color: var(--text-light);
}
```

---

## 📄 `/asset/css/stsprofile.css`

```css
/* =============================================
   EventHub — stsprofile.css
   Student Profile page
   ============================================= */

/* ── WRAPPER ── */
.student-profile {
  max-width: 920px;
  margin: 0 auto;
  padding: 52px 24px 80px;
}

/* ── PAGE INTRO ── */
.profile-intro {
  text-align: center;
  margin-bottom: 48px;
}

.profile-intro h1 {
  font-family: 'Sora', sans-serif;
  font-size: 2rem;
  font-weight: 800;
  color: var(--text-dark);
  letter-spacing: -0.02em;
  margin-bottom: 8px;
}

.profile-intro p {
  font-size: 1rem;
  color: var(--text-mid);
  font-weight: 500;
}

/* ── TWO-COLUMN LAYOUT ── */
.profile-layout {
  display: grid;
  grid-template-columns: 280px 1fr;
  gap: 28px;
  align-items: start;
}

/* ── LEFT CARD ── */
.profile-aside {
  position: sticky;
  top: 80px;
}

.sts-profile {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 24px;
  padding: 36px 24px 28px;
  box-shadow: var(--shadow-sm);
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0;
}

/* Avatar */
.sts-profile-img {
  position: relative;
  margin-bottom: 20px;
}

.sts-profile-img img {
  width: 120px;
  height: 120px;
  border-radius: 20px;
  object-fit: cover;
  display: block;
  background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
  box-shadow: 0 8px 24px rgba(36, 56, 156, 0.2);
}

.profile-img-edit {
  position: absolute;
  bottom: -6px;
  right: -6px;
  width: 30px;
  height: 30px;
  background: var(--primary);
  color: #fff;
  border: none;
  border-radius: 8px;
  font-size: 0.75rem;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  box-shadow: 0 4px 10px rgba(36, 56, 156, 0.3);
  transition: transform 0.2s;
}

.profile-img-edit:hover { transform: scale(1.12); }

/* Name + badge */
.sts-profile-intro {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
  margin-bottom: 20px;
}

.profile-name {
  font-family: 'Sora', sans-serif;
  font-size: 1.4rem;
  font-weight: 800;
  color: var(--text-dark);
  letter-spacing: -0.01em;
}

.profile-badge {
  background: #dee0ff;
  color: #293ca0;
  padding: 3px 16px;
  border-radius: 999px;
  font-size: 0.7rem;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 0.08em;
}

/* Status row */
.sts-profile-status {
  width: 100%;
  display: flex;
  align-items: center;
  gap: 12px;
  background: var(--bg);
  border-radius: 14px;
  padding: 14px 16px;
  margin-top: 4px;
}

.sts-profile-status i {
  font-size: 1.1rem;
  color: var(--primary);
  flex-shrink: 0;
}

.status-label {
  font-size: 0.7rem;
  color: var(--text-light);
  font-weight: 500;
  margin-bottom: 1px;
}

.status-value {
  font-size: 0.875rem;
  font-weight: 700;
  color: var(--text-dark);
}

/* ── RIGHT PANEL ── */
.profile-right {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 24px;
  padding: 36px;
  box-shadow: var(--shadow-sm);
}

/* Panel header */
.profile-panel-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 32px;
}

.profile-panel-header h3 {
  font-family: 'Sora', sans-serif;
  font-size: 1.1rem;
  font-weight: 800;
  color: var(--text-dark);
}

.profile-edit-btn {
  display: flex;
  align-items: center;
  gap: 6px;
  background: none;
  border: none;
  color: var(--primary);
  font-family: 'DM Sans', sans-serif;
  font-size: 0.875rem;
  font-weight: 700;
  cursor: pointer;
  transition: opacity 0.2s;
  padding: 0;
}

.profile-edit-btn:hover { opacity: 0.7; }

/* Info grid */
.profile-info-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 28px 40px;
}

.profile-info-field label {
  display: block;
  font-size: 0.68rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--text-light);
  margin-bottom: 4px;
}

.profile-info-field p {
  font-size: 1rem;
  font-weight: 600;
  color: var(--text-dark);
  line-height: 1.4;
}

/* ── ACTIVITY ── */
.profile-activity {
  margin-top: 32px;
  padding-top: 28px;
  border-top: 1px solid var(--border);
}

.profile-activity h4 {
  font-size: 0.8rem;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--text-dark);
  margin-bottom: 16px;
}

.profile-activity-cards {
  display: flex;
  gap: 14px;
  flex-wrap: wrap;
}

.activity-card {
  background: var(--bg);
  border-radius: 16px;
  padding: 16px 20px;
  display: flex;
  align-items: center;
  gap: 14px;
  flex: 1;
  min-width: 140px;
}

.activity-card-icon {
  width: 40px;
  height: 40px;
  border-radius: 12px;
  background: rgba(36, 56, 156, 0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.activity-card-icon i {
  font-size: 1rem;
  color: var(--primary);
}

.activity-card-icon.tertiary {
  background: rgba(143, 71, 0, 0.1);
}

.activity-card-icon.tertiary i { color: #8f4700; }

.act-label {
  font-size: 0.72rem;
  color: var(--text-light);
  font-weight: 500;
  margin-bottom: 2px !important;
}

.act-num {
  font-family: 'Sora', sans-serif;
  font-size: 1.3rem;
  font-weight: 800;
  color: var(--text-dark);
  line-height: 1;
}
```

---

## 📄 `/asset/css/stsreg.css`

```css
/* =============================================
   EventHub — register.css
   Matches the design system from code.html
   Font: Plus Jakarta Sans (already loaded)
   ============================================= */

:root {
  --primary:            #24389c;
  --primary-container:  #3f51b5;
  --primary-fixed:      #dee0ff;
  --on-primary:         #ffffff;
  --on-primary-fixed-variant: #293ca0;

  --secondary-container: #c9cffd;

  --surface:                    #fbf8ff;
  --surface-container-low:      #f4f2fc;
  --surface-container:          #efedf6;
  --surface-container-high:     #e9e7f0;
  --surface-container-highest:  #e3e1ea;
  --surface-container-lowest:   #ffffff;

  --on-surface:         #1a1b22;
  --on-surface-variant: #454652;
  --outline-variant:    #c5c5d4;
  --outline:            #757684;

  --error:              #ba1a1a;
  --error-container:    #ffdad6;

  --radius-sm:   0.25rem;
  --radius-md:   0.5rem;
  --radius-lg:   0.75rem;
  --radius-xl:   1rem;
  --radius-2xl:  1.25rem;

  --shadow-card:  0 12px 32px rgba(36, 56, 156, 0.05);
  --shadow-hover: 0 16px 48px rgba(36, 56, 156, 0.10);
}

/* ── SECTION WRAPPER ── */
.register {
  max-width: 1200px;
  margin: 0 auto;
  padding: 48px 32px 80px;
}

/* ── PAGE INTRO ── */
.register-intro {
  margin-bottom: 36px;
}

.register-intro span:first-child {
  display: block;
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--primary);
  margin-bottom: 6px;
}

.register-intro span:nth-child(2) {
  display: block;
  font-size: 1.85rem;
  font-weight: 800;
  color: var(--on-surface);
  letter-spacing: -0.02em;
  line-height: 1.2;
  margin-bottom: 10px;
}

.register-intro p {
  font-size: 0.95rem;
  color: var(--on-surface-variant);
  font-weight: 500;
  max-width: 520px;
  line-height: 1.6;
}

/* ── LAYOUT: ASIDE + MAIN ── */
.register-card-wrapepr {
  display: grid;
  grid-template-columns: 280px 1fr;
  gap: 28px;
  align-items: start;
}

/* ── ASIDE ── */
.regsiter-card-wrapper-aaside {
  display: flex;
  flex-direction: column;
  gap: 20px;
  position: sticky;
  top: 88px;
}

/* Stats block */
.aside-card {
  background: var(--surface-container-lowest);
  border-radius: var(--radius-xl);
  padding: 24px;
  box-shadow: var(--shadow-card);
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.card-1 {
  background: var(--surface-container-low);
  border-radius: var(--radius-lg);
  padding: 16px 18px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.card-1 span:first-child {
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.07em;
  color: var(--on-surface-variant);
}

.card-1 span:last-child {
  font-size: 1.6rem;
  font-weight: 800;
  color: var(--on-surface);
  line-height: 1;
}

/* Calendar view button */
.card-3 {
  background: var(--primary);
  border-radius: var(--radius-lg);
  padding: 13px 18px;
  cursor: pointer;
  transition: opacity 0.2s;
}

.card-3:hover {
  opacity: 0.9;
}

.card-3 span {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  font-size: 0.875rem;
  font-weight: 700;
  color: var(--on-primary);
}

.card-3 i {
  font-size: 0.9rem;
}

/* Promo card */
.register-wrapper-aaside-card-2 {
  background: var(--primary);
  border-radius: var(--radius-xl);
  padding: 24px;
  box-shadow: var(--shadow-card);
  display: flex;
  flex-direction: column;
  gap: 10px;
  position: relative;
  overflow: hidden;
}

.register-wrapper-aaside-card-2::after {
  content: '';
  position: absolute;
  bottom: -32px;
  right: -32px;
  width: 120px;
  height: 120px;
  background: rgba(255, 255, 255, 0.08);
  border-radius: 50%;
}

.register-wrapper-aaside-card-2 span {
  font-size: 1rem;
  font-weight: 800;
  color: var(--on-primary);
  line-height: 1.3;
  position: relative;
  z-index: 1;
}

.register-wrapper-aaside-card-2 p {
  font-size: 0.82rem;
  color: rgba(255, 255, 255, 0.7);
  font-weight: 500;
  position: relative;
  z-index: 1;
}

.register-wrapper-aaside-card-2 button {
  margin-top: 6px;
  align-self: flex-start;
  background: var(--on-primary);
  color: var(--primary);
  border: none;
  border-radius: var(--radius-lg);
  padding: 9px 20px;
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 0.82rem;
  font-weight: 700;
  cursor: pointer;
  transition: background 0.2s, transform 0.15s;
  position: relative;
  z-index: 1;
}

.register-wrapper-aaside-card-2 button:hover {
  background: var(--surface-container-low);
}

.register-wrapper-aaside-card-2 button:active {
  transform: scale(0.96);
}

/* ── MAIN: EVENT CARDS ── */
.register-card-main {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.register-card {
  background: var(--surface-container-lowest);
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-card);
  display: grid;
  grid-template-columns: 220px 1fr auto;
  gap: 0;
  transition: box-shadow 0.25s, transform 0.25s;
}

.register-card:hover {
  box-shadow: var(--shadow-hover);
  transform: translateY(-2px);
}

/* Image */
.register-card-img {
  flex-shrink: 0;
}

.register-card-img img {
  width: 100%;
  height: 100%;
  min-height: 160px;
  object-fit: cover;
  display: block;
  background: linear-gradient(135deg, var(--primary) 0%, var(--primary-container) 100%);
}

/* Info block */
.register-card-intro {
  padding: 24px 28px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  justify-content: center;
}

.register-card-intro > span {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.875rem;
  color: var(--on-surface-variant);
  font-weight: 500;
}

.register-card-intro > span:first-child > span {
  font-size: 1rem;
  font-weight: 700;
  color: var(--on-surface);
}

.register-card-intro i {
  color: var(--primary);
  font-size: 0.9rem;
  width: 16px;
  text-align: center;
}

/* Action buttons */
.register-card-button {
  display: flex;
  flex-direction: column;
  gap: 10px;
  justify-content: center;
  padding: 24px 24px 24px 0;
  min-width: 180px;
}

.register-card-button-1,
.register-card-button-2 {
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: 0.85rem;
  font-weight: 700;
  border-radius: var(--radius-lg);
  padding: 10px 18px;
  cursor: pointer;
  transition: all 0.2s;
  border: none;
  white-space: nowrap;
}

.register-card-button:active {
  transform: scale(0.96);
}

.register-card-button-1 {
  background: var(--primary);
  color: var(--on-primary);
}

.register-card-button-1:hover {
  background: var(--primary-container);
}

.register-card-button-2 {
  background: var(--error-container);
  color: var(--error);
}

.register-card-button-2:hover {
  background: #ffb4ab;
}
```

---

## ✅ Done

All files have been extracted exactly as provided.  
Copy each block into the corresponding file path on your server.  
Make sure to place the PHP backend files (auth.php, events.php, etc.) inside `/asset/php/` and the configuration inside `/asset/php/config/`.  
The frontend should work immediately after setting up the database and backend endpoints.

