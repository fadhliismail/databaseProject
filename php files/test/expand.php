<!DOCTYPE html>
<html>
<head lang="en">
    <title>Manage Student</title>

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
   <!--  navigation bar
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
                   <li role="presentation"><a href="admin.php">Admin</a></li>
                   <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage <span class="caret"></span></a>
                       <ul class="dropdown-menu" role="menu">
                           <li><a href="manage_group.php">Manage Group</a></li>
                           <li><a href="#">Manage Assessment</a></li>
                           <li><a href="manage_student.php" class="active">Manage Student</a></li>
                       </ul>
                   </li>
                   <li role="presentation"><a href="analysis.php">Analysis</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                   <li><a href="logout.php">Log Out</a></li>
               </ul>
           </div>/.nav-collapse
       </div>
   </nav> -->


   <div class="container">
    
    <?php

        //report any error
    error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
    include 'db_connect.php';

    $queryStudent = "SELECT `StudentNo`, `FirstName`, `LastName`, `Email`, `StudentId`, `GroupNo` FROM `student`";

    if($stmt=$conn->prepare($queryStudent)) {
        $stmt->execute();
        $stmt->bind_result($StudentNo, $FirstName, $LastName, $Email, $StudentId, $GroupNo);

        while($stmt->fetch()) {
            echo '<ul class="list-group">';
            echo '<li class="list-group-item">
            <div class="row toggle" id="dropdown-detail-' .$StudentNo. '" data-toggle="detail-'.$StudentNo. '"><table><tr><th>'
                .$FirstName. '</th><th>' .$LastName. '</th></tr></table>';
                echo '
                <i class="glyphicon glyphicon-chevron-down pull-right"></i></div>';

                echo '
                <div id="detail-' .$StudentNo. '">
                    <hr></hr>
                    <div class="container">
                        <div class="fluid-row">
                            <div class="col-xs-1">
                                Name:
                            </div>
                            <div class="col-xs-5">'
                                .$FirstName. ' ' .$LastName;
                                echo '</div>
                            </div>
                            <div class="fluid-row">
                                <div class="col-xs-1">
                                    Email:
                                </div>
                                <div class="col-xs-5">'
                                    .$Email;
                                    echo '</div>
                                </div>
                                <div class="fluid-row">
                                    <div class="col-xs-1">
                                        Group:
                                    </div>
                                    <div class="col-xs-5">'
                                        .$GroupNo;
                                        echo '</div>
                                    </div>
                                </div>
                            </div>
                        </li>';
                    }
                    echo '</ul></div>';
                }

                $stmt->close();
                $conn->close();
                ?>

                <!-- footer -->
                <?php include 'footer.php'; ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/filter.js"></script>
    <script src="js/expand.js"></script>

</body>
</html>