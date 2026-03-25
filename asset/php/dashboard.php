<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['role'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$conn = getConn();

$stats = [];

// Total events
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM events");
$stats['total_events'] = mysqli_fetch_assoc($result)['count'];

// Total registrations
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM registrations WHERE status = 'confirmed'");
$stats['total_registrations'] = mysqli_fetch_assoc($result)['count'];

// Upcoming events
$today = date('Y-m-d');
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM events WHERE date >= '$today'");
$stats['upcoming_events'] = mysqli_fetch_assoc($result)['count'];

// Total venues
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM venues WHERE status = 'active'");
$stats['total_venues'] = mysqli_fetch_assoc($result)['count'];

// Recent events
$result = mysqli_query($conn, "SELECT * FROM events ORDER BY created_at DESC LIMIT 5");
$recentEvents = [];
while ($row = mysqli_fetch_assoc($result)) {
    $regCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM registrations WHERE event_id = {$row['event_id']} AND status = 'confirmed'"));
    $row['registered'] = $regCount['count'];
    $recentEvents[] = $row;
}
$stats['recent_events'] = $recentEvents;

echo json_encode(['success' => true, 'stats' => $stats]);
mysqli_close($conn);
?>