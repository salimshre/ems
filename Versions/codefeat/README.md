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