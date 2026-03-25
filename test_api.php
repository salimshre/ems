<?php
// test_api.php
echo "<h1>EventHub API Test</h1>";

// Test database connection
require_once 'asset/php/config/db.php';
$conn = getConn();

echo "<h2>Database Connection: SUCCESS</h2>";

// Test events
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM events");
$row = mysqli_fetch_assoc($result);
echo "<p>Events in database: " . $row['count'] . "</p>";

// Test venues
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM venues");
$row = mysqli_fetch_assoc($result);
echo "<p>Venues in database: " . $row['count'] . "</p>";

// Test users
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM users");
$row = mysqli_fetch_assoc($result);
echo "<p>Users in database: " . $row['count'] . "</p>";

// Test admin
$result = mysqli_query($conn, "SELECT * FROM admin WHERE username = 'admin'");
$admin = mysqli_fetch_assoc($result);
if ($admin) {
    echo "<h2>Admin Account Found:</h2>";
    echo "<p>Username: " . $admin['username'] . "</p>";
    echo "<p>Password (stored): " . $admin['password'] . "</p>";
    echo "<p>Password match with 'admin123': " . ($admin['password'] === 'admin123' ? 'YES' : 'NO') . "</p>";
} else {
    echo "<p style='color:red'>Admin account NOT found! Please run the SQL script to insert admin.</p>";
}

mysqli_close($conn);
?>