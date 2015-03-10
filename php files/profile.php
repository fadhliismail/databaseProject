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
					<a class="navbar-brand" href="#">Virtual Learning</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li role="presentation"><a href="index.php">Home</a></li>
						<li role="presentation" class="active"><a href="#">Profile</a></li>
						<li role="presentation"><a href="submission.php">Submission</a></li>
						<li role="presentation"><a href="mygroup_assessment.php">My Assessment</a></li>
						<li role="presentation"><a href="review.php">Review</a></li>
						<li role="presentation"><a href="#discussion.php">Discussion</a></li>
						<li role="presentation"><a href="help.php">Help</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#logout">Log Out</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>




		<!-- content page -->
		<div class="container">
			<div class="page-header"><h1>Edit your profile</h1></div>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			<div class="page-title">Change your password</div>

			<!-- function to show/hide alert -->
			<script type="text/javascript">
				function hideAlert(id){
					var text = $('#'+id+' .showerror').text();
					console.log(text.length);
					if(text.length <= 0)
						$('#'+id).hide();
				}
			</script>

			<!-- feedback alert-->
			<div id="err1" class="alert alert-danger alert-dismissible" role="alert">				
				<div class = "showerror"><?php $reasons = array(
					"blank" => "One or more fields blank.",
					"currentpassword" => "Invalid current password!", 			
					"newpassword" => "New password doesn't match! Please enter your password again."); 
				if (isset($_GET["failed"])) echo $reasons[$_GET["reason"]]; 
				?></div>
			</div>
			<script type="text/javascript">
				hideAlert("err1");
			</script>

			<!-- success feedback-->
			<div id="err2" class="alert alert-success alert-dismissible" role="alert">				
				<div class = "showerror"><?php $reasons = array(					
					"updatepassword" => "Password updated!"); 
				if (isset($_GET["success"])) echo $reasons[$_GET["reason"]]; 
				?></div>
			</div>
			<script type="text/javascript">
				hideAlert("err2");
			</script>

			<div class="col-xs-6 col-lg-4">

				<form action = "change_pswd.php" method="post" name="pswd" target="help-inline">Current password:
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" class="form-control" name="CurrentPswd" placeholder="password" aria-describedby="basic-addon1">

					</div>		
					<br>

					New password:
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" class="form-control" name="NewPswd" placeholder="password" aria-describedby="basic-addon1" >
					</div>
					<br>


					Confirmed new password:
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>	
						<input type="password" class="form-control" name="ConfirmPswd" placeholder="password" aria-describedby="basic-addon1">
					</div>
					<br>

					<input type="Submit" class="btn btn-lg" name="Submit" value="Submit">
					<!-- <button type="button" class="btn btn-lg" name="pswd">Submit</button> -->
				</form>
			</div>
		</div>


		<!-- footer -->
		<?php include 'footer.php'; ?>


		
		
	</body>

	<html>