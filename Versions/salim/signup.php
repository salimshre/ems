
<?php
$conn = mysqli_connect("localhost","root","","ems");
if(!$conn){
    die("Connection failed");
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

/* prevent duplicate phone */
$check = "SELECT * FROM users WHERE email='$email'";
$res = mysqli_query($conn,$check);

if(mysqli_num_rows($res) > 0){
    echo "email already registered!";
    exit();
}

$sql = "INSERT INTO users(name, email, password)
        VALUES('$name','$email','$password')";

if(mysqli_query($conn,$sql)){
    echo "Signup successful! <a href='login.html'>Login now</a>";
}else{
    echo "Signup failed";
}

?>
