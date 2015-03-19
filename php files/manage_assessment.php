	<?php
	session_start();
	if(!isset($_SESSION['login_user'])){
		header("location: loginPage.php");
	}
	$login_user=$_SESSION['login_user'];
	$firstName=$_SESSION['firstName'];
	$lastName=$_SESSION['lastName'];
	?>

<!DOCTYPE html>
<html>
<head lang="en">
	<title>Manage Assessment</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Custom CSS -->
	<link rel ="stylesheet" type="text/css" href="css/mystyle.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- drag n drop CSS -->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
	
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>	
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
	<!-- JavaScript: Connect multi lists of groups -->
	<script src="js/multi-list-connect.js"></script>

</head>

<body>
	<!-- navigation bar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Virtual Learning</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="admin.php">Admin</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="manage_group.php" class="active">Manage Group</a></li>
							<li><a href="manage_student.php">Manage Student</a></li>
							<li><a href="manage_assessment.php">Manage Assessment</a></li>
						</ul>
					</li>
					<li><a href="student_assessment.php">Student Assessment</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<!-- content page -->
	<div class="container">
		<div class="page-header"><h1>Manage Assessment</h1></div>
		<p>This is where you assign groups to be assessed by each group.</p> 
		<div id="err1" class="alert alert-info" role="alert" aria-label="Left Align">Before you do this, please make sure that you've assigned groups to the students.</div>
		<div class="page-title">Assign Groups for Assessment</div>

		<!-- Show existing groups for the course -->
		<?php

        //show any error
		error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
		include 'db_connect.php';
		$querygroup = "SELECT COUNT(DISTINCT GroupNo) AS `countgroup` FROM users WHERE `GroupNo` !=0";

		if($stmt=$conn->prepare($querygroup)) {
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($countgroup);
			$stmt->fetch();

			echo 'The course currently has <b>' .$countgroup. ' </b>groups.<br>';
			
		}

		$stmt->close();
		$conn->close();

		?>
		
		<!-- alert if input is empty -->
		<script>
			function validateForm() {
				var x = document.forms["assessmentform"]["assessmentcount"].value;
				if (x == null || x == "" || x==0) {
					alert("Enter the number of groups each group should assess.");
					return false;
				}
			}
		</script>

		<form name="assessmentform" class="form-inline" action="show_assessment.php" method="post" onsubmit="return validateForm()">
			<div class="form-group">
				<label for="datainput">Enter the number of groups each group should assess</label>
				<input type="text" class="form-control" id ="datainput" name="assessmentcount" placeholder="e.g 2">
			</div>
			<input type="Submit" class="btn btn-default" name="Submit" value="Submit">
		</form>
		<br>
		<p>OR</p>
		View the assessments that have been assigned
		<!-- Show assessments that have been arranged -->
		<?php

        //show any error
		error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
		include 'db_connect.php';
		$querygroup = "SELECT COUNT(DISTINCT GroupNo) AS `countgroup` FROM users WHERE `GroupNo` !=0";

		if($stmt=$conn->prepare($querygroup)) {
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($countgroup);
			$stmt->fetch();

			echo '<a href ="show_assessment.php?countgroup=' .$countgroup. '" class="btn btn-info btn-default" aria-label="Left Align" onclick="return alertFunction()">
			<span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span> Show me</a>';

		}

		$stmt->close();
		$conn->close();

		?>	

	</div>

	<!-- footer -->
	<?php include 'footer.php'; ?>

</body>
</html>