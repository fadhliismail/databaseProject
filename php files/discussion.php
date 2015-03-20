<?php

session_start();
if(!isset($_SESSION['login_user'])){
    header("location: loginPage.php");
}
$login_user=$_SESSION['login_user'];
$GroupNo=$_SESSION['GroupNo'];
$firstName=$_SESSION['firstName'];
$lastName=$_SESSION['lastName'];

//connect to database
include 'db_connect.php';
define('SESSION_NAME', 'MiniBoard');     // Sessuion Name
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
//initialize variables
foreach (array('title','name', 'text','assessmentID', 'token', 'page', 'submit') as $v) {
    $$v = isset($_POST[$v]) && is_string($_POST[$v]) ? trim($_POST[$v]) : '';
}
//initialize session
session_name(SESSION_NAME); 
@session_start();           
if (!$_SESSION) {
    $_SESSION = array(
        'title' => '',
        'name'  => '',
        'text'  => '',
        'assessmentID'=> '',
        'token' => array(),
        'prev'  => null,
        );
}
try {
    $stmt = $conn->prepare(implode(' ', array(
        'SELECT',
        '`name`, `text`, `time`,`AssessmentID`',
        'FROM mini_board',
        'ORDER BY `time` DESC',
        )));
    
    echo '<div class="container">';
    echo '<div>';
    echo '<h1>discussion summary</h1>';
    echo '</div>';
    
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($name,$text,$time,$AssessmentID);
    
    echo '<div class="table-responsive">';
    echo '<table class ="table table-nonfluid">';
    echo '	<tr>';
    echo '		<th>Name</th>';
    echo '		<th>Text</th>';
    echo '		<th>Time</th>';
    echo '	</tr>';
    while($stmt->fetch()){
        echo '	<tr>';
        echo '              <td>'.$name.'</td> ';
        echo '              <td>'.$text.'</td> ';
        echo '              <td>'.$time.'</td>';
        echo '	</tr>';         
    }
    echo '</table>';
    echo '</div>';
    echo '<div class="container">';
} catch (Exception $e) { }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>discussion board</title>
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
       <li role="presentation"><a href="home.php">Home</a></li>
       <li role="presentation"><a href="profile.php">Profile</a></li>
       <li role="presentation"><a href="submission.php">Submission</a></li>
       <li role="presentation"><a href="mygroup_assessment.php">My Assessment</a></li>
       <li role="presentation"><a href="review.php">Review</a></li>
       <li role="presentation" class="active"><a href="discussion.php">Discussion</a></li>
       <li role="presentation"><a href="help.php">Help</a></li>

   </ul>
   <ul class="nav navbar-nav navbar-right">
       <li><a href="logout.php">Log Out</a></li>
   </ul>
</div>
</div>
</nav>
<div>
</body>
<?php include 'footer.php'?>
</html>