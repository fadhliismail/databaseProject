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
		<title>Student Assessment</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Custom CSS -->
		<link rel ="stylesheet" type="text/css" href="css/mystyle.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Custom styles for this template -->
		<link href="sticky-footer-navbar.css" rel="stylesheet">
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
						<li role="presentation"><a href="admin.php">Admin</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="manage_group.php">Manage Group</a></li>
								<li><a href="manage_student.php">Manage Student</a></li>
								<li><a href="manage_assessment.php">Manage Assessment</a></li>
							</ul>
						</li>
						<li role="presentation" class="active"><a href="student_assessment.php">Student Assessment</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		<!-- content page -->
		<div class="container">

			<div class="page-header"><h1>Summary</h1></div>
			<p>Below is the ranking list for each group based on their average score.</p>

			<?php

		//report any error
			error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

		//connect to database
			include 'db_connect.php';

			$query = "SELECT GroupNo, AverageScore, Rank FROM
			(SELECT GroupNo, AverageScore,
				@curr_rank := IF(@prev_rank = AverageScore, @curr_rank, @incr_rank) AS Rank, 
				@incr_rank := @incr_rank + 1, 
				@prev_rank := AverageScore
				FROM `group` AS g, (
					SELECT @curr_rank :=0, @prev_rank := NULL, @incr_rank := 1
				) AS r 
	ORDER BY AverageScore DESC) AS s";

	if ($stmt = $conn->prepare($query)) {
		$stmt->execute();
	//$resultrow = $stmt->get_result();
	//$stmt->store_result();
		$stmt->bind_result($GroupNo, $AverageScore, $rank);

		echo '<div class="table-responsive"><table class ="table table-nonfluid"><tr><th>Rank</th><th>Group</th><th>Average Score</th>';	

		while ($stmt->fetch()) {
			echo '<tr>';
			echo '<td>' .$rank. '</td>';
			echo '<td>Group ' .$GroupNo. '</td>';
			echo '<td>' .$AverageScore. '</td></tr>';
		}

		echo '</table></div>';
	}

// Close statement
	$stmt->close();

// Close connection
	$conn->close();

	?>

</div>

<!-- footer -->
<?php include 'footer.php'; ?>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>