<?php
session_start();

// Database connection
$conn = mysqli_connect('localhost','root','','ems');
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

// Get login data from form
$email = $_POST['email'];
$pass  = $_POST['password'];
$role  = $_POST['role']; // role: 'user' or 'admin'

// Check role and query correct table
if($role == 'admin'){
    $sql = "SELECT admin_id AS id FROM admin 
            WHERE username='$email' AND password='$pass'";
} else {
    $sql = "SELECT user_id AS id FROM users 
            WHERE email='$email' AND password='$pass'";
}

$result = mysqli_query($conn, $sql);

// Check if login is correct
if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    
    // Store session based on role
    if($role == 'admin'){
        $_SESSION['admin_id'] = $row['id'];
        header('Location: asset\pages\admin.html'); // redirect admin
    } else {
        $_SESSION['user_id'] = $row['id'];
        header('Location: asset\pages\student.html'); // redirect user
    } //asset\pages
    exit;
} else {
    echo "Login failed! Invalid credentials or role.";
}

mysqli_close($conn);
?>