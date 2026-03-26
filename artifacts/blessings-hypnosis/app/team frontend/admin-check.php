<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM admins 
WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($query) > 0){
    $_SESSION['admin'] = $username;
    header("Location: adminAstro/admin-dashboard.php");
} else {
    echo "<script>alert('Invalid Login'); window.location='admin-login.php';</script>";
}
?>