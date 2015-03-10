<?php
require_once('db_connect.php');
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query("select StudentId from login where StudentId='$user_check'", $conn);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['StudentId'];
if(!isset($login_session)){
mysqli_close($conn); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>