<?php
	session_start();
	if(isset($_SESSION['login_user'])){
		$message = "You are already logged in!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("location: profile.php");
	}
?>

	<!DOCTYPE html>
	<html>
	<head lang="en">
		<title>Login</title>
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
					<a class="navbar-brand" href="#">Virtual Learning</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="registerPage.php">Register</a></li>
						<li><a href="loginPage.php">Log In</a></li>
						<li><a href="logout.php">Log Out</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>




		<!-- content page -->
		<div class="container">
			<div class="page-header"><h1>Login</h1></div>
			<div class="page-title">Have you login?</div>

			<div class="col-xs-6 col-lg-4">

				<form class="col-md-12" action="loginSession.php" method="POST">
					<div class="form-group">
						<input type="text" name ="StudentId" class="form-control input-lg" placeholder="Student ID">
					</div>
					<div class="form-group">
						<input type="password" name="User_pass" class="form-control input-lg" placeholder="Password">
					</div>
					<input type="Submit" class="btn btn-lg" name="Submit" value="Submit">
				</form>
			</div>
		</div>


		<!-- footer -->
		<?php include 'footer.php'; ?>
		
	</body>
	</html>