                                    <!DOCTYPE HTML>
                                    <html>                                    
                                    <head lang="en">
                                       <title>Assess Peer's Work</title>

                                       <meta charset="UTF-8">
                                       <meta name="viewport" content="width=device-width, initial-scale=1.0">

                                       <!-- Custom CSS -->
                                       <link rel ="stylesheet" type="text/css" href="css/mystyle.css">
                                       <!-- Latest compiled and minified CSS -->
                                       <link rel="stylesheet" href="css/bootstrap.css">
                                       <!-- Custom styles for this template -->
                                       <link href="sticky-footer-navbar.css" rel="stylesheet">

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
                                       <li role="presentation" class="active"><a href="   review.php">Review</a></li>
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
                        <div class="page-header"><h1>Report<h1/></div>
                        
                        <!-- show report -->
                        <?php

                //report any error
                        error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
                        include 'db_connect.php';
    $filename = 'report.xml'; //no need rawurlencode even if the file got space
    var_dump($filename);
//./uploads/report.xml
    if (file_exists('./uploads/' .$filename)) {
        $xml = simplexml_load_file('./uploads/' .$filename);

        $mygroup = $xml->Group;
        echo $mygroup. '</br></br>';
        echo $xml -> Intro. '</br></br>';
        echo $xml -> Main. '</br></br>';
        echo $xml -> Conclusion. '</br></br>';

    } else {
        exit('Failed to open file.');
    }
    ?>

    <div class="page-title">Assessment</div>
    <p> Please rate fairly and leaves a comment to justify the rating. Comment is <u>required</u> for each criteria.</p>
    <form action="report.php" method="post">    

        <!-- show table -->
        <div class="table-responsive">
            <table class ="table table-nonfluid">
                <tr>
                    <th>Criteria</th>
                    <th>Rate</th>
                    <th>Comment</th>
                </tr>
                <tr>
                    <td>Criteria 1</td>
                    <td>
                        <input type="range" name = "c1" min="0" max="10"  value="5" step="1" onchange="updateTextInput(this.value);" /><br>
                        <input type="text" id="textInput" size="10" value="5" align="center" />
                    </td>
                    <td>                    
                        <textarea name="comment1" cols="50" rows="5"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Criteria 2</td>
                    <td>
                        <input type="range" name = "c2" min="0" max="10" value="5" step="1" onchange="updateTextInput2(this.value)" /><br>
                        <input type="text" id="textInput2" size="10" value="5" />
                    </td>
                    <td>                    
                        <textarea name="comment2" cols="50" rows="5"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Criteria 3</td>
                    <td>
                     <input type="range" name = "c3" min="0" max="10" value="5" step="1" onchange="updateTextInput3(this.value)" /><br>
                     <input type="text" id="textInput3" size="10" value="5" />
                 </td>
                 <td>                
                     <textarea name="comment3" cols="50" rows="5"></textarea>
                 </td>
             </tr>

             <tr>
                <td>Criteria 4</td>
                <td>
                    <input type="range" name = "c4" min="0" max="10" value="5" step="1" onchange="updateTextInput4(this.value)" /><br>
                    <input type="text" id="textInput4" size="10" value="5" />
                </td>
                <td>
                    <textarea name="comment4" cols="50" rows="5"></textarea>
                </td>
            </tr>

            <tr>
                <td>Criteria 5</td>
                <td>
                 <input type="range" name = "c5" min="0" max="10" value="5" step="1" onchange="updateTextInput5(this.value)" /><br>
                 <input type="text" id="textInput5" size="10" value="5" />
             </td>
             <td>
                <textarea name="comment5" cols="50" rows="5"></textarea>
            </td>
        </tr>

    </table>
</div>
<input type="Submit" class="btn btn-lg" value="submit" />
</form>

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
