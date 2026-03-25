<?php
session_start();
require_once __DIR__ . '/config/db.php';

if (!isset($_SESSION['role'])) {
    respond(false, 'Unauthorized', [], 401);
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

match ($action) {
    'get'    => getProfile(),
    'update' => updateProfile(),
    default  => respond(false, 'Invalid action')
};

function getProfile() {
    $userId = $_SESSION['user_id'] ?? 0;
    $role   = $_SESSION['role'];

    if ($role === 'admin') {
        $adminId = $_SESSION['admin_id'] ?? 0;
        $conn    = getConn();
        $stmt    = mysqli_prepare($conn,
            "SELECT admin_id, username, name, department, contact, office_location FROM admin WHERE admin_id = ?");
        mysqli_stmt_bind_param($stmt, 'i', $adminId);
    } else {
        $conn = getConn();
        $stmt = mysqli_prepare($conn,
            "SELECT user_id, name, email, contact, faculty, semester, college, university, location FROM users WHERE user_id = ?");
        mysqli_stmt_bind_param($stmt, 'i', $userId);
    }

    mysqli_stmt_execute($stmt);
    $result  = mysqli_stmt_get_result($stmt);
    $profile = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if ($profile) {
        $profile['role'] = $role;
        respond(true, 'Profile fetched', ['profile' => $profile]);
    } else {
        respond(false, 'Profile not found');
    }
}

function updateProfile() {
    $userId = $_SESSION['user_id'] ?? 0;
    $role = $_SESSION['role'];
    
    if ($role === 'admin') {
        $adminId = $_SESSION['admin_id'] ?? 0;
        $name = trim($_POST['name'] ?? '');
        $department = trim($_POST['department'] ?? '');
        $contact = trim($_POST['contact'] ?? '');
        $officeLocation = trim($_POST['office_location'] ?? '');
        
        $conn = getConn();
        $stmt = mysqli_prepare($conn, 
            "UPDATE admin SET name=?, department=?, contact=?, office_location=? WHERE admin_id=?");
        mysqli_stmt_bind_param($stmt, 'ssssi', $name, $department, $contact, $officeLocation, $adminId);
    } else {
        $name = trim($_POST['name'] ?? '');
        $contact = trim($_POST['contact'] ?? '');
        $faculty = trim($_POST['faculty'] ?? '');
        $semester = trim($_POST['semester'] ?? '');
        $college = trim($_POST['college'] ?? '');
        $university = trim($_POST['university'] ?? '');
        $location = trim($_POST['location'] ?? '');
        
        $conn = getConn();
        $stmt = mysqli_prepare($conn, 
            "UPDATE users SET name=?, contact=?, faculty=?, semester=?, college=?, university=?, location=? WHERE user_id=?");
        mysqli_stmt_bind_param($stmt, 'sssssssi', $name, $contact, $faculty, $semester, $college, $university, $location, $userId);
    }
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        respond(true, 'Profile updated successfully');
    } else {
        respond(false, 'Failed to update profile');
    }
}

function respond($success, $message, $data = [], $code = 200) {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode(array_merge(['success' => $success, 'message' => $message], $data));
    exit;
}
?>