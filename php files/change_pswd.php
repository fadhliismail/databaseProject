<?php

        //report any error
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
include 'db_connect.php';

        //check value is set or not
if (!empty($_POST)){
	/*check that all fields are filled*/
	if (empty($_POST['CurrentPswd']) || empty($_POST['NewPswd']) || empty($_POST['ConfirmPswd'])) {
		die("Fields cannot be empty");
	}

	if (isset($_POST['Submit'])) {
		$Current_Pswd = $_POST['CurrentPswd'];
		$New_Pswd = $_POST['NewPswd'];
		$Confirm_Pswd = $_POST['ConfirmPswd'];					}
	}

	$StudentId = 14073184; /*this cannot be a fixed number. it has to get data from session.*/

   		//query statements					
	$queryPassword  = "SELECT User_pass FROM `student` WHERE StudentId = ?";

	if ($resultPswd = $conn->prepare($queryPassword)) {
		$resultPswd->bind_param('i', $StudentId);
		$resultPswd->execute();
		$resultPswd->store_result();
		$resultPswd->bind_result($User_pass);
		$resultPswd->fetch();	

		/*Check that the current password is the same as keyed in*/
		if ($User_pass != $Current_Pswd) {
			die("Password doesn't match!");

		}

		/*Confirmed new password matches*/
		if ($New_Pswd != $Confirm_Pswd) {
			die("New password doesn't match! Please confirm again.");
		}	

	}

	$StudentId = 14073184; /*this cannot be a fixed number. it has to get data from session.*/
	//query statements		
	$queryNewPswd = "UPDATE `student` SET `User_pass`= ? WHERE StudentId= ?";

	if ($updatePswd = $conn->prepare($queryNewPswd)) {
		$updatePswd->bind_param('si', $New_Pswd, $StudentId);
		$updatePswd->execute();
		echo 'Password updated!';
	}

	//close statement
	$resultPswd->close();

	//close connection
	$conn->close();


	?>
