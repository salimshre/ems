<?php
session_start();
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/security.php';
require_once __DIR__ . '/config/audit.php';

if (!isset($_SESSION['role'])) {
    respond(false, 'Unauthorized', [], 401);
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

match ($action) {
    'list'   => getVenues(),
    'get'    => getVenue(),
    'create' => createVenue(),
    'update' => updateVenue(),
    'delete' => deleteVenue(),
    default  => respond(false, 'Invalid action')
};

function getVenues() {
    $conn = getConn();
    $result = mysqli_query($conn, "SELECT * FROM venues WHERE status = 'active' ORDER BY name");
    $venues = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $venues[] = $row;
    }
    respond(true, 'Venues fetched', ['venues' => $venues]);
}

function getVenue() {
    $venueId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if (!$venueId) respond(false, 'Venue ID required');
    
    $conn = getConn();
    $stmt = mysqli_prepare($conn, "SELECT * FROM venues WHERE venue_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $venueId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $venue = mysqli_fetch_assoc($result);
    
    if ($venue) {
        respond(true, 'Venue found', ['venue' => $venue]);
    } else {
        respond(false, 'Venue not found');
    }
}

function createVenue() {
    require_post();
    require_csrf();

    if ($_SESSION['role'] !== 'admin') respond(false, 'Only admins can add venues');
    
    [$name, $capacity, $location, $facilities] = venueInput();
    
    $conn = getConn();
    $adminId = $_SESSION['admin_id'] ?? null;
    $stmt = mysqli_prepare($conn, "INSERT INTO venues (name, capacity, location, facilities, created_by, updated_by) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sissii', $name, $capacity, $location, $facilities, $adminId, $adminId);
    
    if (mysqli_stmt_execute($stmt)) {
        $venueId = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);
        log_audit('create', 'venue', $venueId, ['name' => $name]);
        respond(true, 'Venue created', ['venue_id' => $venueId]);
    } else {
        respond(false, 'Failed to create venue');
    }
}

function updateVenue() {
    require_post();
    require_csrf();

    if ($_SESSION['role'] !== 'admin') respond(false, 'Only admins can update venues');
    
    $venueId = (int)($_POST['id'] ?? 0);
    [$name, $capacity, $location, $facilities] = venueInput();
    
    if (!$venueId) respond(false, 'Venue ID required');
    
    $conn = getConn();
    $adminId = $_SESSION['admin_id'] ?? null;
    $stmt = mysqli_prepare($conn, "UPDATE venues SET name=?, capacity=?, location=?, facilities=?, updated_by=? WHERE venue_id=?");
    mysqli_stmt_bind_param($stmt, 'sissii', $name, $capacity, $location, $facilities, $adminId, $venueId);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        log_audit('update', 'venue', $venueId, ['name' => $name]);
        respond(true, 'Venue updated');
    } else {
        respond(false, 'Failed to update venue');
    }
}

function deleteVenue() {
    require_post();
    require_csrf();

    if ($_SESSION['role'] !== 'admin') respond(false, 'Only admins can delete venues');
    
    $venueId = (int)($_POST['id'] ?? 0);
    if (!$venueId) respond(false, 'Venue ID required');
    
    $conn = getConn();
    $stmt = mysqli_prepare($conn, "DELETE FROM venues WHERE venue_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $venueId);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        log_audit('delete', 'venue', $venueId);
        respond(true, 'Venue deleted');
    } else {
        respond(false, 'Failed to delete venue');
    }
}

function venueInput() {
    $name = trim($_POST['name'] ?? '');
    $capacity = (int)($_POST['capacity'] ?? 0);
    $location = trim($_POST['location'] ?? '');
    $facilities = trim($_POST['facilities'] ?? '');

    if (!$name || !$capacity) respond(false, 'Name and capacity required', [], 400);
    if (strlen($name) > 100 || strlen($location) > 200) respond(false, 'Venue fields are too long', [], 400);
    if ($capacity < 1 || $capacity > 100000) respond(false, 'Venue capacity must be between 1 and 100000', [], 400);

    return [$name, $capacity, $location, $facilities];
}

function respond($success, $message, $data = [], $code = 200) {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode(array_merge(['success' => $success, 'message' => $message], $data));
    exit;
}
?>
