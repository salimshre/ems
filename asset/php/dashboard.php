<?php
session_start();
require_once __DIR__ . '/config/db.php';

if (!isset($_SESSION['role'])) {
    respond(false, 'Unauthorized', [], 401);
}

$action = $_GET['action'] ?? $_POST['action'] ?? '';

match ($action) {
    'stats' => getDashboardStats(),
    default => respond(false, 'Invalid action')
};

function getDashboardStats() {
    $conn = getConn();
    $today = date('Y-m-d');
    
    $stats = [];
    
    // Total events
    $result = mysqli_query($conn, "SELECT COUNT(*) as count FROM events");
    $row = mysqli_fetch_assoc($result);
    $stats['total_events'] = $row['count'];
    
    // Total registrations (confirmed)
    $result = mysqli_query($conn, "SELECT COUNT(*) as count FROM registrations WHERE status = 'confirmed'");
    $row = mysqli_fetch_assoc($result);
    $stats['total_registrations'] = $row['count'];
    
    // Upcoming events
    $stmt = mysqli_prepare($conn, "SELECT COUNT(*) as count FROM events WHERE date >= ? AND status = 'upcoming'");
    mysqli_stmt_bind_param($stmt, 's', $today);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $stats['upcoming_events'] = $row['count'];
    
    // Total venues (active)
    $result = mysqli_query($conn, "SELECT COUNT(*) as count FROM venues WHERE status = 'active'");
    $row = mysqli_fetch_assoc($result);
    $stats['total_venues'] = $row['count'];
    
    // Recent events (last 5)
    $recentStmt = mysqli_prepare($conn, 
        "SELECT event_id, title, date, category, registered, capacity 
         FROM events ORDER BY created_at DESC LIMIT 5");
    mysqli_stmt_execute($recentStmt);
    $recentResult = mysqli_stmt_get_result($recentStmt);
    $recentEvents = [];
    while ($row = mysqli_fetch_assoc($recentResult)) {
        // Get confirmed registrations count
        $regStmt = mysqli_prepare($conn, 
            "SELECT COUNT(*) as count FROM registrations WHERE event_id = ? AND status = 'confirmed'");
        mysqli_stmt_bind_param($regStmt, 'i', $row['event_id']);
        mysqli_stmt_execute($regStmt);
        $regResult = mysqli_stmt_get_result($regStmt);
        $regRow = mysqli_fetch_assoc($regResult);
        $row['registered'] = $regRow['count'];
        mysqli_stmt_close($regStmt);
        
        $recentEvents[] = $row;
    }
    $stats['recent_events'] = $recentEvents;
    
    mysqli_stmt_close($recentStmt);
    
    respond(true, 'Stats fetched', ['stats' => $stats]);
}

function respond($success, $message, $data = [], $code = 200) {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode(array_merge(['success' => $success, 'message' => $message], $data));
    exit;
}
?>