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
      <a class="navbar-brand" href="home.php">Virtual Learning</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li role="presentation" class="active"><a href="home.php">Home</a></li>
        <li role="presentation"><a href="profile.php">Profile</a></li>
        <li role="presentation"><a href="submission.php">Submission</a></li>
        <li role="presentation"><a href="mygroup_assessment.php">My Assessment</a></li>
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

  <!-- Show group members -->

  <?php

        //report any error
  error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
  include 'db_connect.php';

        //check value is set or not
  if (isset($_POST['GroupNo'])) {
    $GroupNo = $_POST['GroupNo'];
  }

      //query statements
  $queryStudent  = "SELECT FirstName, LastName, Email FROM `student` WHERE GroupNo = ?";

  $stmtStudent = $conn->prepare($queryStudent);

  if ($GroupNo != 0) {
    $stmtStudent->bind_param('i', $GroupNo);
    $stmtStudent->execute();
    $stmtStudent->store_result();
    $stmtStudent->bind_result($FirstName, $LastName, $Email);

    echo '<div class="page-header"><h1>Group '.$GroupNo.'</h1></div>';
    echo '<div class="table-responsive"><table class ="table table-nonfluid"><tr><th>Name</th><th>Email Address</th></tr>';   
    echo '<p><b>Team Members:</b></p>';

    while ($stmtStudent->fetch()) {
      echo '<tr>';
      echo '<td>'.$FirstName.' '.$LastName.'</td>';
      echo '<td>'.$Email.'</td>';
      echo '</tr>';
    }
    echo '</table></div>';
  } else {

    echo '<div class="page-header"><h1>Group '.$GroupNo.'</h1></div>';
    echo '<p>You have not been assigned any group yet.</p>';
  }

        //close statement
  $stmtStudent->close();

      //close db connection
  $conn->close();

  ?>

  <div class="page-title">Ranking</div>

  <!-- fetch group ranking -->
  <?php

  //report any error
  error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
  include 'db_connect.php';

        //check value is set or not
  if (isset($_POST['GroupNo'])) {
    $GroupNo = $_POST['GroupNo'];
  }

  $query2 = "SELECT GroupNo, rank, AverageScore FROM (
    SELECT @rownum := @rownum + 1 AS rank, AverageScore, GroupNo
    FROM `group` 
    CROSS JOIN (SELECT @rownum := 0) c
    ORDER BY AverageScore DESC
    ) AS result WHERE GroupNo = ?";

$stmt = $conn->prepare($query2);

if ($GroupNo != 0) {
  $stmt->bind_param('i', $GroupNo);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($GroupNo, $rank, $AverageScore);
  $stmt->fetch();

  echo 'Your group is ranked<button type="button" disabled class="btn btn-lg" style="margin:0 0 15px 15px"><b> ' .$rank. '</b>
</button> with average score of <button type="button" disabled class="btn btn-lg" style="margin:0 0 15px 15px"><b> ' .$AverageScore. '</b></button><br>';

} else {
  echo 'You group has not been assessed yet, therefore there is no rank available.';
}

$stmt->close();
$conn -> close();
?>

<!-- Show marks from groups that assess the group report -->
<?php
//report any error
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
include 'db_connect.php';
$queryAssessor = "SELECT `Assessor` FROM `assessment` WHERE `Group_to_Assess` = ?";

$stmt3=$conn->prepare($queryAssessor);

if ($GroupNo != 0) {
  $stmt3->bind_param('i', $GroupNo);
  $stmt3->execute();
  $stmt3->store_result();
  $stmt3->bind_result($Assessor);
  
  $queryOthers ="SELECT `AverageScore` FROM `group` WHERE `GroupNo` = ?"; 
  //=(SELECT ROUND(((SUM(`Score`))/3)*2) AS AverageScore FROM `assessment` WHERE Group_to_Assess = ?)

  echo 'The groups which have assessed you have marks of ';

  while ($stmt3->fetch()) {
    $stmt2 = $conn->prepare($queryOthers); 
    $stmt2->bind_param('i', $Assessor);
    $stmt2->execute();
    $resultrow = $stmt2->get_result();
    $stmt2->store_result();
    $stmt2->bind_result($AverageScore);
    
    foreach ($resultrow as $row) {
      echo '<button type="button" disabled class="btn btn-lg" style="margin:0 0 15px 15px"><b>' .$row['AverageScore']. '</b></button>, ';
    }

  }
  echo 'respectively.';
} else {
  echo 'You group has not been assessed yet, therefore there is no rank available.';
}

$stmt3 -> close();
$conn->close();

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