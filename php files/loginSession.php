<?php
require_once('db_connect.php');

if(isset($_POST['Submit'])){
	if(empty($_POST['StudentId']) || empty($_POST['User_pass'])) {
		die ('Please enter your Student ID and password');
	}
	else{
		//Define $StudentId and $User_pass
		$StudentId = $_POST['StudentId'];
		$User_pass = $_POST['User_pass'];
		
		//
		$StudentId = mysqli_real_escape_string($conn, $StudentId);
		$User_password = mysqli_real_escape_string($conn, $User_pass);
		
		
		$query = "SELECT StudentNo, GroupNo, User_pass
					FROM student
					WHERE StudentId = ?";
					
		if($statement = $conn->prepare($query)){
			
			$statement->bind_param('s', $StudentId);
			//execute statement
			$statement->execute();
			
			$statement->store_result();
			//bind result
			$statement->bind_result($StudentNo, $GroupNo, $User_pass_hash);
		
			$statement->fetch();
			if (password_verify($User_password, $User_pass_hash)){
				
				session_start();
			
				$_SESSION['login_user']=$StudentId; // Initializing Session
				$_SESSION['GroupNo']=$GroupNo;
				header("Refresh: 2; url= home.php");
				//header('Location: '. $indexURL); // Redirecting To Other Page
			} else {
				echo 'Error: ' . $query. '<br>' . mysqli_error($conn);
			}
		}
		mysqli_close($conn); // Closing Connection 
	}
}
?>