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
    $result = mysqli_query($conn, "SELECT * FROM events ORDER BY date ASC");
    $events = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $regCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM registrations WHERE event_id = {$row['event_id']} AND status = 'confirmed'"));
        $row['confirmed_registrations'] = $regCount['count'];
        $events[] = $row;
    }
    echo json_encode(['success' => true, 'events' => $events]);
    
} elseif ($action === 'upcoming') {
    $today = date('Y-m-d');
    $result = mysqli_query($conn, "SELECT * FROM events WHERE date >= '$today' ORDER BY date ASC LIMIT 6");
    $events = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $events[] = $row;
    }
    echo json_encode(['success' => true, 'events' => $events]);
    
} elseif ($action === 'get') {
    $id = (int)($_GET['id'] ?? 0);
    $result = mysqli_query($conn, "SELECT * FROM events WHERE event_id = $id");
    $event = mysqli_fetch_assoc($result);
    echo json_encode(['success' => true, 'event' => $event]);
    
} elseif ($action === 'create') {
    if ($_SESSION['role'] !== 'admin') {
        echo json_encode(['success' => false, 'message' => 'Admin only']);
        exit;
    }
    
    $title = mysqli_real_escape_string($conn, $_POST['title'] ?? '');
    $desc = mysqli_real_escape_string($conn, $_POST['description'] ?? '');
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $venue = mysqli_real_escape_string($conn, $_POST['venue'] ?? '');
    $category = mysqli_real_escape_string($conn, $_POST['category'] ?? '');
    $capacity = (int)($_POST['capacity'] ?? 0);
    $image = mysqli_real_escape_string($conn, $_POST['image'] ?? '');
    
    $sql = "INSERT INTO events (title, description, date, time, venue, category, capacity, image_url) 
            VALUES ('$title', '$desc', '$date', '$time', '$venue', '$category', $capacity, '$image')";
    
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Event created']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to create event']);
    }
    
} elseif ($action === 'update') {
    if ($_SESSION['role'] !== 'admin') {
        echo json_encode(['success' => false, 'message' => 'Admin only']);
        exit;
    }
    
    $id = (int)($_POST['id'] ?? 0);
    $title = mysqli_real_escape_string($conn, $_POST['title'] ?? '');
    $desc = mysqli_real_escape_string($conn, $_POST['description'] ?? '');
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $venue = mysqli_real_escape_string($conn, $_POST['venue'] ?? '');
    $category = mysqli_real_escape_string($conn, $_POST['category'] ?? '');
    $capacity = (int)($_POST['capacity'] ?? 0);
    $image = mysqli_real_escape_string($conn, $_POST['image'] ?? '');
    
    $sql = "UPDATE events SET title='$title', description='$desc', date='$date', time='$time', 
            venue='$venue', category='$category', capacity=$capacity, image_url='$image' 
            WHERE event_id=$id";
    
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Event updated']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update']);
    }
    
} elseif ($action === 'delete') {
    if ($_SESSION['role'] !== 'admin') {
        echo json_encode(['success' => false, 'message' => 'Admin only']);
        exit;
    }
    
    $id = (int)($_POST['id'] ?? 0);
    mysqli_query($conn, "DELETE FROM registrations WHERE event_id = $id");
    mysqli_query($conn, "DELETE FROM events WHERE event_id = $id");
    echo json_encode(['success' => true, 'message' => 'Event deleted']);
}

mysqli_close($conn);
?>