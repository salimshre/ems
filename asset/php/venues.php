<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['role'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$action = $_GET['action'] ?? $_POST['action'] ?? '';
$conn = getConn();

if ($action === 'list') {
    $result = mysqli_query($conn, "SELECT * FROM venues WHERE status = 'active' ORDER BY name");
    $venues = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $venues[] = $row;
    }
    echo json_encode(['success' => true, 'venues' => $venues]);
    
} elseif ($action === 'get') {
    $id = (int)($_GET['id'] ?? 0);
    $result = mysqli_query($conn, "SELECT * FROM venues WHERE venue_id = $id");
    $venue = mysqli_fetch_assoc($result);
    echo json_encode(['success' => true, 'venue' => $venue]);
    
} elseif ($action === 'create') {
    if ($_SESSION['role'] !== 'admin') {
        echo json_encode(['success' => false, 'message' => 'Admin only']);
        exit;
    }
    
    $name = mysqli_real_escape_string($conn, $_POST['name'] ?? '');
    $capacity = (int)($_POST['capacity'] ?? 0);
    $location = mysqli_real_escape_string($conn, $_POST['location'] ?? '');
    $facilities = mysqli_real_escape_string($conn, $_POST['facilities'] ?? '');
    
    $sql = "INSERT INTO venues (name, capacity, location, facilities) VALUES ('$name', $capacity, '$location', '$facilities')";
    
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Venue added']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add venue']);
    }
    
} elseif ($action === 'update') {
    if ($_SESSION['role'] !== 'admin') {
        echo json_encode(['success' => false, 'message' => 'Admin only']);
        exit;
    }
    
    $id = (int)($_POST['id'] ?? 0);
    $name = mysqli_real_escape_string($conn, $_POST['name'] ?? '');
    $capacity = (int)($_POST['capacity'] ?? 0);
    $location = mysqli_real_escape_string($conn, $_POST['location'] ?? '');
    $facilities = mysqli_real_escape_string($conn, $_POST['facilities'] ?? '');
    
    $sql = "UPDATE venues SET name='$name', capacity=$capacity, location='$location', facilities='$facilities' WHERE venue_id=$id";
    
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Venue updated']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update']);
    }
    
} elseif ($action === 'delete') {
    if ($_SESSION['role'] !== 'admin') {
        echo json_encode(['success' => false, 'message' => 'Admin only']);
        exit;
    }
    
    $id = (int)($_POST['id'] ?? 0);
    mysqli_query($conn, "DELETE FROM venues WHERE venue_id = $id");
    echo json_encode(['success' => true, 'message' => 'Venue deleted']);
}

mysqli_close($conn);
?>