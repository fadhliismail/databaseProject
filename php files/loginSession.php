<?php
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
		
		$query = "SELECT StudentId, StudentNo FROM student WHERE StudentId='$StudentId' AND User_pass=SHA1('$User_pass')";
		$data = mysqli_query($conn, $query);
		if (mysqli_num_rows($data) == 1) {
			echo "Logged in!";
			session_start();
			$row = mysqli_fetch_array($data);
			setcookie('StudentId', $row['StudentId']);
			setcookie('StudentNo', $row['StudentNo']);
			/* $indexURL = 'http://' . $_SERVER['HTTP_HOST'] .
			dirname($_SERVER['PHP_SELF']) . '/index.php'; */
			
			$_SESSION['login_user']=$StudentId; // Initializing Session
			header("Location: profile.php");
			//header('Location: '. $indexURL); // Redirecting To Other Page
			} else {
			echo "Error: " . $query. "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn); // Closing Connection
	}
}
?>