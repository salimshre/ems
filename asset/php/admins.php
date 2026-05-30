<?php
session_start();
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/security.php';
require_once __DIR__ . '/config/audit.php';

if (!isset($_SESSION['role'])) {
    respond(false, 'Unauthorized', [], 401);
}
require_role('admin');

$action = $_POST['action'] ?? $_GET['action'] ?? '';

match ($action) {
    'list' => listAdmins(),
    'create' => createAdmin(),
    default => respond(false, 'Invalid action')
};

function listAdmins() {
    $conn = getConn();
    $result = mysqli_query($conn,
        "SELECT admin_id, username, name, department, contact, office_location, admin_code, created_at
         FROM admin ORDER BY created_at DESC");

    $admins = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $admins[] = $row;
    }

    respond(true, 'Admins fetched', ['admins' => $admins]);
}

function createAdmin() {
    require_post();
    require_csrf();

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $department = trim($_POST['department'] ?? '');
    $contact = trim($_POST['contact'] ?? '');
    $officeLocation = trim($_POST['office_location'] ?? '');
    $adminCode = trim($_POST['admin_code'] ?? '');

    if (!$username || !$password || !$name) {
        respond(false, 'Username, password, and name are required', [], 400);
    }
    if (strlen($password) < 8) {
        respond(false, 'Password must be at least 8 characters', [], 400);
    }
    if (strlen($username) > 50 || strlen($name) > 100 || strlen($department) > 100) {
        respond(false, 'One or more fields are too long', [], 400);
    }

    $conn = getConn();
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt = mysqli_prepare($conn,
        "INSERT INTO admin (username, password, name, department, contact, office_location, admin_code)
         VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sssssss', $username, $hash, $name, $department, $contact, $officeLocation, $adminCode);

    if (mysqli_stmt_execute($stmt)) {
        $adminId = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);
        log_audit('create', 'admin', $adminId, ['username' => $username]);
        respond(true, 'Admin created', ['admin_id' => $adminId]);
    }

    $error = mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);
    if (str_contains($error, 'Duplicate')) {
        respond(false, 'An admin with that username already exists', [], 409);
    }
    respond(false, 'Failed to create admin: ' . $error, [], 500);
}

function respond($success, $message, $data = [], $code = 200) {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode(array_merge(['success' => $success, 'message' => $message], $data));
    exit;
}
?>
