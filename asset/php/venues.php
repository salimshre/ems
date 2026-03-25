<?php
session_start();
require_once __DIR__ . '/config/db.php';

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
    if ($_SESSION['role'] !== 'admin') respond(false, 'Only admins can add venues');
    
    $name = trim($_POST['name'] ?? '');
    $capacity = (int)($_POST['capacity'] ?? 0);
    $location = trim($_POST['location'] ?? '');
    $facilities = trim($_POST['facilities'] ?? '');
    
    if (!$name || !$capacity) respond(false, 'Name and capacity required');
    
    $conn = getConn();
    $stmt = mysqli_prepare($conn, "INSERT INTO venues (name, capacity, location, facilities) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'siss', $name, $capacity, $location, $facilities);
    
    if (mysqli_stmt_execute($stmt)) {
        $venueId = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);
        respond(true, 'Venue created', ['venue_id' => $venueId]);
    } else {
        respond(false, 'Failed to create venue');
    }
}

function updateVenue() {
    if ($_SESSION['role'] !== 'admin') respond(false, 'Only admins can update venues');
    
    $venueId = (int)($_POST['id'] ?? 0);
    $name = trim($_POST['name'] ?? '');
    $capacity = (int)($_POST['capacity'] ?? 0);
    $location = trim($_POST['location'] ?? '');
    $facilities = trim($_POST['facilities'] ?? '');
    
    if (!$venueId || !$name) respond(false, 'Venue ID and name required');
    
    $conn = getConn();
    $stmt = mysqli_prepare($conn, "UPDATE venues SET name=?, capacity=?, location=?, facilities=? WHERE venue_id=?");
    mysqli_stmt_bind_param($stmt, 'sissi', $name, $capacity, $location, $facilities, $venueId);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        respond(true, 'Venue updated');
    } else {
        respond(false, 'Failed to update venue');
    }
}

function deleteVenue() {
    if ($_SESSION['role'] !== 'admin') respond(false, 'Only admins can delete venues');
    
    $venueId = (int)($_POST['id'] ?? 0);
    if (!$venueId) respond(false, 'Venue ID required');
    
    $conn = getConn();
    $stmt = mysqli_prepare($conn, "DELETE FROM venues WHERE venue_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $venueId);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        respond(true, 'Venue deleted');
    } else {
        respond(false, 'Failed to delete venue');
    }
}

function respond($success, $message, $data = [], $code = 200) {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode(array_merge(['success' => $success, 'message' => $message], $data));
    exit;
}
?>