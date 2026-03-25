<?php
session_start();
require_once __DIR__ . '/config/db.php';

// Check authentication
if (!isset($_SESSION['role'])) {
    respond(false, 'Unauthorized access', [], 401);
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

match ($action) {
    'list'       => getEvents(),
    'get'        => getEvent(),
    'create'     => createEvent(),
    'update'     => updateEvent(),
    'delete'     => deleteEvent(),
    'upcoming'   => getUpcomingEvents(),
    'categories' => getCategories(),
    default      => respond(false, 'Invalid action')
};

// ══════════════════════════════════════════════════════════
//  GET ALL EVENTS
// ══════════════════════════════════════════════════════════
function getEvents() {
    $conn = getConn();
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 100;
    $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
    $category = isset($_GET['category']) ? trim($_GET['category']) : '';
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';

    $sql = "SELECT e.*, 
            (SELECT COUNT(*) FROM registrations WHERE event_id = e.event_id AND status = 'confirmed') as confirmed_registrations
            FROM events e WHERE 1=1";
    $params = [];
    $types = "";

    if ($category) {
        $sql .= " AND e.category = ?";
        $params[] = $category;
        $types .= "s";
    }

    if ($search) {
        $sql .= " AND (e.title LIKE ? OR e.description LIKE ? OR e.venue LIKE ?)";
        $searchTerm = "%$search%";
        $params[] = $searchTerm;
        $params[] = $searchTerm;
        $params[] = $searchTerm;
        $types .= "sss";
    }

    $sql .= " ORDER BY e.date ASC, e.time ASC LIMIT ? OFFSET ?";
    $params[] = $limit;
    $params[] = $offset;
    $types .= "ii";

    $stmt = mysqli_prepare($conn, $sql);
    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $events = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $events[] = $row;
    }
    
    mysqli_stmt_close($stmt);
    
    respond(true, 'Events fetched successfully', ['events' => $events]);
}

// ══════════════════════════════════════════════════════════
//  GET SINGLE EVENT
// ══════════════════════════════════════════════════════════
function getEvent() {
    $eventId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    if (!$eventId) {
        respond(false, 'Event ID required');
    }
    
    $conn = getConn();
    $stmt = mysqli_prepare($conn, "SELECT e.*, 
            (SELECT COUNT(*) FROM registrations WHERE event_id = e.event_id AND status = 'confirmed') as confirmed_registrations
            FROM events e WHERE e.event_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $eventId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $event = mysqli_fetch_assoc($result);
    
    mysqli_stmt_close($stmt);
    
    if ($event) {
        respond(true, 'Event found', ['event' => $event]);
    } else {
        respond(false, 'Event not found');
    }
}

// ══════════════════════════════════════════════════════════
//  CREATE EVENT (Admin only)
// ══════════════════════════════════════════════════════════
function createEvent() {
    if ($_SESSION['role'] !== 'admin') {
        respond(false, 'Only admins can create events');
    }
    
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $venue = trim($_POST['venue'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $capacity = (int)($_POST['capacity'] ?? 0);
    $image = trim($_POST['image'] ?? '');
    
    if (!$title || !$date || !$time || !$venue || !$category || !$capacity) {
        respond(false, 'All required fields must be filled');
    }
    
    $conn = getConn();
    $stmt = mysqli_prepare($conn, 
        "INSERT INTO events (title, description, date, time, venue, category, capacity, image_url, created_by) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $adminId = $_SESSION['admin_id'] ?? null;
    mysqli_stmt_bind_param($stmt, 'ssssssisi', $title, $description, $date, $time, $venue, $category, $capacity, $image, $adminId);
    
    if (mysqli_stmt_execute($stmt)) {
        $eventId = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);
        respond(true, 'Event created successfully', ['event_id' => $eventId]);
    } else {
        respond(false, 'Failed to create event: ' . mysqli_stmt_error($stmt));
    }
}

// ══════════════════════════════════════════════════════════
//  UPDATE EVENT (Admin only)
// ══════════════════════════════════════════════════════════
function updateEvent() {
    if ($_SESSION['role'] !== 'admin') {
        respond(false, 'Only admins can update events');
    }
    
    $eventId = (int)($_POST['id'] ?? 0);
    if (!$eventId) {
        respond(false, 'Event ID required');
    }
    
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $venue = trim($_POST['venue'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $capacity = (int)($_POST['capacity'] ?? 0);
    $image = trim($_POST['image'] ?? '');
    
    $conn = getConn();
    $stmt = mysqli_prepare($conn,
        "UPDATE events SET title=?, description=?, date=?, time=?, venue=?, category=?, capacity=?, image_url=?
         WHERE event_id=?");
    mysqli_stmt_bind_param($stmt, 'ssssssisi', $title, $description, $date, $time, $venue, $category, $capacity, $image, $eventId);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        respond(true, 'Event updated successfully');
    } else {
        respond(false, 'Failed to update event: ' . mysqli_stmt_error($stmt));
    }
}

// ══════════════════════════════════════════════════════════
//  DELETE EVENT (Admin only)
// ══════════════════════════════════════════════════════════
function deleteEvent() {
    if ($_SESSION['role'] !== 'admin') {
        respond(false, 'Only admins can delete events');
    }
    
    $eventId = (int)($_POST['id'] ?? 0);
    if (!$eventId) {
        respond(false, 'Event ID required');
    }
    
    $conn = getConn();
    $stmt = mysqli_prepare($conn, "DELETE FROM events WHERE event_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $eventId);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        respond(true, 'Event deleted successfully');
    } else {
        respond(false, 'Failed to delete event');
    }
}

// ══════════════════════════════════════════════════════════
//  GET UPCOMING EVENTS
// ══════════════════════════════════════════════════════════
function getUpcomingEvents() {
    $conn = getConn();
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 6;
    $today = date('Y-m-d');
    
    $stmt = mysqli_prepare($conn, 
        "SELECT e.*, 
         (SELECT COUNT(*) FROM registrations WHERE event_id = e.event_id AND status = 'confirmed') as confirmed_registrations
         FROM events e 
         WHERE e.date >= ? AND e.status = 'upcoming'
         ORDER BY e.date ASC, e.time ASC 
         LIMIT ?");
    mysqli_stmt_bind_param($stmt, 'si', $today, $limit);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $events = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $events[] = $row;
    }
    
    mysqli_stmt_close($stmt);
    respond(true, 'Upcoming events fetched', ['events' => $events]);
}

// ══════════════════════════════════════════════════════════
//  GET CATEGORIES
// ══════════════════════════════════════════════════════════
function getCategories() {
    $conn = getConn();
    $result = mysqli_query($conn, "SELECT DISTINCT category FROM events ORDER BY category");
    $categories = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row['category'];
    }
    respond(true, 'Categories fetched', ['categories' => $categories]);
}

function respond($success, $message, $data = [], $code = 200) {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode(array_merge(['success' => $success, 'message' => $message], $data));
    exit;
}
?>