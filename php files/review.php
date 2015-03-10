<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
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
      	<li><a href="#logout">Log Out</a></li>
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
    
    // develop calculate averagescore
    // how can I  calculate average?? Select GroupNo = 1 and add Score, count++ each time
    // eg. Group1 has 5 and 30+35+25+46+35/5 is average score??
    //     it should have 3 data not 5data on assessment table.
    // from score table ( calc average score and write it on)  assessment table
    // 
    // update AverageScore of group table ( this table should have only one Avgscore each group).
    for($GroupNo = 1; $GroupNo <4 ; $GroupNo++){
        $updateAverageScore= "UPDATE `group` as G SET `AverageScore`=(SELECT TRUNCATE(AVG(`Score`),0) 
                         FROM `assessment` as A WHERE G.`GroupNo`= A.`GroupNo`)WHERE `GroupNo`=?";
        if($stmtUpdateAvgScore = $conn->prepare($updateAverageScore)){
            $stmtUpdateAvgScore->bind_param('i', $GroupNo);
            $stmtUpdateAvgScore->execute();
            $stmtUpdateAvgScore->store_result();
        }
    }
    ?>
	<div class="container">
		
		<p>Your group report will be assessed by your peers based on the following criteria:</p>	
		<div class="table-responsive">
			<table class ="table table-nonfluid">
				<tr>
					<th>Group Number</th>
					<th>Detail of report</th>
                                        <th>Grade</th>
				</tr>
				<tr>
					<td>Group 1</td>
					<td><a href="view_report.php">Reportpage</a> </td>
                                        <?php
                                        $GroupNo=1;
                                        $queryAverageScore = "SELECT `AverageScore` FROM `group` WHERE `GroupNo`=?"; 
                                        if ($stmtAvgScore = $conn->prepare($queryAverageScore)) {
                                            $stmtAvgScore->bind_param('i', $GroupNo);
                                            $stmtAvgScore->execute();
                                            $stmtAvgScore->store_result();
                                            $stmtAvgScore->bind_result($AverageScore1);
                                            $stmtAvgScore->fetch();
                                        }  
                                        echo '<td>'.$AverageScore1.'</td>';
                                        ?>
				</tr>
				<tr>
					<td>Group 2</td>
					<td><a href="view_report.php">Reportpage</a></td>
                                        <?php
                                        $GroupNo=2;
                                        $queryAverageScore = "SELECT `AverageScore` FROM `group` WHERE `GroupNo`=?"; 
                                        if ($stmtAvgScore = $conn->prepare($queryAverageScore)) {
                                            $stmtAvgScore->bind_param('i', $GroupNo);
                                            $stmtAvgScore->execute();
                                            $stmtAvgScore->store_result();
                                            $stmtAvgScore->bind_result($AverageScore2);
                                            $stmtAvgScore->fetch();
                                        }  
                                        echo'<td>'.$AverageScore2.'</td>';
                                        ?>
				</tr>
				<tr>
					<td>Group 3</td>
					<td><a href="view_report.php">Reportpage</a></td>
                                        <?php
                                        $GroupNo=3;
                                        $queryAverageScore = "SELECT `AverageScore` FROM `group` WHERE `GroupNo`=?"; 
                                        if ($stmtAvgScore = $conn->prepare($queryAverageScore)) {
                                            $stmtAvgScore->bind_param('i', $GroupNo);
                                            $stmtAvgScore->execute();
                                            $stmtAvgScore->store_result();
                                            $stmtAvgScore->bind_result($AverageScore3);
                                            $stmtAvgScore->fetch();
                                        }
                                        echo '<td>'.$AverageScore3.'</td>';
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



