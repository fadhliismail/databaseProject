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
				<a class="navbar-brand" href="#">Virtual Learning</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li role="presentation"><a href="index.php">Home</a></li>
					<li role="presentation"><a href="profile.php">Profile</a></li>
					<li role="presentation"><a href="submission.php">Submission</a></li>
					<li role="presentation"><a href="mygroup_assessment.php">My Assessment</a></li>
					<li role="presentation" class="active"><a href="review.php">Review</a></li>
					<li role="presentation"><a href="#discussion.php">Discussion</a></li>
					<li role="presentation"><a href="help.php">Help</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="registerPage.php">Register</a></li>
					<li><a href="loginPage.php">Log In</a></li>
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<!-- content page -->
	<div class="container"><div class="page-header"><h1>Review Page</h1></div>

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
<form action="scoreupdate.php" method="post"> 
	<!-- content page -->
	<?php   
        //report any error
	error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	include 'db_connect.php';
        ?>
<div class="container">
	<p>Welcome <?php print $login_user ?> of group <?php print $GroupNo ?>!</p>
	<p>Your group report will be assessed by your peers based on the following criteria:</p>	
	<div class="table-responsive">
		<table class ="table table-nonfluid">
			<tr>
				<th>Assessment Number</th>
				<th>Detail of report</th>
				<th>Discussion thread</th>

			</tr>
			<tr>
                                <?php
                                //extrace Report_To_Assess
                                //querystatement
                                $queryReportToAssess = "SELECT  `Report_to_Assess`,`AssessmentNo` FROM `assessment` WHERE `GroupNo` = ?";                           
                                if($stmtReportToAssess = $conn->prepare($queryReportToAssess)){
                                    $stmtReportToAssess->bind_param('i', $GroupNo);
                                    $stmtReportToAssess->execute();
                                    $stmtReportToAssess->store_result();
                                    $stmtReportToAssess->bind_result($Report_To_Assess,$AssessmentNo);
                                    
                                    while($stmtReportToAssess->fetch()){  
                                        echo '<td>'.$AssessmentNo.'</td>';
                                        echo '<td><a href="view_report.php?id='.$AssessmentNo.'">Reportpage_'.$Report_To_Assess.'</a> </td>';
                                                                      
                                        echo '<td>';
					echo '<a href="forum.php">DiscussionForum</a>';
                                        echo '</td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                    }
                                }
                                ?>                                     				
			</tr>
		</table>
	</div>
	<div class = "page-title">Summary</div>
	<p>These are the marks given by your peers who assessed your report:</p>

</form> 
<!-- dynamic content will be here -->
<!-- just a header label -->
</body>
</html>



