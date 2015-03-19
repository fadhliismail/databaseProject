	<?php
	session_start();
	if(!isset($_SESSION['login_user'])){
		header("location: loginPage.php");
	}
	$login_user=$_SESSION['login_user'];
	$GroupNo=$_SESSION['GroupNo'];
	$firstName=$_SESSION['firstName'];
	$lastName=$_SESSION['lastName'];
	?>

	<!DOCTYPE html>
	<html>
	<head lang="en">
		<title>Profile</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Custom CSS -->
		<link rel ="stylesheet" type="text/css" href="css/mystyle.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Custom styles for this template -->
		<link href="sticky-footer-navbar.css" rel="stylesheet">
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
					<a class="navbar-brand" href="home.php">Virtual Learning</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li role="presentation"><a href="home.php">Home</a></li>
						<li role="presentation" class="active"><a href="profile.php">Profile</a></li>
						<li role="presentation"><a href="submission.php">Submission</a></li>
						<li role="presentation"><a href="mygroup_assessment.php">My Assessment</a></li>
						<li role="presentation"><a href="review.php">Review</a></li>
						<li role="presentation"><a href="discussion.php">Discussion</a></li>
						<li role="presentation"><a href="help.php">Help</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		<!-- content page -->
		<div class="container">
			<div class="page-header"><h1>Edit your profile</h1></div>
			<p>You may change your password here.</p>
			<p>Welcome <?php print $firstName ?> <?php print $lastName ?> of group <?php print $GroupNo ?>!</p>
			<div class="page-title">Change your password</div>


			<div class="col-xs-6 col-lg-4">

				<form class="col-md-12" action = "change_pswd.php" method="post" name="pswd" target="help-inline">
					Current password:
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input title="Password must contain at least 8 characters" type="password" class="form-control" name="CurrentPswd" placeholder="Current Password" required pattern=".{8,}">

					</div>		
					<br>

					New password:
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input title="Password must contain at least 8 characters including UPPER/lowercase and numbers" type="password" class="form-control" name="NewPswd" placeholder="New Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
						onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
						if(this.checkValidity()) form.Confirm_User_pass.pattern = this.value;">
					</div>
					<br>


					Confirmed new password:
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input title="Please enter the same Password as above" type="password" class="form-control" name="ConfirmPswd" placeholder="Confirmed Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
						onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
					</div>
					<br>

					<input type="Submit" class="btn btn-lg" name="Submit" value="Submit">
				</form>
			</div>
		</div>


		<!-- footer -->
		<?php include 'footer.php'; ?>		
		
	</body>

	<html>