                                    <!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ReportPage</title>
  <script type="text/javascript">
    function updateTextInput(val) {
      document.getElementById('textInput').value=val; 
    }
    function updateTextInput2(val) {
      document.getElementById('textInput2').value=val; 
    }
       function updateTextInput3(val) {
      document.getElementById('textInput3').value=val; 
    }
       function updateTextInput4(val) {
      document.getElementById('textInput4').value=val; 
    }
       function updateTextInput5(val) {
      document.getElementById('textInput5').value=val; 
    }
  </script>
</head>
<head lang="en">
	<title>Review</title>

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
				<a class="navbar-brand" href="#">Virtual Learning</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li role="presentation"><a href="index.php">Home</a></li>
					<li role="presentation"><a href="profile.php">Profile</a></li>
					<li role="presentation"><a href="submission.php">Submission</a></li>
					<li role="presentation"><a href="mygroup_assessment.php">My Assessment</a></li>
					<li role="presentation" class="active"><a href="#review.php">Review</a></li>
					<li role="presentation"><a href="#discussion.php">Discussion</a></li>
					<li role="presentation"><a href="help.php">Help</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="#logout">Log Out</a></li>
      </ul>
  </div><!--/.nav-collapse -->
</div>
</nav>
<!-- footer -->
<footer class="footer">
	<div class="container">
		<p class="text-muted">GC06 Database Project. Copyright © Team 24, UCL2015.</p>
	</div>
</footer>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

        <br>report：<br/>
    
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<textarea name="report" cols="80" rows="40"></textarea><br />
        <br />
<form action="report.php" method="post"> 
    <table>
        Criteria<br>
        <tr><th>Criteria1：</th>
            <th>
                <input type="range" name = "c1" min="0" max="10"  value="5" step="1" onchange="updateTextInput(this.value);"/>
                <input type="text" id="textInput" size="10" value="5" />
            </th>
            <th>
            comment：<br/>
            <textarea name="comment1" cols="50" rows="5"></textarea><br />
            <br />
            </th>
            <th>
                <!--need to change the address (Currently it is just dummy)-->
                <a href="forum.php">DiscussionForum</a>
            </th>
        </tr>
       
        <tr><th>Criteria2：</th>
            <th>
                <input type="range" name = "c2" min="0" max="10" value="5" step="1" onchange="updateTextInput2(this.value)" />
                <input type="text" id="textInput2" size="10" value="5" />
            </th>
            <th>
            comment：<br/>
            <textarea name="comment2" cols="50" rows="5"></textarea><br />
            <br />
            </th>
            <th>
                <!--need to change the address (Currently it is just dummy)-->
                <a href="forum.php">DiscussionForum</a>
            </th>
        </tr>
        
        <tr><th>Criteria3：</th>
            
            <th>
               <input type="range" name = "c3" min="0" max="10" value="5" step="1" onchange="updateTextInput3(this.value)" />
               <input type="text" id="textInput3" size="10" value="5" />
            </th>
            <th>
            comment：<br/>
            <textarea name="comment3" cols="50" rows="5"></textarea><br />
            <br />
            </th>
            <th>
                <!--need to change the address (Currently it is just dummy)-->
                <a href="forum.php">DiscussionForum</a>
            </th>
        </tr></form>

        <tr><th>Criteria4：</th>
            
            <th>
            <input type="range" name = "c4" min="0" max="10" value="5" step="1" onchange="updateTextInput4(this.value)" />
                <input type="text" id="textInput4" size="10" value="5" />
            </th>
            <th>
            comment：<br/>
            <textarea name="comment4" cols="50" rows="5"></textarea><br />
            <br />
            </th>
            <th>
                <!--need to change the address (Currently it is just dummy)-->
                <a href="forum.php">DiscussionForum</a>
            </th>
        </tr></form>

        <tr><th>Criteria5：</th>
            
            <th>
               <input type="range" name = "c5" min="0" max="10" value="5" step="1" onchange="updateTextInput5(this.value)" />
                <input type="text" id="textInput5" size="10" value="5" />
            </th>
            <th>
            comment：<br/>
            <textarea name="comment5" cols="50" rows="5"></textarea><br />
            <br />
            </th>
            <th>
                <!--need to change the address (Currently it is just dummy)-->
                <a href="forum.php">DiscussionForum</a>
            </th>
        </tr>
        <br />
    </table>
    
    <input type="submit" value="submit" />
</form>
<!-- dynamic content will be here -->
 <!-- just a header label -->
</body>

</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

