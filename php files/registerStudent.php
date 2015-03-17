<?php
require('db_connect.php');

if(isset($_POST['Submit'])){
	if(empty($_POST['StudentId']) || empty($_POST['User_pass'])) {
		die ('Please enter Student ID and password');
	}
	else{
		//Define $StudentId and $User_pass
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$emailAddress = $_POST['emailAddress'];
		$StudentId = $_POST['StudentId'];
		$User_pass = $_POST['User_pass'];
		
		$StudentId = stripslashes($StudentId);
		$User_pass = stripslashes($User_pass);
		$StudentId = mysqli_real_escape_string($conn, $StudentId);
		$User_pass = mysqli_real_escape_string($conn, $User_pass);
		
		$User_pass = password_hash($User_pass, PASSWORD_DEFAULT);
		
		$query = "INSERT INTO student (FirstName, LastName, Email, User_pass, StudentId)
				VALUES ('$firstName', '$lastName', '$emailAddress', '$User_pass', '$StudentId')";
		$result = mysqli_query($conn, $query);
		
		if($result){
			echo "New record created.";
		}
		else {
			echo "Error: " . $query. "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);

	}
}

?>