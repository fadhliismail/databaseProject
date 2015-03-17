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
     <!-- Bootstrap core JavaScript
     ================================================== -->
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

     <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="js/bootstrap.min.js"></script>
     <script src="js/filter.js"></script>
     <script src="js/expand.js"></script>

     <link href="css/bootstrap-editable.css" rel="stylesheet">
     <script src="js/bootstrap-editable.js"></script>
     <script src="js/edit_info.js"></script>

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
                    <li role="presentation"><a href="admin.php">Admin</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="manage_group.php">Manage Group</a></li>
                            <li><a href="manage_student.php" class="active">Manage Student</a></li>
                        </ul>
                    </li>
                    <li role="presentation"><a href="student_assessment.php">Analysis</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <!-- content page -->
    <div class="container">
        <div class="page-header"><h1>Manage Students</h1></div>
        Use filter to search for student, expand the row & click to edit student details.
        <div class="row">
            <div class="panel panel-primary filterable">

                <?php

                //student any error
                error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                //connect to database
                include 'db_connect.php';

                $queryStudent = "SELECT `StudentNo`, `FirstName`, `LastName`, `Email`, `StudentId`, `GroupNo` FROM `student` ORDER BY `FirstName`";

                if($stmt=$conn->prepare($queryStudent)) {
                    $stmt->execute();
                    $stmt->bind_result($StudentNo, $FirstName, $LastName, $Email, $StudentId, $GroupNo);


                    echo '<table class="table" id="student"><thead><tr class="filters">
                    <th><input type="text" class="form-control" placeholder="Student Id" disabled></th>
                    <th><input type="text" class="form-control" placeholder="First Name" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Last Name" disabled></th>
                    <th><button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button></th>
                </tr></thead>';

                while($stmt->fetch()) {
                    echo '<tr><td>' .$StudentId. '</td><td>' .$FirstName. '</td><td>' .$LastName. '</td><td><div class="arrow"></div></td></tr>';
                    echo '<tr><td colspan="5"><i>Click to edit</i><br>';
                    echo '<b>Name:</b> <a href="#" class="xeditable" id="FirstName" data-type="text" data-pk="' .$StudentNo. '" data-url="update_student.php" data-title="Enter username">' .$FirstName. '</a>';
                    echo ' <a href="#" class="xeditable" id="LastName" data-type="text" data-pk="' .$StudentNo. '" data-url="update_student.php" data-title="Enter username">' .$LastName. '</a><br>';
                    echo '<b>Email:</b> <a href="#" class="xeditable" id="Email" data-type="text" data-pk="' .$StudentNo. '" data-url="update_student.php" data-title="Enter username">' .$Email. '</a><br>';
                    echo '<b>Group:</b> <a href="#" class="xeditable" id="GroupNo" data-type="text" data-pk="' .$StudentNo. '" data-url="update_student.php" data-title="Enter username">' .$GroupNo. '</a><br>';
                }

                echo '</table>';
            }
            $stmt->close();
            $conn->close();
            ?>
        </div>
    </div>
</div>

<!-- footer -->
<?php include 'footer.php'; ?>




</body>
</html>