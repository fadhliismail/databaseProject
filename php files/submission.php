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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<!-- Custom styles for footer -->
	<link rel="stylesheet" type="text/css" href="sticky-footer-navbar.css">
	<!-- Custom styles for drag n drop -->
	<link rel="stylesheet" type="text/css" href="css/dropzone.css">

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

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
					<li role="presentation" class="active"><a href="submission.php">Submission</a></li>
					<li role="presentation"><a href="mygroup_assessment.php">My Assessment</a></li>
					<li role="presentation"><a href="review.php">Review</a></li>
					<li role="presentation"><a href="discussion.php">Discussion</a></li>
					<li role="presentation"><a href="help.php">Help</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php">">Log Out</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<!-- content page -->
	<div class="container">
		<div class="page-header"><h1>Submit your report</h1></div>
		<p>Welcome <?php print $login_user ?> of group <?php print $GroupNo ?>!</p>
		The deadline of submission is on <b>Friday, 20 March 2014 before 12 PM</b>. Late submission will be deducted 5 marks from the final mark received from the peers.<p>
		You can upload multiple files by drag `n drop. Your file must be of .xml type.
		<!-- function to show/hide alert -->
		<script type="text/javascript">
			function hideAlert(id){
				var text = $('#'+id+' .showerror').text();
				console.log(text.length);
				if(text.length <= 0)
					$('#'+id).hide();
			}
		</script>

		<!-- Drop n Drag javascript -->
		<script src="js/dropzone.js"></script>
		<!-- Drag n Drop File -->
		<div id="dropzone">
			<form action="upload.php" class="dropzone" id="mydropfile">
			</form>
		</div>
		<div class="page-title">Your report</div>
		Link to the group report is here.
	</div>

	<!-- footer -->
	<?php include 'footer.php'; ?>


</body>

<html>