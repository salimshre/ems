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
    if ($_SESSION['role'] !== 'admin') {
        echo json_encode(['success' => false, 'message' => 'Admin only']);
        exit;
    }
    
    $search = $_GET['search'] ?? '';
    $sql = "SELECT r.*, u.name as student_name, e.title as event_title 
            FROM registrations r 
            JOIN users u ON r.user_id = u.user_id 
            JOIN events e ON r.event_id = e.event_id";
    
    if ($search) {
        $sql .= " WHERE u.name LIKE '%$search%' OR e.title LIKE '%$search%'";
    }
    
    $result = mysqli_query($conn, $sql);
    $registrations = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $registrations[] = $row;
    }
    echo json_encode(['success' => true, 'registrations' => $registrations]);
    
} elseif ($action === 'my') {
    $userId = $_SESSION['user_id'] ?? 0;
    $result = mysqli_query($conn, "SELECT r.*, e.title, e.date, e.time, e.venue, e.category, e.image_url 
                                   FROM registrations r 
                                   JOIN events e ON r.event_id = e.event_id 
                                   WHERE r.user_id = $userId 
                                   ORDER BY e.date DESC");
    $registrations = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $registrations[] = $row;
    }
    echo json_encode(['success' => true, 'registrations' => $registrations]);
    
} elseif ($action === 'register') {
    $userId = $_SESSION['user_id'] ?? 0;
    if (!$userId) {
        echo json_encode(['success' => false, 'message' => 'Login required']);
        exit;
    }
    
    $eventId = (int)($_POST['event_id'] ?? 0);
    
    // Check if already registered
    $check = mysqli_query($conn, "SELECT * FROM registrations WHERE user_id = $userId AND event_id = $eventId");
    if (mysqli_num_rows($check) > 0) {
        echo json_encode(['success' => false, 'message' => 'Already registered']);
        exit;
    }
    
    // Check capacity
    $event = mysqli_fetch_assoc(mysqli_query($conn, "SELECT capacity FROM events WHERE event_id = $eventId"));
    $regCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM registrations WHERE event_id = $eventId AND status = 'confirmed'"));
    
    if ($regCount['count'] >= $event['capacity']) {
        echo json_encode(['success' => false, 'message' => 'Event is full']);
        exit;
    }
    
    $today = date('Y-m-d');
    $sql = "INSERT INTO registrations (user_id, event_id, registration_date, status) 
            VALUES ($userId, $eventId, '$today', 'confirmed')";
    
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Registered successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Registration failed']);
    }
    
} elseif ($action === 'cancel') {
    $regId = (int)($_POST['registration_id'] ?? 0);
    
    if ($_SESSION['role'] === 'admin') {
        mysqli_query($conn, "UPDATE registrations SET status = 'cancelled' WHERE registration_id = $regId");
        echo json_encode(['success' => true, 'message' => 'Cancelled']);
    } else {
        $userId = $_SESSION['user_id'] ?? 0;
        mysqli_query($conn, "UPDATE registrations SET status = 'cancelled' WHERE registration_id = $regId AND user_id = $userId");
        echo json_encode(['success' => true, 'message' => 'Cancelled']);
    }
    
} elseif ($action === 'update') {
    if ($_SESSION['role'] !== 'admin') {
        echo json_encode(['success' => false, 'message' => 'Admin only']);
        exit;
    }
    
    $regId = (int)($_POST['registration_id'] ?? 0);
    $status = $_POST['status'] ?? '';
    mysqli_query($conn, "UPDATE registrations SET status = '$status' WHERE registration_id = $regId");
    echo json_encode(['success' => true, 'message' => 'Status updated']);
    
} elseif ($action === 'stats') {
    $userId = $_SESSION['user_id'] ?? 0;
    $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM registrations WHERE user_id = $userId");
    $total = mysqli_fetch_assoc($result);
    
    $result = mysqli_query($conn, "SELECT COUNT(*) as confirmed FROM registrations WHERE user_id = $userId AND status = 'confirmed'");
    $confirmed = mysqli_fetch_assoc($result);
    
    echo json_encode(['success' => true, 'stats' => ['total' => $total['total'], 'confirmed' => $confirmed['confirmed']]]);
}

mysqli_close($conn);
?>