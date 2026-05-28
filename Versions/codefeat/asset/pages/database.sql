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