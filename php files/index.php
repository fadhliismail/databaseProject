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
        <li role="presentation"><a href="#submission.php">Submission</a></li>
        <li role="presentation"><a href="mygroup_assessment.php">My Assessment</a></li>
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
</html>