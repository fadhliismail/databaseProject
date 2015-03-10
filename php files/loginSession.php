<?php
session_start();
require_once('db_connect.php');

if(isset($_POST['Submit'])){
	if(empty($_POST['StudentId']) || empty($_POST['User_pass'])) {
		die ('Please enter Student ID and password');
	}
	else{
		//Define $StudentId and $User_pass
		$StudentId = $_POST['StudentId'];
		$User_pass = $_POST['User_pass'];
		
		//
		$StudentId = stripslashes($StudentId);
		$User_pass = stripslashes($User_pass);
		$StudentId = mysqli_real_escape_string($conn, $StudentId);
		$User_pass = mysqli_real_escape_string($conn, $User_pass);
		
		$query = mysqli_query($conn, "select * from student where User_pass='$User_pass' AND StudentId='$StudentId'");
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
		$_SESSION['login_user']=$StudentId; // Initializing Session
		header("location: profile.php"); // Redirecting To Other Page
		} else {
		die ('StudentId or Password is invalid');
		}
		mysqli_close($conn); // Closing Connection
	}
}
?>