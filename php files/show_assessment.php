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
	<title>Manage Assessment</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/group.css">
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
							<li><a href="manage_group.php">Manage Group</a></li>
							<li><a href="manage_student.php">Manage Student</a></li>
							<li><a href="manage_assessment.php" class="active">Manage Assessment</a></li>

						</ul>
					</li>
					<li><a href="student_assessment.php">Analysis</a></li>
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
		<p>Below is a list of student names & the groups. You can drag the student name into the the container group to assign the group to the student.</p>
		<div class="page-title">Assign Students to Group</div>

		<!-- show group assessments distribution -->
		<?php

        //student any error
		error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
		include 'db_connect.php';

		/*Calculate number of existing groups*/
		$querygroup = "SELECT COUNT(DISTINCT GroupNo) AS `countgroup` FROM student WHERE `GroupNo` !=0";

		if($stmt=$conn->prepare($querygroup)) {
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($countgroup);
			$stmt->fetch();

			echo 'The course currently has <b>' .$countgroup. ' </b>groups.<br>';
			
		}

		$stmt->close();
		if(isset($_POST['Submit'])){
			$assessmentcount = $_POST['assessmentcount']; //number of groups to be assessed by each group
		}

		/*Insert dummies into assessment table*/
		for($y=1;$y<=$countgroup;$y++){ //total existing groups
			
			$queryassessment ="INSERT INTO `assessment`(`Assessor`, `Group_to_Assess`) VALUES (?,?)";

			if($stmt2=$conn->prepare($queryassessment)) {
				$stmt2->bind_param('ii', $y, $y);

				for ($i=0;$i<$assessmentcount;$i++){ //loops according to number of groups to be assessed by each group
					$stmt2->execute();
				}
			}
			$stmt2->close();
		}

		/*Shuffle the Group_to_Assess column*/
		$query = "SELECT `Group_to_Assess` FROM `assessment` ORDER BY `Group_to_Assess`";
		$stmt3=$conn->prepare($query);
		$stmt3->execute();
		$stmt3->bind_result($Group_to_Assess);
		$row=$stmt3->num_rows; //return number of rows

		for($i=1;$i<=$row;$i++) { //for each assessor = $i, set group_to_assess = 
			$queryShuffle = "UPDATE `assessment` SET `Group_to_Assess`=' .$row['rand($row)']. ' WHERE =`Assessor`=$i";
			$stmt4=$conn->prepare($queryShuffle);
			$stmt4->execute();
		}

		//$stmt4->close();
		$conn->close();

		?>

	</div>

	<!-- footer -->
	<?php include 'footer.php'; ?>


</body>
</html>