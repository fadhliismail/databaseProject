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
	<title>Submission</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Custom CSS -->
	<link rel ="stylesheet" type="text/css" href="css/mystyle.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Custom styles for drag n drop -->
	<link rel="stylesheet" href="css/dropzone.css">


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
					<li role="presentation"><a href="home.php">Home</a></li>
					<li role="presentation"><a href="profile.php">Profile</a></li>
					<li role="presentation"><a href="submission.php">Submission</a></li>
					<li role="presentation"><a href="mygroup_assessment.php">My Assessment</a></li>
					<li role="presentation"><a href="review.php">Review</a></li>
					<li role="presentation"><a href="discussion.php">Discussion</a></li>
					<li role="presentation" class="active"><a href="help.php">Help</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="logout.php">Log Out</a></li>
      </ul>
  </div><!--/.nav-collapse -->
</div>
</nav>

<!-- content page -->
<div class="container"><div class="page-header"><h1>Help Page</h1></div>
Contact admin for issues related to password change.
</div>

<!-- footer -->
<?php include 'footer.php'; ?>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

</body>

<html>