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
				<a class="navbar-brand" href="home.php">Virtual Learning</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li role="presentation"><a href="home.php">Home</a></li>
					<li role="presentation"><a href="profile.php">Profile</a></li>
					<li role="presentation"><a href="submission.php">Submission</a></li>
					<li role="presentation" class="active"><a href="mygroup_assessment.php">My Assessment</a></li>
					<li role="presentation"><a href="review.php">Review</a></li>
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
	<div class="container">
		<div class="page-header"><h1>Your group assessment</h1></div>
		<p>Your group report will be assessed by your peers based on the following criteria:</p>
		<p>Welcome <?php print $login_user ?> of group <?php print $GroupNo ?>!</p>	
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
		<div class = "page-title">Summary</div>

		<!-- Show marks given to group by peers -->
		<?php

        //report any error
		error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
		include 'db_connect.php';

        //check value is set or not
		if (isset($_POST['GroupNo'])) {
			$GroupNo = $_POST['GroupNo'];
		}

		$Group_to_Assess = $GroupNo;

		//calculate overall score for each assessment and find the average
		$queryAssessment  = "SELECT score.AssessmentNo, SUM(score.Score_Criteria) as OverallScore, ROUND(SUM((score.Score_Criteria/3)*2)) AS AverageScore
		FROM score
		INNER JOIN assessment
		ON assessment.AssessmentNo = score.AssessmentNo
		WHERE assessment.Group_to_Assess = ?
		GROUP BY assessment.AssessmentNo";

		//show comment & score received for each criteria
		$queryCriteria  = "SELECT score.CriteriaNo, score.Comment, score.Score_Criteria
		FROM score
		INNER JOIN assessment
		ON assessment.AssessmentNo = score.AssessmentNo
		WHERE assessment.AssessmentNo = ? ";

		/*Calculate final score*/
		$finalscore ="";
		$stmtAssessment = $conn->prepare($queryAssessment);

		if ($Group_to_Assess != 0) {			
			$stmtAssessment->bind_param('i', $Group_to_Assess);
			$stmtAssessment->execute();
			$stmtAssessment->store_result();
			$stmtAssessment->bind_result($AssessmentNo, $OverallScore, $AverageScore);

			echo '<p>These are the marks given by your peers who assessed your report:</p>';
			echo '<div class="table-responsive"><table class ="table table-nonfluid"><tr><th>Assessment No</th><th>Overall Score</th><th>Score</th><th>Criteria</th><th>Comment</th></tr>';
			
			//fetch values by looping through each row
			while ($stmtAssessment->fetch()) {
				echo '<tr>';
				echo '<td rowspan ="5" style="white-space:nowrap;">ASNo_'.$AssessmentNo.'</td>';
				echo '<td rowspan ="5">'.$OverallScore.'/50</td>';

				$stmtCriteria = $conn->prepare($queryCriteria);
				$stmtCriteria->bind_param('i', $AssessmentNo);
				$stmtCriteria->execute();
				$resultrow = $stmtCriteria->get_result();
				$stmtCriteria->store_result();
				$stmtCriteria->bind_result($CriteriaNo, $Comment, $Score_Criteria);

				$td = array();
				foreach ($resultrow as $row) {
					$td[] = 
					'<td>' .$row['Score_Criteria']. '/10</td>
					<td style="white-space:nowrap;">Criteria '.$row['CriteriaNo'].'</td>
					<td>' .$row['Comment']. '</td></tr>';

				}
				echo implode("", $td);
				$finalscore += $AverageScore;
				
			}
			echo 'Your group received a mark of<button type="button" disabled class="btn btn-lg" style="margin:0 0 15px 15px"><b> ' .$finalscore. '/100</b></button>';

			echo '</table></div>';
		} else {
			echo 'No peer assessment has been made yet.';
		}

    	//close statement
		$stmtAssessment->close();

    	//close db connection
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

<html>