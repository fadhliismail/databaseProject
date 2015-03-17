<?php
/* setting */
// DSN(Data Source Name)
define('DB_DSN', 'mysql:dbname=virtual_learning;host=127.0.0.1;charset=utf8');
define('DB_USER', 'root');               // username 
define('DB_PASS', '');                   // password
define('SESSION_NAME', 'MiniBoard');     // Sessuion Name
define('DISP_MAX',  10);                 // Max cases of display
define('LIMIT_SEC', 5);                  // Time period of interval
define('TOKEN_MAX', 10);                 // Max number of token   

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function e($msg, Exception &$previous = null) {
    return new RuntimeException($msg, 0, $previous);
}

function exception_to_array(Exception $e) {
    do {
        $msgs[] = $e->getMessage();
    } while ($e = $e->getPrevious());
    return array_reverse($msgs);
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
        'title' => '',
        'name'  => '',
        'text'  => '',
        'assessmentID'=> '',
        'token' => array(),
        'prev'  => null,
    );
}

try {
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // code of pushing submission button
    if ($submit) {
        //$id is assessmentNo
        $id = $_GET['id'];
        try {
            $_SESSION['name'] = $name;
            $_SESSION['text'] = $text;
            $_SESSION['title'] = $title;
            $_SESSION['assessmentID'] = $id;
                 
            if (!empty($e)) {
                throw $e;
            }      
            // when the submission finished, the message will be shown
            throw e('submission finished', $e);
        } catch (Exception $e) { }
    }
    $id = $_GET['id'];

    $stmt = $pdo->prepare(implode(' ', array(
        'SELECT',
        'SQL_CALC_FOUND_ROWS `id`,`name`,`text`, `time`,`AssessmentID`, `title`',
        'FROM mini_board',
        'WHERE AssessmentID =',
        $id,
    )));
    $stmt->bindValue(1, ($page - 1) * DISP_MAX, PDO::PARAM_INT);
    $stmt->bindValue(2, DISP_MAX, PDO::PARAM_INT);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $current_count = count($articles);
    $whole_count = (int)$pdo->query('SELECT FOUND_ROWS()')->fetchColumn();
    $page_count = ceil($whole_count / DISP_MAX);

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
					<li role="presentation"><a href="index.php">Home</a></li>
					<li role="presentation"><a href="profile.php">Profile</a></li>
					<li role="presentation"><a href="submission.php">Submission</a></li>
					<li role="presentation"><a href="mygroup_assessment.php">My Assessment</a></li>
					<li role="presentation"><a href="review.php">Review</a></li>
					<li role="presentation" class="active"><a href="discussion.php">Discussion</a></li>
					<li role="presentation"><a href="help.php">Help</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="registerPage.php">Register</a></li>
					<li><a href="loginPage.php">Log In</a></li>
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</div>
		</div>
	</nav>
    <div >
      <div >
        <?php //$id is assessmentNo
        $id = $_GET['id'];
        echo '<h1>discussion board#'.$id.'</h1>' ?>
      </div>
      <div>
      
<?php if (!empty($e)): ?>
        <div id="messages">
<?php foreach (exception_to_array($e) as $msg): ?>
          <div><?php=h($msg)?></div>
<?php endforeach; ?>
        </div>
<?php endif; ?>
<?php if (!empty($articles)): ?>
<?php foreach ($articles as $article): ?>
           <div class="table-responsive">
		<table class ="table table-nonfluid">
                        <tr>
				<th>Discussion Title</th>
				<th>started by</th>
				<th>last post</th>
			</tr>
                        <tr>
                                
                                <?php  $Address=h($article['AssessmentID']); 
                                       $TitleName=h($article['title']); 
                                echo '<td><a href="discussion.php?id='.$Address.'">'.$TitleName.'</a></td>';
                                ?>                              
                                <td><?=h($article['name'])?> </td>                                                              
                                <td></td>
                        </tr>  
            	</table>
            </div>
<?php endforeach; ?>
        </div>
<?php endif; ?>
      </div>
    </div>
  </body>
    <?php include 'footer.php'?>
</html>

