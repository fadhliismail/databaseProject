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
	<title>Manage Group</title>

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
		<div class="page-header"><h1>Manage Student Group</h1></div>
		<p>Below is a list of student names. You can key in the number of groups you wish to make. You can drag the student name into the the container group to assign the group to the student.</p>
		<div class="page-title">Assign Students to Group</div>
		
		<!-- Show number of students -->
		<?php

        //student any error
		error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
		include 'db_connect.php';

		$queryStudent = "SELECT COUNT(*) AS `countstudents` FROM users; ";

		if($stmt=$conn->prepare($queryStudent)) {
			$stmt->execute();
			$stmt->bind_result($countstudents);
			$stmt->fetch();

			echo 'The course has <b>' .$countstudents. ' </b>students.<br>';
		}

		$stmt->close();
		$conn->close();

		?>

		<!-- alert if input is empty -->
		<script>
			function validateForm() {
				var x = document.forms["groupform"]["counts"].value;
				if (x == null || x == "") {
					alert("Enter the number of groups you want to create.");
					return false;
				}
			}
		</script>

		<p>Enter the number of groups you want to create.</p>
		<form name="groupform" action="show_groups.php" method="post" onsubmit="return validateForm()">
			<div class="col-lg-3"><input type="text" class="form-control" name="counts" placeholder="e.g 12"></div>
			<input type="Submit" class="btn btn-default" name="Submit" value="Submit">
		</form>
		<br>
		<p>OR</p>
		View the groups that have been created

		<!-- Show groups that have been created -->
		<?php

        //show any error
		error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
		include 'db_connect.php';
		$querygroup = "SELECT COUNT(DISTINCT GroupNo) AS `countgroup` FROM users WHERE `GroupNo` !=0";

		
		$stmt=$conn->prepare($querygroup);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($countgroup);
		$stmt->fetch();

		echo '<script>function alertFunction() {
			var x = <?php echo $countgroup ?>;
			if (x = 0) {
				alert("You have not created any group yet!");
				return false;
			}
		}
	</script>';
	/*} else {*/

		echo '<a href ="show_groups.php?countgroup=' .$countgroup. '" class="btn btn-info btn-default" aria-label="Left Align" onclick="return alertFunction()">
		<span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span> Show me</a>';
		/*}*/
		
		$stmt->close();
		$conn->close();

		?>	

	</div>

	<!-- footer -->
	<?php include 'footer.php'; ?>

</body>
</html>