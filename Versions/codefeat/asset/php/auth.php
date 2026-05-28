<?php
session_start();
require_once __DIR__ . '/config/db.php';

// ── ROUTER ────────────────────────────────────────────────
$action = $_POST['action'] ?? $_GET['action'] ?? '';

match ($action) {
    'login'  => handleLogin(),
    'signup' => handleSignup(),
    'logout' => handleLogout(),
    'check'  => handleCheckSession(),
    default  => respond(false, 'Invalid action.')
};

// ══════════════════════════════════════════════════════════
//  LOGIN
// ══════════════════════════════════════════════════════════
function handleLogin() {
    $email    = trim($_POST['email']    ?? '');
    $password = trim($_POST['password'] ?? '');
    $role     = trim($_POST['role']     ?? 'user');

    if (!$email || !$password) {
        respond(false, 'Email and password are required.');
    }

    $conn = getConn();

    if ($role === 'admin') {
        $stmt = mysqli_prepare($conn,
            "SELECT admin_id AS id, username AS name, password AS hash, name AS full_name
             FROM admin WHERE username = ? LIMIT 1");
        mysqli_stmt_bind_param($stmt, 's', $email);
    } else {
        $stmt = mysqli_prepare($conn,
            "SELECT user_id AS id, name, email, password AS hash
             FROM users WHERE email = ? LIMIT 1");
        mysqli_stmt_bind_param($stmt, 's', $email);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row    = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    if (!$row) {
        respond(false, 'No account found with those credentials.');
    }

    // Check password - support both hashed and plain text
    $validPassword = false;
    
    // Try password_verify first (for hashed passwords)
    if (password_verify($password, $row['hash'])) {
        $validPassword = true;
    }
    // Fallback: check plain text (for admin without hash)
    elseif ($row['hash'] === $password) {
        $validPassword = true;
    }

    if (!$validPassword) {
        respond(false, 'Incorrect password.');
    }

    // Store session
    session_regenerate_id(true);
    if ($role === 'admin') {
        $_SESSION['admin_id']   = $row['id'];
        $_SESSION['admin_name'] = $row['full_name'] ?? $row['name'];
        $_SESSION['username']   = $row['name'];
        $_SESSION['role']       = 'admin';
        respond(true, 'Login successful.', [
            'redirect' => '/codefeat/asset/pages/admin.html',
            'user' => ['id' => $row['id'], 'name' => $row['full_name'] ?? $row['name'], 'role' => 'admin']
        ]);
    } else {
        $_SESSION['user_id']   = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['role']      = 'user';
        respond(true, 'Login successful.', [
            'redirect' => '/codefeat/asset/pages/student.html',
            'user' => ['id' => $row['id'], 'name' => $row['name'], 'email' => $row['email'], 'role' => 'user']
        ]);
    }
}

// ══════════════════════════════════════════════════════════
//  SIGNUP
// ══════════════════════════════════════════════════════════
function handleSignup() {
    $name     = trim($_POST['name']     ?? '');
    $email    = trim($_POST['email']    ?? '');
    $password = trim($_POST['password'] ?? '');
    $role     = trim($_POST['role']     ?? 'user');

    // ── Basic validation ──
    if (!$name || !$email || !$password) {
        respond(false, 'Name, email and password are required.');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        respond(false, 'Invalid email address.');
    }
    if (strlen($password) < 6) {
        respond(false, 'Password must be at least 6 characters.');
    }

    $conn = getConn();

    if ($role === 'admin') {
        // ── Check duplicate admin username ──
        $chk = mysqli_prepare($conn, "SELECT admin_id FROM admin WHERE username = ? LIMIT 1");
        mysqli_stmt_bind_param($chk, 's', $email);
        mysqli_stmt_execute($chk);
        mysqli_stmt_store_result($chk);
        if (mysqli_stmt_num_rows($chk) > 0) {
            mysqli_stmt_close($chk);
            respond(false, 'An admin account with that username already exists.');
        }
        mysqli_stmt_close($chk);

        $dept          = trim($_POST['adminDept']      ?? '');
        $contact       = trim($_POST['adminContact']   ?? '');
        $officeLocation = trim($_POST['officeLocation'] ?? '');
        $adminID       = trim($_POST['adminID']        ?? '');

        // Store password as plain text for admin (easier for testing)
        $stmt = mysqli_prepare($conn,
            "INSERT INTO admin (username, password, name, department, contact, office_location, admin_code)
             VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sssssss',
            $email, $password, $name, $dept, $contact, $officeLocation, $adminID);

    } else {
        // ── Check duplicate user email ──
        $chk = mysqli_prepare($conn, "SELECT user_id FROM users WHERE email = ? LIMIT 1");
        mysqli_stmt_bind_param($chk, 's', $email);
        mysqli_stmt_execute($chk);
        mysqli_stmt_store_result($chk);
        if (mysqli_stmt_num_rows($chk) > 0) {
            mysqli_stmt_close($chk);
            respond(false, 'Email is already registered.');
        }
        mysqli_stmt_close($chk);

        $contact    = trim($_POST['contact']    ?? '');
        $faculty    = trim($_POST['faculty']    ?? '');
        $semester   = trim($_POST['semester']   ?? '');
        $college    = trim($_POST['college']    ?? '');
        $university = trim($_POST['university'] ?? '');
        $location   = trim($_POST['location']   ?? '');

        // Hash password for users
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = mysqli_prepare($conn,
            "INSERT INTO users (name, email, password, contact, faculty, semester, college, university, location)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sssssssss',
            $name, $email, $hash, $contact, $faculty, $semester, $college, $university, $location);
    }

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        respond(true, 'Account created successfully!', ['redirect' => '/codefeat/asset/pages/login.html']);
    } else {
        $err = mysqli_stmt_error($stmt);
        mysqli_stmt_close($stmt);
        respond(false, 'Registration failed: ' . $err);
    }
}

// ══════════════════════════════════════════════════════════
//  LOGOUT
// ══════════════════════════════════════════════════════════
function handleLogout() {
    session_destroy();
    respond(true, 'Logged out successfully', ['redirect' => '/codefeat/asset/pages/login.html']);
}

// ══════════════════════════════════════════════════════════
//  CHECK SESSION
// ══════════════════════════════════════════════════════════
function handleCheckSession() {
    if (isset($_SESSION['role'])) {
        respond(true, 'Session active', [
            'role' => $_SESSION['role'],
            'user' => [
                'id' => $_SESSION['user_id'] ?? $_SESSION['admin_id'],
                'name' => $_SESSION['user_name'] ?? $_SESSION['admin_name'],
                'role' => $_SESSION['role']
            ]
        ]);
    } else {
        respond(false, 'No active session');
    }
}

// ── JSON response helper ───────────────────────────────────
function respond(bool $success, string $message, array $data = []) {
    header('Content-Type: application/json');
    echo json_encode(array_merge(['success' => $success, 'message' => $message], $data));
    exit;
}
?>