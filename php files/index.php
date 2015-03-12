<?php
	session_start();
	if(!isset($_SESSION['login_user'])){
		header("location: loginPage.php");
	}
	$login_user=$_SESSION['login_user'];
?>

<!DOCTYPE html>
<html>
<head lang="en">
  <title>Home</title>
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
        <li role="presentation" class="active"><a href="#">Home</a></li>
        <li role="presentation"><a href="profile.php">Profile</a></li>
        <li role="presentation"><a href="submission.php">Submission</a></li>
        <li role="presentation"><a href="mygroup_assessment.php">My Assessment</a></li>
        <li role="presentation"><a href="review.php">Review</a></li>
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
<div class="container">

  <?php

        //report any error
  error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
  include 'db_connect.php';

        //check value is set or not
  if (isset($_POST['GroupNo'])) {
    $GroupNo = $_POST['GroupNo'];
  }

  $GroupNo = 4; /*this cannot be a fixed number. it has to get data from session.*/

      //query statements
  $queryStudent  = "SELECT FirstName, LastName, Email FROM `student` WHERE GroupNo = ?";
  $queryAssessment = "SELECT `AssessmentNo`, `Report_to_Assess`FROM `assessment` WHERE `GroupNo` = ?";

  if ($stmtStudent = $conn->prepare($queryStudent)) {
    $stmtStudent->bind_param('i', $GroupNo);
    $stmtStudent->execute();
    $stmtStudent->store_result();
    $stmtStudent->bind_result($FirstName, $LastName, $Email);

    echo '<div class="table-responsive"><table class ="table table-nonfluid"><tr><th>Name</th><th>Email Address</th></tr>';
    echo '<div class="page-header"><h1>Group '.$GroupNo.'</h1></div>';
    echo '<p><b>Team Members:</b></p>';

    while ($stmtStudent->fetch()) {
      echo '<tr>';
      echo '<td>'.$FirstName.' '.$LastName.'</td>';
      echo '<td>'.$Email.'</td>';
      echo '</tr>';
    }
    echo '</table></div>';
  }

        //close statement
  $stmtStudent->close();


  echo '<br>Peer assessment. Reports to be reviewed:<br>';

  if ($stmtAssessment = $conn->prepare($queryAssessment)) {
    $stmtAssessment->bind_param('i', $GroupNo);
    $stmtAssessment->execute();
    $stmtAssessment->store_result();
    $stmtAssessment->bind_result($AssessmentNo, $Report_to_Assess);

    echo '<div class="table-responsive"><table class ="table table-nonfluid"><tr><th>AssessmentNo</th><th>ReportNo</th><th>Discussion Thread</th></tr>';
    echo '<div class="h1">'.$AssessmentNo.'</div>';

    while ($stmtAssessment->fetch()) {

      echo '<tr>';
      echo '<td>ASNo_'.$AssessmentNo.'</td>';
      echo '<td><a href="#">Report '.$Report_to_Assess.'</a></td>';
      echo '<td><a href="#">Link</a></td>';
      echo '</tr>';
    }
    echo '</table></div>';
  }

      //close statement
  $stmtAssessment->close();

      //close db connection
  $conn->close();

  ?>

  <div class="page-title">Ranking</div>
  <?php

  //report any error
  error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
  include 'db_connect.php';

        //check value is set or not
  if (isset($_POST['GroupNo'])) {
    $GroupNo = $_POST['GroupNo'];
  }

  $GroupNo = 4;
  //$query1 = "SET @rownum := 0";
  $query2 = "SELECT GroupNo, rank, AverageScore FROM (
                    SELECT @rownum := @rownum + 1 AS rank, AverageScore, GroupNo
                    FROM `group` 
    CROSS JOIN (SELECT @rownum := 0) c
    ORDER BY AverageScore DESC
                    ) as result WHERE GroupNo = ?";

 // if($stmt = $conn->prepare($query1)) {


    if ($stmt = $conn->prepare($query2)) {
      $stmt->bind_param('i', $GroupNo);
      $stmt->execute();
      $stmt->bind_result($GroupNo, $rank, $AverageScore);
      $stmt->fetch();

      echo 'Your group is ranked<button type="button" disabled class="btn btn-lg" style="margin:0 0 15px 15px"><b> ' .$rank. '</b></button>';
 //   }
  }
  $stmt -> close();
  $conn -> close();
  ?>

</div><!-- end of container -->

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