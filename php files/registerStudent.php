<?php

error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require('db_connect.php');

if(isset($_POST['Submit'])){
	//php simple validation if html5 validation is not working
	if(empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['emailAddress']) || empty($_POST['Login_Id']) || empty($_POST['User_pass'])) {
		die ('Please enter your User ID and password');
		
	}else{
		//Define $Login_Id, $User_pass, $firstName, $lastName, $emailAddress, $Login_Id
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$emailAddress = $_POST['emailAddress'];
		$Login_Id = $_POST['Login_Id'];
		$User_pass = $_POST['User_pass'];
	
		//unquote a quoted string, in this case student entered baffling student ID and password
		$Login_Id = stripslashes($Login_Id);
		$User_pass = stripslashes($User_pass);
		$Login_Id = mysqli_real_escape_string($conn, $Login_Id);
		$User_pass = mysqli_real_escape_string($conn, $User_pass);
	
		//query to check whether user is already registered
		$checkStudentId = "SELECT FirstName, LastName, Email
							FROM users
								WHERE Login_Id = ?";
		
		if ($statementCheck = $conn->prepare($checkStudentId)) {
			$statementCheck->bind_param('s', $Login_Id);
			$statementCheck->execute();
			$statementCheck->store_result();
			$statementCheck->bind_result($FirstName, $LastName, $Email); //check if data already in table
			$statementCheck->fetch();
		
			//check whether query return any result, check user exist or not
			if ($statementCheck->num_rows){
				//print 'User is already in the table';
				echo "<script type='text/javascript'>";
				echo "alert('You have appeared to be registered. Please retrieve your password.');";
				echo "</script>";
				header("Refresh: 1; url= retrievePasswordPage.php");
			}
			else {
				$user_level = 'student';
				$User_pass_hash = password_hash($User_pass, PASSWORD_DEFAULT);
				$insertStudentToDb = "INSERT INTO users (FirstName, LastName, Email, User_pass, Login_Id, user_level)
						VALUES (?, ?, ?, ?, ?, ?)";
				
				if ($statementInsertToDb = $conn->prepare($insertStudentToDb)) {
					$statementInsertToDb->bind_param('ssssss', $firstName, $lastName, $emailAddress, $User_pass_hash, $Login_Id, $user_level);
					$statementInsertToDb->execute();
					
					//echo "New record created.";
					echo "<script type='text/javascript'>";
					echo "alert('Successful registration');";
					echo "</script>";
					header("Refresh: 1; url= loginPage.php");
				}
				else {
					//echo "Error: " . $insertStudentToDb. "<br>" . mysqli_error($conn);
					echo "<script type='text/javascript'>";
					echo "alert('Unsuccessful registration. Please try again');";
					echo "</script>";
					header("Refresh: 1; url= loginPage.php");
				}
			}
		}
		
	}
	
}
mysqli_close($conn);
?>