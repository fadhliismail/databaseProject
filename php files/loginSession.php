<?php
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once('db_connect.php');

if(isset($_POST['Submit'])){
	
	//php simple validation if html5 validation is not working
	if(empty($_POST['Login_Id']) || empty($_POST['User_pass'])) {
		die ('Please enter your users ID and password');
		
	}
	else{
		//Define $Login_Id and $User_pass
		$Login_Id = $_POST['Login_Id'];
		$User_pass = $_POST['User_pass'];
		
		//
		$Login_Id = mysqli_real_escape_string($conn, $Login_Id);
		$User_password = mysqli_real_escape_string($conn, $User_pass);
			
		//query for getting GroupNo and User_pass from database
		$query = "SELECT GroupNo, User_pass, user_level, FirstName, LastName
					FROM users
						WHERE Login_Id = ?";
		
		//preparing query
		if($statement = $conn->prepare($query)){
			
			$statement->bind_param('s', $Login_Id);
			
			//execute statement
			$statement->execute();
			$statement->store_result();
			
			//bind result
			$statement->bind_result($GroupNo, $User_pass_hash, $user_level, $firstName, $lastName);
			$statement->fetch();
			
			//check if query return any result, if yes proceed
			if ($statement->num_rows){
					
				if (password_verify($User_password, $User_pass_hash)){
					if ($user_level === 'student'){
						session_start();
			
						$_SESSION['login_user']=$Login_Id;
						$_SESSION['user_level']=$user_level;
						$_SESSION['GroupNo']=$GroupNo;
						$_SESSION['firstName']=$firstName;
						$_SESSION['lastName']=$lastName;
						
						echo "student";
						header("Refresh: 1; url= home.php");
					
					}
					else {
						session_start();
			
						$_SESSION['login_user']=$Login_Id;
						$_SESSION['user_level']=$user_level;
						$_SESSION['firstName']=$firstName;
						$_SESSION['lastName']=$lastName;
						
						echo "Admin";
						header("Refresh: 1; url= admin.php");
						//header('Location: '. $indexURL); // Redirecting To Other Page
					}
				
				} else {
					echo 'Error: ' . $query. '<br>' . mysqli_error($conn);
					echo "<script type='text/javascript'>";
					echo "alert('The password and the User ID is not matched. Please try again.');";
					echo "</script>";
					header("Refresh: 1; url= loginPage.php");
				}
				
			}
			else{
				echo "<script type='text/javascript'>";
				echo "alert('Your details are not in the database. Have you registered?');";
				echo "</script>";
				header("Refresh: 1; url= registerPage.php");
			}
				
		}
	}
}
mysqli_close($conn); // Closing Connection 
?>