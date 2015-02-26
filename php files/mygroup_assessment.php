<!DOCTYPE html>
<html>
<head lang="en">
	<title>My Assessment</title>

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
					<li role="presentation"><a href="index.php">Home</a></li>
					<li role="presentation"><a href="profile.php">Profile</a></li>
					<li role="presentation"><a href="#submission.php">Submission</a></li>
					<li role="presentation" class="active"><a href="mygroup_assessment.php">My Assessment</a></li>
					<li role="presentation"><a href="#review.php">Review</a></li>
					<li role="presentation"><a href="#discussion.php">Discussion</a></li>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
          </li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="#logout">Log Out</a></li>
      </ul>
  </div><!--/.nav-collapse -->
</div>
</nav>

<!-- content page -->
<div class="container">
	<div class="page-header"><h1>Your group assessment</h1></div>
	<p>Your group report will be assessed based on the following criteria:</p>	
	<div class="table-responsive">
		<table class ="table table-nonfluid">
			<tr>
				<th>Criteria Number</th>
				<th>Description of Criteria</th>
			</tr>
			<tr>
				<td>Criteria 1</td>
				<td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </td>
			</tr>
			<tr>
				<td>Criteria 2</td>
				<td>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</td>
			</tr>
			<tr>
				<td>Criteria 3</td>
				<td>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</td>
			</tr>
			<tr>
				<td>Criteria 4</td>
				<td>Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</td>
			</tr>
			<tr>
				<td>Criteria 5</td>
				<td>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</td>
			</tr>
		</table>
	</div>
	<br>
	<p>These are the marks given by your peers who assessed your report:</p>
	<?php

        //report any error
	error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
	include 'db_connect.php';

        //check value is set or not
	if (isset($_POST['GroupNo'])) {
		$GroupNo = $_POST['GroupNo'];
	}

	$Report_To_Assess = 4; /*this cannot be a fixed number. it has to get data from session.*/

	//query statements
	$queryStudent  = "SELECT score.AssessmentNo, score.CriteriaNo, score.Comment, score.Score_Criteria
	FROM score
	INNER JOIN assessment
	ON assessment.AssessmentNo = score.AssessmentNo
	WHERE assessment.Report_To_Assess = ?";

	if ($stmtStudent = $conn->prepare($queryStudent)) {
		$stmtStudent->bind_param('i', $Report_To_Assess);
		$stmtStudent->execute();
		$stmtStudent->store_result();
		$stmtStudent->bind_result($AssessmentNo, $CriteriaNo, $Comment, $Score_Criteria);

		echo '<div class="table-responsive"><table class ="table table-nonfluid"><tr><th>Assessment No</th><th>Criteria</th><th>Comment</th><th>Score</th><th>Overall Score</th></tr>';

		while ($stmtStudent->fetch()) {
			echo '<tr>';
			echo '<td style="white-space:nowrap;">AssessmentNo '.$AssessmentNo.'</td>';
			echo '<td style="white-space:nowrap;">Criteria '.$CriteriaNo.'</td>';
			echo '<td>' .$Comment. '</td>';
			echo '<td>' .$Score_Criteria. '/10</td>';
			echo '<td>Overall score calculated</td>';
			echo '</tr>';
		}
		echo '</table></div>';
	}
      //close statement
	$stmtStudent->close();

      //close db connection
	$conn->close();

	?>

</div>

<!-- footer -->
<footer class="footer">
	<div class="container">
		<p class="text-muted">GC06 Database Project. Copyright © Team 24, UCL2015.</p>
	</div>
</footer>

<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

</body>

<html>