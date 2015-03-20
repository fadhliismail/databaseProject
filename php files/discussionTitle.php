<?php

session_start();
if(!isset($_SESSION['login_user'])){
    header("location: loginPage.php");
}
$login_user=$_SESSION['login_user'];
$GroupNo=$_SESSION['GroupNo'];
$firstName=$_SESSION['firstName'];
$lastName=$_SESSION['lastName'];
$fullname = $firstName . ' ' . $lastName;

//connect to database
include 'db_connect.php';
define('SESSION_NAME', 'MiniBoard');     // Sessuion Name

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//initialize variables
foreach (array('id','title','name', 'text','assessmentID', 'page', 'submit') as $v) {
    $$v = isset($_POST[$v]) && is_string($_POST[$v]) ? trim($_POST[$v]) : '';
}
//initialize session
session_name(SESSION_NAME); 
@session_start();           
if (!$_SESSION) {
    $_SESSION = array(
        'id'    => '',
        'name'  => '',
        'text'  => '',
        'assessmentID'=> '',
        'prev'  => null,
        );
}

try {
    // code of pushing submission button
    if ($submit) {
        //$id is assessmentNo
        $id = $_GET['id'];
        try {
            $_SESSION['text'] = $text;
            $_SESSION['assessmentID'] = $id;
            
            // text chec
            if (!$len = mb_strlen($text) or $len > 250) {
                echo '<script type="text/javascript">';
                echo 'alert( "put your text under 1 to 250 character length" )';
                echo '</script>';
                throw new Exception;
            }
            
            $stmt = $conn->prepare(implode(' ', array(
                'INSERT',
                'INTO mini_board(`name`,`text`,`assessmentID`,`time`)',
                'VALUES(?, ?, ?, ?)',
                )));
            $date =  date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
            $stmt->bind_param('ssis', $fullname,$text,$id,$date);
            $stmt->execute();  
            echo '<script type="text/javascript">';
            echo 'alert( "Your message is submitted" )';
            echo '</script>';
            $_SESSION['prev'] = $_SERVER['REQUEST_TIME'];
            $_SESSION['text'] = '';
        } catch (Exception $e) { echo'error'; }
    }
    $id = $_GET['id'];

    $stmt = $conn->prepare(implode(' ', array(
        'SELECT',
        '`id`,`name`,`text`, `time`,`AssessmentID`',
        'FROM mini_board',
        'WHERE AssessmentID =',
        $id,
        )));
    
    echo '<div class="container">';
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id,$name,$text,$time,$AssessmentID);

    echo '<div class="page-header"><h1>Discussion Board #'.$id.'</h1></div>';
    echo '<div id="textarea">';
    echo ' <form action="" method="post">';
    /*    echo ' <label>name: <input name="name" type="text" value="'.$name.'" /></label><br>';*/
    echo ' <label><p>Post comment as ' .$fullname. '</p><textarea name="text" class="form-control" rows="5" cols="70">'.$text.'</textarea></p></label><br>';
    echo '           <label style="text-align:left;"><input type="submit" class="btn btn-default" name="submit" value="submission" /></label>';
    echo '      </form>';
    echo '      </div>';

    echo '<div class="table-responsive">';
    echo '<table class ="table table-nonfluid">';
    echo '  <tr>';
    echo '      <th>Name</th>';
    echo '      <th>Comment</th>';
    echo '      <th>Time</th>';
    echo '  </tr>';
    while($stmt->fetch()){

        echo '  <tr>';
        echo '              <td>'.$name.'</td> ';
        echo '              <td>'.$text.'</td> ';
        echo '              <td>'.$time.'</td>';
        echo '  </tr>';         
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
</div>
</body>
<?php include 'footer.php'?>
</html>

