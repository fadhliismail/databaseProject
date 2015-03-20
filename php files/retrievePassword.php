<?php
	session_start();

        //report any error
	error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
	include 'db_connect.php';

	if(isset($_POST['Submit'])) {
		
		//php simple validation if html5 validation is not working
		if(empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['StudentId'])) {
			die ('Please enter your First Name, Last Name and StudentId');
		}
		else {
			
			$first_Name = $_POST['firstName'];
			$last_Name = $_POST['lastName'];
			$StudentId = $_POST['StudentId'];
				
			//query statements to get FirstName, LastName, Email, and User_pass					
			$queryPassword  = "SELECT User_pass, FirstName, LastName, Email
									FROM student
										WHERE StudentId = ?";

			if ($resultPswd = $conn->prepare($queryPassword)) {
				$resultPswd->bind_param('s', $StudentId);
				$resultPswd->execute();
				$resultPswd->store_result();
				$resultPswd->bind_result($User_pass_hash, $FirstName, $LastName, $Email);
				$resultPswd->fetch();	
				
				//check whether query return any result, check user exist or not
				if ($resultPswd->num_rows){
					
					if ($first_Name != $FirstName OR $last_Name != $LastName) {
						//die("The name does not match.");
						echo "<script type='text/javascript'>";
						echo "alert('The name First Name or Last Name does not match.');";
						echo "</script>";
						header("Refresh: 1; url= retrievePasswordPage.php");

					}
					else{
						//function to generate random password for forgotten password
						function generate_random_password($length) {
						$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
						$clen = strlen($chars) - 1;
						$nonascii = 8;
						$password = '';
							for($i = 0;$i < $length;$i++) 
								$password .= $chars[mt_rand(0,($i & 5 ? $nonascii : $clen))];
						return $password;
						}
						
						//generate random password
						$New_Pswd = generate_random_password(8);
	
						//hashing random password to be entered into database
						$New_Pswd_Hash = password_hash($New_Pswd, PASSWORD_DEFAULT);
						
						//query for updating New_Pswd_Hash into database
						$queryNewPswd = "UPDATE student
											SET User_pass= ?
												WHERE StudentId = ?";
						
						if ($statement = $conn->prepare($queryNewPswd)){
							$statement->bind_param('ss', $New_Pswd_Hash, $StudentId);
							$statement->execute();
							
							//using PHPMailer to send email to student with student's email in database
							require 'PHPMailer-master/PHPMailerAutoload.php';
							$mail = new PHPMailer;
							//$mail->SMTPDebug = 3;                               // Enable verbose debug output

							$mail->isSMTP();                                      // Set mailer to use SMTP
							$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
							$mail->SMTPAuth = true;                               // Enable SMTP authentication
							$mail->Username = 'virtuallearningg24@gmail.com';                 // SMTP username
							$mail->Password = 't1e2s3t4';                           // SMTP password
							$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
							$mail->Port = 587;                                    // TCP port to connect to

							$mail->From = 'virtuallearningg24@gmail.com';
							$mail->FromName = 'Fadhli Ismail';
							$mail->addAddress($Email, $FirstName .' '. $LastName);     // Add a recipient
							//$mail->addAddress('ellen@example.com');               // Name is optional
							//$mail->addReplyTo('info@example.com', 'Information');
							//$mail->addCC('cc@example.com');
							//$mail->addBCC('bcc@example.com');

							//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
							//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
							//$mail->isHTML(true);                                  // Set email format to HTML

							$mail->Subject = 'Temporary Password';
							$mail->Body    = 'Your temporary password for your account at Virtual Learning is '. $New_Pswd .'.' .
										' Please change your password to avoid confusion in the future.';
							$mail->AltBody = 'Your temporary password for your account at Virtual Learning is '. $New_Pswd .'.' .
										' Please change your password to avoid confusion in the future.';

							if(!$mail->send()) {
								//echo 'Message could not be sent.';
								//echo 'Mailer Error: ' . $mail->ErrorInfo;
								echo "<script type='text/javascript'>";
								echo "alert('Email cannot be sent. Please try again.');";
								echo "</script>";
								header("Refresh: 1; url= retrievePasswordPage.php");
							}
							else {
								//echo 'Message has been sent';
								echo "<script type='text/javascript'>";
								echo "alert('An email containing the temporary password for your account has been sent to your email.');";
								echo "</script>";
								header("Refresh: 1; url= retrievePasswordPage.php");
							}
						}
						
					}
					
				}
				else {
					//echo "Error: " . $queryNewPswd. "<br>" . mysqli_error($conn);
					echo "<script type='text/javascript'>";
					echo "alert('You have not appeared to be registered. Please register first to be able to access this website.');";
					echo "</script>";
					header("Refresh: 1; url= registerPage.php");
				}
					
				
			}
			
		}
	}
	mysqli_close($conn);
?>
