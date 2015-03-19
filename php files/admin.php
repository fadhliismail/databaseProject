	<?php
	session_start();
	if(!isset($_SESSION['login_user'])){
		header("location: loginPage.php");
	}
	$login_user=$_SESSION['login_user'];
	$firstName=$_SESSION['firstName'];
	$lastName=$_SESSION['lastName'];
	?>


	<!DOCTYPE html>
	<html>
	<head lang="en">
		<title>Admin Page</title>

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
					<a class="navbar-brand" href="admin.php">Virtual Learning</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li role="presentation" class="active"><a href="admin.php">Admin</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="manage_group.php">Manage Group</a></li>
								<li><a href="manage_student.php">Manage Student</a></li>
								<li><a href="manage_assessment.php">Manage Assessment</a></li>
							</ul>
						</li>
						<li role="presentation"><a href="student_assessment.php">Student Assessment</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		<!-- content page -->
		<div class="container">
			<div class="page-title">Change your password</div>
			<p>Welcome <span class="badge badge-info"><?php print $firstName ?> <?php print $lastName ?></span>!</p>
			<p>You may change your password here.</p>
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

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>