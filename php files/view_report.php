<?php
session_start();
if(!isset($_SESSION['login_user'])){
  header("location: loginPage.php");
}
$login_user=$_SESSION['login_user'];
$GroupNo=$_SESSION['GroupNo'];

?>

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

<<<<<<< HEAD
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
    <li role="presentation" class="active"><a href="review.php">Review</a></li>
    <li role="presentation"><a href="discussion.php">Discussion</a></li>
    <li role="presentation"><a href="help.php">Help</a></li>
=======
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
                                       <li role="presentation"><a href="discussion.php">Discussion</a></li>
                                       <li role="presentation"><a href="help.php">Help</a></li>
>>>>>>> 9c14c28badd66602601297a0c9cc0d29f2e45ea3

  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="logout.php">Log Out</a></li>
  </ul>
</div><!--/.nav-collapse -->
</div>
</nav>

<!-- content page -->
<div class="container">
  <!-- Show report -->
  <?php  
        //$id is assessmentNo
  $id = $_GET['id'];
  /* echo '<div class="page-header"><h1>Report_assessmentNo.'.$id.'<h1/></div>';*/

<<<<<<< HEAD
  //report any error
  error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  //connect to database
  include 'db_connect.php';

  $queryGroupNo = "SELECT `Group_to_Assess` FROM `assessment` WHERE `AssessmentNo`= $id";

  if ($stmtGroupNo = $conn->prepare($queryGroupNo))
  {        
    $stmtGroupNo->execute();
    $stmtGroupNo->store_result();
    $stmtGroupNo->bind_result($Group_to_Assess);
    $stmtGroupNo->fetch();
  }

  $queryReport = "SELECT `File_Name`, `GroupNo`, `Intro`, `Main`, `Conclusion` FROM `report` WHERE `GroupNo`= ?"; 

  if ($stmtFileName = $conn->prepare($queryReport)) {        
    $stmtFileName->bind_param('i', $Group_to_Assess);
    $stmtFileName->execute();
    $stmtFileName->store_result();
    $stmtFileName->bind_result($File_Name, $GroupNo, $Intro, $Main, $Conclusion);
    $stmtFileName->fetch();
    echo '<div class="page-header"><h1>Assessment No. '.$id.'<h1/></div>';
    echo $Intro. '<br><br>';
    echo $Main. '<br><br>';
    echo $Conclusion. '<br><br>';
  } else {
    echo "No report to view.";
  };

  ?>
=======
        //connect to database
        include 'db_connect.php';
        //to query File_Name WHERE ReportNo or you can use WHERE GroupNo
        //Bind param to ReportNo or GroupNo whichever you choose
        $queryGroupNo = "SELECT `GroupNo` FROM `assessment` WHERE `AssessmentNo`= $id";
        
        if ($stmtGroupNo = $conn->prepare($queryGroupNo))
                        {        
                                $stmtGroupNo->execute();
                                $stmtGroupNo->store_result();
                                $stmtGroupNo->bind_result($GroupNo);
                                $stmtGroupNo->fetch();
                        }
        $queryFileName = "SELECT `File_Name` FROM `report` WHERE `GroupNo`= $GroupNo"; 
        if ($stmtFileName = $conn->prepare($queryFileName))
                        {        
                                $stmtFileName->execute();
                                $stmtFileName->store_result();
                                $stmtFileName->bind_result($FileName);
                                $stmtFileName->fetch();
                        }  
    //Execute below script
        if(isset($FileName)){
                if (file_exists('./uploads/' .$FileName)) { //fetch file from "uploads" folder
                    $xml = simplexml_load_file('./uploads/' .$FileName);
                    $mygroup = $xml->Group;
                    echo $mygroup. '</br></br>';
                    echo $xml -> Intro. '</br></br>';
                    echo $xml -> Main. '</br></br>';
                    echo $xml -> Conclusion. '</br></br>';
                } else {
                    exit('Failed to open xml file.');
                }
            }else{
                //when DB doesn't contain filename.
                echo "FileName is empty";
        };
>>>>>>> 9c14c28badd66602601297a0c9cc0d29f2e45ea3

  <!-- Give group assessment -->
  <div class="page-title">Assessment</div>
  <p> Please rate fairly and leaves a comment to justify the rating. Comment is <u>required</u> for each criteria.</p>
  <?php
  echo '<form action="report.php?id='.$id.'" method="post" onsubmit="return chk1(this)">';
  ?>
  <script type="text/javascript">
    function chk1(frm){
      for(var i =1; i<6; i++){
        if(frm.elements["comment"+i].value==""){
          alert("please input commnet of criteria"+i);
          return false;
        }else{
                        //return true;
                      }
                    }
                  }
                </script>
                <!-- show table -->
                <div class="table-responsive">
                  <table class ="table table-nonfluid">
                    <tr>
                      <th>Criteria</th>
                      <th>Rate</th>
                      <th>Comment</th>
                    </tr>
                    <tr>
                      <?php
                      for($i =1; $i<6 ; $i++){
                        $queryCriteria = "SELECT `CriteriaNo`,`Score_Criteria`,`Comment` FROM `score` WHERE  `AssessmentNo` = $id AND `CriteriaNo`=$i ";
                        if ($stmtCriteria = $conn->prepare($queryCriteria))
                        {   
                          $stmtCriteria->execute();
                          $stmtCriteria->store_result();
                          $stmtCriteria->bind_result($CriteriaNO[$i],$Score_Criteria[$i],$Comment[$i]);
                          $stmtCriteria->fetch();
                        }
                      }       
                      ?>
                      <td>Criteria 1</td>
                      <td>
                        <input type="range" name = "c1" min="0" max="10"  value="5" step="1" onchange="updateTextInput(this.value);" /><br>
                        <?php
                        $Criteria_1 = var_export($Score_Criteria[1],true);
                        if(isset($Criteria_1)and $Criteria_1!== "NULL"){
                          echo '<input type="text" id="textInput" size="10" value='.$Criteria_1.' align="center" />';
                        }else{
                          echo '<input type="text" id="textInput" size="10" value="5" align="center" />';
                        }
                        ?>    
                      </td>
                      <td>
                        <?php
                        $Comment_1 = var_export($Comment[1],true);
                        if(isset($Comment_1)and $Comment_1!== "NULL"){
                          echo '<input type="text" name="comment1" value='.$Comment_1.' style="width:350px;height:80px;">';
                        }else{
                          echo '<input type="text" name="comment1" style="width:350px;height:80px;">';
                        }
                        ?>
                      </td>

                    </tr>

                    <tr>
                      <td>Criteria 2</td>
                      <td>
                        <input type="range" name = "c2" min="0" max="10" value="5" step="1" onchange="updateTextInput2(this.value)" /><br>
                        <?php
                        $Criteria_2 = var_export($Score_Criteria[2],true);
                        if(isset($Criteria_2)and $Criteria_2!== "NULL"){
                          echo '<input type="text" id="textInput2" size="10" value='.$Criteria_2.' align="center" />';
                        }else{
                          echo '<input type="text" id="textInput2" size="10" value="5" align="center" />';
                        }
                        ?>    
                      </td>
                      <td>
                        <?php
                        $Comment_2 = var_export($Comment[2],true);
                        if(isset($Comment_2)and $Comment_2!== "NULL"){
                          echo '<input type="text" name="comment2" value='.$Comment_2.' style="width:350px;height:80px;">';
                        }else{
                          echo '<input type="text" name="comment2" style="width:350px;height:80px;">';
                        }
                        ?>                        
                      </td>
                    </tr>

                    <tr>
                      <td>Criteria 3</td>
                      <td>
                       <input type="range" name = "c3" min="0" max="10" value="5" step="1" onchange="updateTextInput3(this.value)" /><br>
                       <?php
                       $Criteria_3 = var_export($Score_Criteria[3],true);
                       if(isset($Criteria_3)and $Criteria_3!== "NULL"){
                        echo '<input type="text" id="textInput3" size="10" value='.$Criteria_3.' align="center" />';
                      }else{
                        echo '<input type="text" id="textInput3" size="10" value="5" align="center" />';
                      }
                      ?> 
                    </td>
                    <td>     
                      <?php
                      $Comment_3 = var_export($Comment[3],true);
                      if(isset($Comment_3)and $Comment_3!== "NULL"){
                        echo '<input type="text" name="comment3" value='.$Comment_3.' style="width:350px;height:80px;">';
                      }else{
                        echo '<input type="text" name="comment3" style="width:350px;height:80px;">';
                      }
                      ?>  
                    </td>
                  </tr>

                  <tr>
                    <td>Criteria 4</td>
                    <td>
                      <input type="range" name = "c4" min="0" max="10" value="5" step="1" onchange="updateTextInput4(this.value)" /><br>
                      <?php
                      $Criteria_4 = var_export($Score_Criteria[4],true);
                      if(isset($Criteria_4)and $Criteria_4!== "NULL"){
                        echo '<input type="text" id="textInput4" size="10" value='.$Criteria_4.' align="center" />';
                      }else{
                        echo '<input type="text" id="textInput4" size="10" value="5" align="center" />';
                      }
                      ?> 
                    </td>
                    <td>
                      <?php
                      $Comment_4 = var_export($Comment[4],true);
                      if(isset($Comment_4)and $Comment_4!== "NULL"){
                        echo '<input type="text" name="comment4" value='.$Comment_4.' style="width:350px;height:80px;">';
                      }else{
                        echo '<input type="text" name="comment4" style="width:350px;height:80px;">';
                      }
                      ?>  
                    </td>
                  </tr>

                  <tr>
                    <td>Criteria 5</td>
                    <td>
                      <input type="range" name = "c5" min="0" max="10" value="5" step="1" onchange="updateTextInput5(this.value)" /><br>
                      <?php
                      $Criteria_5 = var_export($Score_Criteria[5],true);
                      if(isset($Criteria_5)and $Criteria_5!== "NULL"){
                        echo '<input type="text" id="textInput5" size="10" value='.$Criteria_5.' align="center" />';
                      }else{
                        echo '<input type="text" id="textInput5" size="10" value="5" align="center" />';
                      }
                      ?> 
                    </td>
                    <td>
                      <?php
                      $Comment_5 = var_export($Comment[5],true);
                      if(isset($Comment_5)and $Comment_5!== "NULL"){
                        echo '<input type="text" name="comment5" value='.$Comment_5.' style="width:350px;height:80px;">';
                      }else{
                        echo '<input type="text" name="comment5" style="width:350px;height:80px;">';
                      }
                      ?>  
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
