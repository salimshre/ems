<?php
session_start();
require_once __DIR__ . '/config/db.php';

if (!isset($_SESSION['role'])) {
    respond(false, 'Unauthorized', [], 401);
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

match ($action) {
    'list'     => getRegistrations(),
    'my'       => getMyRegistrations(),
    'register' => registerForEvent(),
    'cancel'   => cancelRegistration(),
    'update'   => updateRegistrationStatus(),
    'stats'    => getRegistrationStats(),
    'check'    => checkRegistration(),
    default    => respond(false, 'Invalid action')
};

// ══════════════════════════════════════════════════════════
//  GET ALL REGISTRATIONS (Admin only)
// ══════════════════════════════════════════════════════════
function getRegistrations() {
    if ($_SESSION['role'] !== 'admin') respond(false, 'Only admins can view all registrations');

    $conn   = getConn();
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';

    $sql = "SELECT r.*, u.name as student_name, u.email, e.title as event_title, e.date, e.time, e.venue
            FROM registrations r
            JOIN users  u ON r.user_id  = u.user_id
            JOIN events e ON r.event_id = e.event_id";

    if ($search) {
        $sql .= " WHERE u.name LIKE ? OR e.title LIKE ?";
        $searchTerm = "%$search%";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $searchTerm, $searchTerm);
    } else {
        $stmt = mysqli_prepare($conn, $sql . " ORDER BY r.created_at DESC");
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $registrations = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $registrations[] = $row;
    }

    mysqli_stmt_close($stmt);
    respond(true, 'Registrations fetched', ['registrations' => $registrations]);
}

// ══════════════════════════════════════════════════════════
//  GET MY REGISTRATIONS (Current student)
// ══════════════════════════════════════════════════════════
function getMyRegistrations() {
    $userId = $_SESSION['user_id'] ?? 0;
    if (!$userId) respond(false, 'Please login as a student first');

    $conn = getConn();
    $stmt = mysqli_prepare($conn,
        "SELECT r.*, e.title, e.date, e.time, e.venue, e.category, e.image_url, e.description
         FROM registrations r
         JOIN events e ON r.event_id = e.event_id
         WHERE r.user_id = ?
         ORDER BY e.date DESC, e.time DESC");
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $registrations = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $registrations[] = $row;
    }

    mysqli_stmt_close($stmt);
    respond(true, 'My registrations fetched', ['registrations' => $registrations]);
}

// ══════════════════════════════════════════════════════════
//  REGISTER FOR EVENT (Student)
// ══════════════════════════════════════════════════════════
function registerForEvent() {
    $userId  = $_SESSION['user_id'] ?? 0;
    if (!$userId) respond(false, 'Please login as a student first');

    $eventId = (int)($_POST['event_id'] ?? 0);
    if (!$eventId) respond(false, 'Event ID is required');

    $conn = getConn();

    // Check event exists and has available capacity
    $evtStmt = mysqli_prepare($conn,
        "SELECT event_id, capacity,
         (SELECT COUNT(*) FROM registrations WHERE event_id = e.event_id AND status = 'confirmed') AS confirmed
         FROM events e WHERE event_id = ? LIMIT 1");
    mysqli_stmt_bind_param($evtStmt, 'i', $eventId);
    mysqli_stmt_execute($evtStmt);
    $evtResult = mysqli_stmt_get_result($evtStmt);
    $event     = mysqli_fetch_assoc($evtResult);
    mysqli_stmt_close($evtStmt);

    if (!$event) respond(false, 'Event not found');
    if ((int)$event['confirmed'] >= (int)$event['capacity']) {
        respond(false, 'Sorry, this event is fully booked');
    }

    // Check duplicate registration
    $chk = mysqli_prepare($conn,
        "SELECT registration_id FROM registrations WHERE user_id = ? AND event_id = ? LIMIT 1");
    mysqli_stmt_bind_param($chk, 'ii', $userId, $eventId);
    mysqli_stmt_execute($chk);
    mysqli_stmt_store_result($chk);
    if (mysqli_stmt_num_rows($chk) > 0) {
        mysqli_stmt_close($chk);
        respond(false, 'You are already registered for this event');
    }
    mysqli_stmt_close($chk);

    // Insert registration
    $today = date('Y-m-d');
    $stmt  = mysqli_prepare($conn,
        "INSERT INTO registrations (user_id, event_id, registration_date, status) VALUES (?, ?, ?, 'confirmed')");
    mysqli_stmt_bind_param($stmt, 'iis', $userId, $eventId, $today);

    if (mysqli_stmt_execute($stmt)) {
        $regId = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);
        respond(true, 'Successfully registered for the event!', ['registration_id' => $regId]);
    } else {
        $err = mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
        respond(false, 'Registration failed: ' . $err);
    }
}

// ══════════════════════════════════════════════════════════
//  CANCEL REGISTRATION (Student — own, or Admin — any)
// ══════════════════════════════════════════════════════════
function cancelRegistration() {
    $registrationId = (int)($_POST['registration_id'] ?? 0);
    if (!$registrationId) respond(false, 'Registration ID is required');

    $conn = getConn();

    if ($_SESSION['role'] === 'admin') {
        // Admin can cancel any registration
        $stmt = mysqli_prepare($conn,
            "UPDATE registrations SET status = 'cancelled' WHERE registration_id = ?");
        mysqli_stmt_bind_param($stmt, 'i', $registrationId);
    } else {
        // Student can only cancel their own
        $userId = $_SESSION['user_id'] ?? 0;
        if (!$userId) respond(false, 'Please login as a student first');

        $stmt = mysqli_prepare($conn,
            "UPDATE registrations SET status = 'cancelled' WHERE registration_id = ? AND user_id = ?");
        mysqli_stmt_bind_param($stmt, 'ii', $registrationId, $userId);
    }

    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_stmt_affected_rows($stmt) === 0) {
            mysqli_stmt_close($stmt);
            respond(false, 'Registration not found or not owned by you');
        }
        mysqli_stmt_close($stmt);
        respond(true, 'Registration cancelled successfully');
    } else {
        $err = mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
        respond(false, 'Failed to cancel registration: ' . $err);
    }
}

// ══════════════════════════════════════════════════════════
//  UPDATE REGISTRATION STATUS (Admin only)
// ══════════════════════════════════════════════════════════
function updateRegistrationStatus() {
    if ($_SESSION['role'] !== 'admin') respond(false, 'Only admins can update registration status');

    $registrationId = (int)($_POST['registration_id'] ?? 0);
    $status         = trim($_POST['status'] ?? '');
    $allowed        = ['confirmed', 'pending', 'cancelled', 'attended'];

    if (!$registrationId)         respond(false, 'Registration ID is required');
    if (!in_array($status, $allowed)) respond(false, 'Invalid status value');

    $conn = getConn();
    $stmt = mysqli_prepare($conn,
        "UPDATE registrations SET status = ? WHERE registration_id = ?");
    mysqli_stmt_bind_param($stmt, 'si', $status, $registrationId);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        respond(true, 'Registration status updated to ' . $status);
    } else {
        $err = mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
        respond(false, 'Failed to update status: ' . $err);
    }
}

// ══════════════════════════════════════════════════════════
//  GET REGISTRATION STATS (Current student)
// ══════════════════════════════════════════════════════════
function getRegistrationStats() {
    $userId = $_SESSION['user_id'] ?? 0;
    if (!$userId) respond(false, 'Please login as a student first');

    $conn = getConn();
    $stmt = mysqli_prepare($conn,
        "SELECT
            COUNT(*)                                          AS total,
            SUM(status = 'confirmed')                         AS confirmed,
            SUM(status = 'pending')                           AS pending,
            SUM(status = 'cancelled')                         AS cancelled,
            SUM(status = 'attended')                          AS attended
         FROM registrations WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $stats  = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    respond(true, 'Stats fetched', ['stats' => $stats]);
}

// ══════════════════════════════════════════════════════════
//  CHECK IF ALREADY REGISTERED
// ══════════════════════════════════════════════════════════
function checkRegistration() {
    $userId  = $_SESSION['user_id'] ?? 0;
    $eventId = (int)($_GET['event_id'] ?? $_POST['event_id'] ?? 0);

    if (!$userId || !$eventId) respond(false, 'User and event ID required');

    $conn = getConn();
    $stmt = mysqli_prepare($conn,
        "SELECT registration_id, status FROM registrations
         WHERE user_id = ? AND event_id = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 'ii', $userId, $eventId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $reg    = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if ($reg) {
        respond(true, 'Already registered', ['registered' => true, 'status' => $reg['status'], 'registration_id' => $reg['registration_id']]);
    } else {
        respond(true, 'Not registered', ['registered' => false]);
    }
}

// ── JSON response helper ───────────────────────────────────
function respond($success, $message, $data = [], $code = 200) {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode(array_merge(['success' => $success, 'message' => $message], $data));
    exit;
}
?>