  <?php
  session_start();
  if(!isset($_SESSION['login_user'])){
    header("location: loginPage.php");
  }
  $login_user=$_SESSION['login_user'];
  $GroupNo=$_SESSION['GroupNo'];
  $firstName=$_SESSION['firstName'];
  $lastName=$_SESSION['lastName'];
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
					<li role="presentation"><a href="#discussion.php">Discussion</a></li>
					<li role="presentation"><a href="help.php">Help</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<!-- content page -->
	<div class="container">
		
		<?php
		
		//report any error
		error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		
		include 'db_connect.php';
		
		$response = array();
		// $id is assessmentNo
		$AssessmentNo = $_GET['id']; /*this cannot be a fixed number. it has to get data from session.*/

		for($j = 1; $j<6 ; $j++){
			$comment = 'comment'.$j;
			$$comment = filter_input(INPUT_POST, $comment);
			$criteria = 'c'.$j;
			$$criteria = filter_input(INPUT_POST, $criteria);
			
			$queryUpdate = "UPDATE `score` SET `Comment`= '".$$comment."',`Score_Criteria`= '".$$criteria."' WHERE `AssessmentNo` = '".$AssessmentNo."' AND `CriteriaNo`=$j";
			if ($stmtUpdate = $conn->prepare($queryUpdate)) {
				$stmtUpdate->execute();
				$stmtUpdate->store_result();
			}
		}
        //query statement
		$queryTime = "UPDATE `report` SET `Submission_Timestamp`= NOW(),`Submission_Updated`= NOW() WHERE `GroupNo`=?";
		$queryScore = "SELECT `CriteriaNo`, `Comment`,`Score_Criteria`FROM `score` WHERE `AssessmentNo` = ?";
		
        // Update timestamp 
		if ($stmtTimeUpdate = $conn->prepare($queryTime)) {
                        $stmtTimeUpdate->bind_param('i', $GroupNo);
			$stmtTimeUpdate->execute();
			$stmtTimeUpdate->store_result();
		}

        // Show what this script did
		if ($stmtScore = $conn->prepare($queryScore)) {
			$stmtScore->bind_param('i', $AssessmentNo);
			$stmtScore->execute();
			$stmtScore->store_result();
			$stmtScore->bind_result($CriteriaNo, $Comment,$Score_Criteria);
			
			echo '<div class="table-responsive"><table class ="table table-nonfluid"><tr><th>CriteriaNo</th><th>Comment</th><th>Score_Criteria</th></tr>';
			echo '<div class="page-header"><h1>You are assessing Assessment No. '.$AssessmentNo.'</h1></div>';
			echo '<p><b>Below is the score & comment you have made:</b></p>';

			while ($stmtScore->fetch()) {
				echo '<tr>';
				echo '<td>'.$CriteriaNo.'</td><td>'.$Comment.'</td><td>'.$Score_Criteria.'</td>';
				echo '</tr>';
			}
			echo '</table></div>';
		}

		/*Calculate score received for each assessment*/
		$calc_score  = "UPDATE `assessment` SET `Score`= (SELECT SUM(Score_Criteria) as OverallScore FROM score WHERE AssessmentNo = ?) WHERE AssessmentNo = ?";
		if ($stmtCalc = $conn->prepare($calc_score)) {
			$stmtCalc->bind_param('ii', $AssessmentNo,$AssessmentNo);
			$stmtCalc->execute();
			$stmtCalc->store_result();
		}

		/*Find group according to assessmentno*/
		$find_group  = "SELECT `Group_to_Assess` FROM `assessment` WHERE `AssessmentNo` = ?";
		if ($stmtFind = $conn->prepare($find_group)) {
			$stmtFind->bind_param('i', $AssessmentNo);
			$stmtFind->execute();
			$stmtFind->store_result();
		}

		/*Calculate average score received by each group*/
		$calc_average  = "UPDATE `group` SET `AverageScore`=(SELECT ROUND(((SUM(`Score`))/3)*2) AS AverageScore FROM assessment WHERE Group_to_Assess = ?) WHERE `GroupNo` = ?";
		if ($stmtAve = $conn->prepare($calc_average)) {
			$stmtAve->bind_param('ii', $GroupNo,$GroupNo);
			$stmtAve->execute();
			$stmtAve->store_result();
		}

		$stmtAve->close();
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





