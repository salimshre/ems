<?php
session_start();
require_once 'config/db.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($action === 'login') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $role = trim($_POST['role'] ?? 'user');
    
    if (!$email || !$password) {
        echo json_encode(['success' => false, 'message' => 'Email and password required']);
        exit;
    }
    
    $conn = getConn();
    
    if ($role === 'admin') {
        $result = mysqli_query($conn, "SELECT admin_id, username, password, name FROM admin WHERE username = '$email'");
        $user = mysqli_fetch_assoc($result);
        
        if ($user && $user['password'] === $password) {
            $_SESSION['admin_id'] = $user['admin_id'];
            $_SESSION['admin_name'] = $user['name'];
            $_SESSION['role'] = 'admin';
            echo json_encode(['success' => true, 'message' => 'Login successful', 'redirect' => '/codefeat/asset/pages/admin.html']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
        }
    } else {
        $result = mysqli_query($conn, "SELECT user_id, name, email, password FROM users WHERE email = '$email'");
        $user = mysqli_fetch_assoc($result);
        
        if ($user && $user['password'] === $password) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['role'] = 'user';
            echo json_encode(['success' => true, 'message' => 'Login successful', 'redirect' => '/codefeat/asset/pages/student.html']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
        }
    }
    mysqli_close($conn);
    
} elseif ($action === 'signup') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $role = trim($_POST['role'] ?? 'user');
    
    if (!$name || !$email || !$password) {
        echo json_encode(['success' => false, 'message' => 'All fields required']);
        exit;
    }
    
    $conn = getConn();
    
    if ($role === 'admin') {
        $check = mysqli_query($conn, "SELECT admin_id FROM admin WHERE username = '$email'");
        if (mysqli_num_rows($check) > 0) {
            echo json_encode(['success' => false, 'message' => 'Admin already exists']);
            exit;
        }
        
        $dept = $_POST['adminDept'] ?? '';
        $contact = $_POST['adminContact'] ?? '';
        $office = $_POST['officeLocation'] ?? '';
        $code = $_POST['adminID'] ?? '';
        
        $sql = "INSERT INTO admin (username, password, name, department, contact, office_location, admin_code) 
                VALUES ('$email', '$password', '$name', '$dept', '$contact', '$office', '$code')";
        
        if (mysqli_query($conn, $sql)) {
            echo json_encode(['success' => true, 'message' => 'Admin created', 'redirect' => '/codefeat/asset/pages/login.html']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Registration failed']);
        }
    } else {
        $check = mysqli_query($conn, "SELECT user_id FROM users WHERE email = '$email'");
        if (mysqli_num_rows($check) > 0) {
            echo json_encode(['success' => false, 'message' => 'Email already registered']);
            exit;
        }
        
        $contact = $_POST['contact'] ?? '';
        $faculty = $_POST['faculty'] ?? '';
        $semester = $_POST['semester'] ?? '';
        $college = $_POST['college'] ?? '';
        $university = $_POST['university'] ?? '';
        $location = $_POST['location'] ?? '';
        
        $sql = "INSERT INTO users (name, email, password, contact, faculty, semester, college, university, location) 
                VALUES ('$name', '$email', '$password', '$contact', '$faculty', '$semester', '$college', '$university', '$location')";
        
        if (mysqli_query($conn, $sql)) {
            echo json_encode(['success' => true, 'message' => 'Account created', 'redirect' => '/codefeat/asset/pages/login.html']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Registration failed']);
        }
    }
    mysqli_close($conn);
    
} elseif ($action === 'logout') {
    session_destroy();
    echo json_encode(['success' => true, 'message' => 'Logged out', 'redirect' => '/codefeat/asset/pages/login.html']);
    
} elseif ($action === 'check') {
    if (isset($_SESSION['role'])) {
        echo json_encode([
            'success' => true, 
            'role' => $_SESSION['role'],
            'user' => [
                'id' => $_SESSION['user_id'] ?? $_SESSION['admin_id'],
                'name' => $_SESSION['user_name'] ?? $_SESSION['admin_name']
            ]
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Not logged in']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>