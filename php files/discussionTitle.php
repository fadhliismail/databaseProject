<?php
/* setting */
// DSN(Data Source Name)
define('DB_DSN', 'mysql:dbname=virtual_learning;host=127.0.0.1;charset=utf8');
define('DB_USER', 'root');               // username 
define('DB_PASS', '');                   // password
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
        'title' => '',
        'name'  => '',
        'text'  => '',
        'assessmentID'=> '',
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
            
            // name check
            if (!$len = mb_strlen($name) or $len > 30) {
                echo '<script type="text/javascript">';
                echo 'alert( "put your name under 30 character length" )';
                echo '</script>';
                throw new Exception;
            }
            // text chec
            if (!$len = mb_strlen($text) or $len > 140) {
                echo '<script type="text/javascript">';
                echo 'alert( "put your text under 1 to 140 character length" )';
                echo '</script>';
                throw new Exception;
            }
                 
            
            $stmt = $pdo->prepare(implode(' ', array(
                'INSERT',
                'INTO mini_board(`title`,`name`, `text`,`assessmentID`,`time`)',
                'VALUES( ?,?, ?, ?, ?)',
            )));
            //execute writing 
            $stmt->execute(array(
                $title,
                $name,
                $text,
                $id,
                date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME'])
            ));
            // set time session information
            $_SESSION['prev'] = $_SERVER['REQUEST_TIME'];
            $_SESSION['text'] = '';
      
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
    $stmt->bindValue(2, 10, PDO::PARAM_INT);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
      <div>
        <?php
        //$id is assessmentNo
        $id = $_GET['id'];
        echo '<h1>discussion board#'.$id.'</h1>' ?>
      </div>
          <div id="textarea">
          <form action="" method="post">
                <label>name: <input name="name" type="text" value="<?=h($_SESSION['name'])?>" /></label><br>
                <label>text<p><textarea name="text" rows="4"cols="40"><?=h($_SESSION['text'])?></textarea></p></label><br>
                <label style="text-align:left;"><input type="submit" name="submit" value="submission" /></label>
          </form>
        </div>
      <div>   

<?php if (!empty($articles)): ?>
<?php foreach ($articles as $article): ?>
         <div class="article">
            <div class="article_text"><h4>name:</h4><?=h($article['name'])?></div>
            <div class="article_text"><h4>text:</h4><?=h($article['text'])?></div>
            <div class="article_time"><?=h($article['time'])?></div>
          </div>
<?php endforeach; ?>
        </div>
<?php endif; ?>
      </div>
    </div>
  </body>
    <?php include 'footer.php'?>
</html>

