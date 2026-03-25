<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ems');

function getConn() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        die(json_encode(['success' => false, 'message' => 'Database connection failed']));
    }
    mysqli_set_charset($conn, 'utf8mb4');
    return $conn;
}
?>