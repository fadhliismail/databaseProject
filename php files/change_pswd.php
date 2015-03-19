<?php
session_start();
$login_user=$_SESSION['login_user'];
$GroupNo=$_SESSION['GroupNo'];


        //report any error
	error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
	include 'db_connect.php';

	if (isset($_POST['Submit'])) {
		
		if(empty($_POST['CurrentPswd']) || empty($_POST['NewPswd']) || empty($_POST['ConfirmPswd'])) {
			die ('Please enter your current password and your new password');
		
		}
		else{
			$Current_Pswd = $_POST['CurrentPswd'];
			$New_Pswd = $_POST['NewPswd'];
			$Confirm_Pswd = $_POST['ConfirmPswd'];
			
			$StudentId = $login_user; /*this cannot be a fixed number. it has to get data from session.*/
			
			//query statements					
			$queryPassword  = "SELECT User_pass
								FROM student
									WHERE StudentId = ?";
			
			
			if ($resultPswd = $conn->prepare($queryPassword)) {
				$resultPswd->bind_param('s', $StudentId);
				$resultPswd->execute();
				$resultPswd->store_result();
				$resultPswd->bind_result($User_pass_hash);
				$resultPswd->fetch();	
		
				$Current_Pswd = password_verify($Current_Pswd, $User_pass_hash);
				
				/*Check that the current password is the same as keyed in*/
				if (!$Current_Pswd) {
					//die("The password is not the same.");
					echo "<script type='text/javascript'>";
					echo "alert('The password is not in the database.');";
					echo "</script>";
					header("Refresh: 1; url=profile.php");

				}
				//check the new password and confirm new password is the same
				elseif($New_Pswd != $Confirm_Pswd) {
					//die("The new password doesn't match.");
					echo "<script type='text/javascript'>";
					echo "alert('The new password does not match.');";
					echo "</script>";
					header("Refresh: 1; url=profile.php");
				}
				else{
					$New_Pswd_hash = password_hash($New_Pswd, PASSWORD_DEFAULT);
					
					$queryNewPswd = "UPDATE student
						SET User_pass= '$New_Pswd_hash'
							WHERE StudentId = $StudentId";
							
					$result = mysqli_query($conn, $queryNewPswd);
					
					if($result){
						//echo "New record created.";
						echo "<script type='text/javascript'>";
						echo "alert('The password has been successfully changed.');";
						echo "</script>";
						header("Refresh: 1; url=profile.php");
					}
					else {
						//echo "Error: " . $queryNewPswd. "<br>" . mysqli_error($conn);
						echo "<script type='text/javascript'>";
						echo "alert('The password change is unsuccessful. Please try again.');";
						echo "</script>";
						header("Refresh: 1; url=profile.php");
					}
					
				}
				
			}
			else{
				echo "<script type='text/javascript'>";
				echo "alert('There is a problem retrieving the database. Please try again.');";
				echo "</script>";
				header("Refresh: 1; url=profile.php");
			}
		}
	

	}
	mysqli_close($conn);

	?>
