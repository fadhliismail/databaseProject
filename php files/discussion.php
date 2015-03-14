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
foreach (array('name', 'text', 'token', 'page', 'submit') as $v) {
    $$v = isset($_POST[$v]) && is_string($_POST[$v]) ? trim($_POST[$v]) : '';
}
// page number must be over 1 page
$page = max(1, (int)$page);

//initialize session
session_name(SESSION_NAME); 
@session_start();           
if (!$_SESSION) {
    $_SESSION = array(
        'name'  => '',
        'text'  => '',
        'token' => array(),
        'prev'  => null,
    );
}

try {
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // code of pushing submission button
    if ($submit) {
        try {
            $_SESSION['name'] = $name;
            $_SESSION['text'] = $text;

            if (!isset($_SESSION['token'][$token])) {
                throw e('The expiration date is outdated', $e);
            }
            unset($_SESSION['token'][$token]);
            
            // if the submission interval is under request time, show this message
            if ($_SESSION['prev'] !== null) {
                $diff = $_SERVER['REQUEST_TIME'] - $_SESSION['prev'];
                if (($limit = LIMIT_SEC - $diff) > 0) {
                    throw e("Your submission interval is too short to write. Please wait {$limit} second", $e);
                }
            }
            // name check
            if (!$len = mb_strlen($name) or $len > 30) {
                $e = e('put your name under 30 character length', $e);
            }
            // text check
            if (!$len = mb_strlen($text) or $len > 140) {
                $e = e('put your text under 140 character length', $e);
            }
            if (!empty($e)) {
                throw $e;
            }
            $stmt = $pdo->prepare(implode(' ', array(
                'INSERT',
                'INTO mini_board(`name`, `text`, `time`)',
                'VALUES( ?, ?, ?)',
            )));
            //execute writing 
            $stmt->execute(array(
                $name,
                $text,
                date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME'])
            ));
            // set time session information
            $_SESSION['prev'] = $_SERVER['REQUEST_TIME'];
            $_SESSION['text'] = '';
            // when the submission finished, the message will be shown
            throw e('submission finished', $e);
        } catch (Exception $e) { }
    }
    $stmt = $pdo->prepare(implode(' ', array(
        'SELECT',
        'SQL_CALC_FOUND_ROWS `name`, `text`, `time`',
        'FROM mini_board',
        'ORDER BY `id` DESC',
        'LIMIT ?, ?',
    )));

    $stmt->bindValue(1, ($page - 1) * DISP_MAX, PDO::PARAM_INT);
    $stmt->bindValue(2, DISP_MAX, PDO::PARAM_INT);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $current_count = count($articles);
    $whole_count = (int)$pdo->query('SELECT FOUND_ROWS()')->fetchColumn();
    $page_count = ceil($whole_count / DISP_MAX);

} catch (Exception $e) { }

$_SESSION['token'] = array_slice(
    array($token = sha1(mt_rand()) => 1) + $_SESSION['token'],
    0,
    TOKEN_MAX
);
header('Content-Type: application/xhtml+xml; charset=utf-8');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>discussion board</title>
 
   <style type="text/css"><![CDATA[
    <!--
    #messages, #textarea, #articles {
      width: 550px;
      border-top: 3px double brown;
    }
    .article {
      margin-top: -1px;
      border-top: 1px dotted brown;
    }
    .article_name {
      font-size: 30px;
    }
    .article_text {
      margin: 20px;
    }
    .article_time {
      text-align: left;
      font-size: 15px;
    }
    .page {
      font-size: 15px;
      text-align: left;
    }
    textarea {
      width: 100%;
      height: 150px;
    }
    -->
 ]]></style>
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
					<li role="presentation" class="active"><a href="review.php">Review</a></li>
					<li role="presentation"><a href="discussion.php">Discussion</a></li>
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
    <div >
      <div >
        <h1>discussion board</h1>
      </div>
      <div>
        <div id="textarea">
          <form action="" method="post">
            <label>name: <input name="name" type="text" value="<?=h($_SESSION['name'])?>" /></label>
            <label>text<p><textarea name="text"><?=h($_SESSION['text'])?></textarea></p></label>
            <label style="text-align:left;"><input type="submit" name="submit" value="submission" /></label>
            <label><input type="hidden" name="token" value="<?=h($token)?>" /></label>
          </form>
        </div>
<?php if (!empty($e)): ?>
        <div id="messages">
<?php foreach (exception_to_array($e) as $msg): ?>
          <div><?=h($msg)?></div>
<?php endforeach; ?>
        </div>
<?php endif; ?>
<?php if (!empty($articles)): ?>
        <div id="articles">
<?php foreach ($articles as $article): ?>
          <div class="article">
            <div class="article_text"><pre><?=h($article['text'])?></pre></div>
            <div class="article_time"><?=h($article['time'])?></div>
          </div>
<?php endforeach; ?>
        </div>
<?php endif; ?>
      </div>
      <div >
        <div>
<?php if ($page > 1): ?>
          <a href="?page=<?=$page-1?>">before</a> | 
<?php endif; ?>
          <a href="?">latest</a>
<?php if (!empty($page_count) and $page < $page_count): ?>
           | <a href="?page=<?=$page+1?>">next</a>
<?php endif; ?>
        </div>
        <p class="page"><?php
          if (empty($current_count)) {
            echo 'There are no comment';
          } else {
            printf('%d comment of %d to %d comment(%dpage of %dpage)',
              $whole_count,
              ($tmp = ($page - 1) * DISP_MAX) + 1,
              $tmp + $current_count,
              $page_count,
              $page
            );
          }
        ?></p>
      </div>
    </div>
  </body>
  <footer class="footer">
	<div class="container">
		<p class="text-muted">GC06 Database Project. Copyright © Team 24, UCL2015.</p>
	</div>
  </footer>
</html>