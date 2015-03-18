<?php
/* setting */
// DSN(Data Source Name)
define('DB_DSN', 'mysql:dbname=virtual_learning;host=127.0.0.1;charset=utf8');
define('DB_USER', 'root');               // username 
define('DB_PASS', '');                   // password
define('SESSION_NAME', 'MiniBoard');     // Session Name
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
foreach (array('title','name', 'text','assessmentID', 'token', 'page', 'submit') as $v) {
  $$v = isset($_POST[$v]) && is_string($_POST[$v]) ? trim($_POST[$v]) : '';
}
// page number must be over 1 page
$page = max(1, (int)$page);

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
  $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // code of pushing submission button
  if ($submit) {
        //$id is AssessmentID
    $id = $_GET['id'];
    
    try {
      $_SESSION['name'] = $name;
      $_SESSION['text'] = $text;
      $_SESSION['title'] = $title;
      $_SESSION['assessmentID'] = $id;
      
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
            // when the submission finished, the message will be shown
      throw e('submission finished', $e);
    } catch (Exception $e) { }
  }
  $id = $_GET['id'];
  $stmt = $pdo->prepare(implode(' ', array(
    'SELECT',
    'SQL_CALC_FOUND_ROWS `name`, `text`, `time`,`AssessmentID`,`title`',
    'FROM mini_board',
    'WHERE AssessmentID =',
    $id,
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
  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <title>Discussion Board</title> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom CSS -->
    <link rel ="stylesheet" type="text/css" href="css/mystyle.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

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
     <a class="navbar-brand" href="home.php">Virtual Learning</a>
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
<div >
  <div class="container"> 
        <?php //$id is assessmentNo
        $id = $_GET['id'];
        echo '<div class="page-header"><h1>Discussion Board #'.$id.'</h1></div>' ?>
        <div>
          <div id="textarea">
            <form action="" method="post">
              Name <input name="name" type="text" value="<?=h($_SESSION['name'])?>" /><br> 
              Comment <p><textarea name="text" class="form-control" rows="5" cols="40"><?=h($_SESSION['text'])?></textarea></p><br> 
              <input type="submit" class="btn btn-lg" name="Submit" value="submission">
              <label><input type="hidden" name="token" value="<?=h($token)?>" /></label>
            </form>
          </div>
          <?php if (!empty($e)): ?>
            <div id="messages">
              <?php foreach (exception_to_array($e) as $msg): ?>
                <div><?php=h($msg)?></div>
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
    </div>
  </body>
  <?php include 'footer.php'?>
  </html>