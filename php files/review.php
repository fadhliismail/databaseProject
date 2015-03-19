<?php
session_start();
if(!isset($_SESSION['login_user'])){
	header("location: loginPage.php");
}
$login_user=$_SESSION['login_user'];
$GroupNo=$_SESSION['GroupNo'];
?>

<!DOCTYPE html>
<html>
<head lang="en">
	<title>Review</title>

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
				<a class="navbar-brand" href="home.php">Virtual Learning</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li role="presentation"><a href="home.php">Home</a></li>
					<li role="presentation"><a href="profile.php">Profile</a></li>
					<li role="presentation"><a href="submission.php">Submission</a></li>
					<li role="presentation"><a href="mygroup_assessment.php">My Assessment</a></li>
					<li role="presentation" class="active"><a href="review.php">Review</a></li>
					<li role="presentation"><a href="discussion.php">Discussion</a></li>
					<li role="presentation"><a href="help.php">Help</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<!-- content page -->
	<div class="container"><div class="page-header"><h1>Review Page</h1></div>

</div>


<!-- content page -->
<div class="container">

	<?php

        //report any error
	error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	include 'db_connect.php';
	
	$Assessor = $GroupNo;

	$queryReportToAssess = "SELECT  `Group_to_Assess`,`AssessmentNo` FROM `assessment` WHERE `Assessor` = ?";    

	$stmtReportToAssess = $conn->prepare($queryReportToAssess);                  
	if($Assessor !=0){
		$stmtReportToAssess->bind_param('i', $Assessor);
		$stmtReportToAssess->execute();
		$stmtReportToAssess->store_result();
		$stmtReportToAssess->bind_result($Group_to_Assess,$AssessmentNo);

		echo '	<div class="table-responsive">
		<table class ="table table-nonfluid">
			<tr>
				<th>Assessment Number</th>
				<th>Discussion thread</th>
			</tr>
			';

			echo '<p>You have to 3 reports written by your peers. Click the link below to view the report. You may discuss with your team members on the respective forum below.</p>';

			while($stmtReportToAssess->fetch()){  
				echo '<tr>';
				echo '<td><a href="view_report.php?id='.$AssessmentNo.'">ASNo_'.$AssessmentNo.'</a></td>';                                                              
				echo '<td><a href="discussionTitle.php?id='.$AssessmentNo.'">Discussion Forum_'.$AssessmentNo.'</a></td>';
				echo '</tr>';
			}

			echo '';
		} else {
			echo 'You have no reports yet to assess.';					
		}
		$stmtReportToAssess->close();
		$conn->close();
		?>                                     				
	</table>
</div>
</div>

<!-- footer -->
<?php include 'footer.php' ?>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>



