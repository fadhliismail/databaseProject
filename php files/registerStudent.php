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
		$GroupNo = $_POST['GroupNo'];
		
		$StudentId = stripslashes($StudentId);
		$User_pass = stripslashes($User_pass);
		$StudentId = mysqli_real_escape_string($conn, $StudentId);
		$User_pass = mysqli_real_escape_string($conn, $User_pass);
		
		$User_pass = SHA1($User_pass);
		
		$query = "INSERT INTO student (FirstName, LastName, Email, User_pass, StudentId, GroupNo)".
				"VALUES ('${firstName}', '${lastName}', '${emailAddress}', '${User_pass}', ${StudentId}','${GroupNo}')";
		$result = mysqli_query($conn, $query)
			or die('Error saving to database.' . mysql_error());
		mysqli_close($conn);

	}
}



/* function isDataValid(){
	$errorMessage = null;
	if(isset($_POST['Submit'])){
		if(!isset($_POST['firstName']) or trim($_POST['firstName']) = '')
			errorMessage = 'You must enter your first name';
		else if(!isset($_POST['lastName']) or trim($_POST['lastName']) = '')
			errorMessage = 'You have to enter your last name';
		else if(!isset($_POST['emailAddress']) or trim($_POST['emailAddress']) = '')
			errorMessage = 'Please enter your student email';
		else if(!isset($_POST['user_Pass']) or trim($_POST['user_Pass']) = '')
			errorMessage = 'You need to specify your password';
		else if(!isset($_POST['studentId']) or trim($_POST['studentId']) = '')
			errorMessage = 'Please specify your student ID';
		else if(!isset($_POST['groupNo']) or trim($_POST['groupNo']) = '')
			errorMessage = 'Please specify your Group Number';
		if($errorMessage !== null){
			echo <<<EOM
			<p>Error: $errorMessage</p>
EOM;
			return False;
		}
		return True;
	
	}
}

function getUser(){
	$user = array();
	$user['firstName'] = $_POST['firstName'];
	$user['lastName'] = $_POST['lastName'];
	$user['emailAddress'] = $_POST['emailAddress'];
	$user['user_Pass'] = SHA($_POST['user_Pass']);
	$user['studentId'] = $_POST['studentId'];
	$user['groupNo'] = $_POST['groupNo'];
	return $user;
}

function saveToDatabase($user){
	
	$query = "INSERT INTO student (FirstName, LastName, Email, User_pass, StudentId, GroupNo)".
				"VALUES ('${user['firstName']}', '${user['lastName']}', '${user['emailAddress']}', '${user['user_Pass']'}, '${user['StudentId']}','${user['groupNo']}')";
	$result = mysqli_query($conn, $query)
	or die('Error making saveToDatabase query.' . mysql_error());
	mysqli_close($conn);
}

if(isDataValid()){
	$newUser = getUser();
	saveToDatabase($newUser);
} */
?>