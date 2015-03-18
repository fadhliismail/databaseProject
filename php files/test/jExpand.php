<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Expand table rows with jQuery - jExpand plugin - JankoAtWarpSpeed demos</title>
    <style type="text/css">
        body { font-family:Arial, Helvetica, Sans-Serif; font-size:0.8em;}
        #student { border-collapse:collapse;}
        #student h4 { margin:0px; padding:0px;}
        #student img { float:right;}
        #student ul { margin:10px 0 10px 40px; padding:0px;}
        #student td { background:none repeat-x scroll center left; color:#000; padding:7px 15px; }
        #student div.arrow { background:transparent url(arrows.png) no-repeat scroll 0px -16px; width:16px; height:16px; display:block;}
        #student div.up { background-position:0px 0px;}
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">  
        $(document).ready(function(){
            $("#student tr:odd").addClass("odd");
            $("#student tr:not(.odd)").hide();
            $("#student tr:first-child").show();
            
            $("#student tr.odd").click(function(){
                $(this).next("tr").toggle();
                $(this).find(".arrow").toggleClass("up");
            });
            //$("#student").jExpand();
        });
    </script>        
    <!-- Custom CSS -->
    <link rel ="stylesheet" type="text/css" href="css/mystyle.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Users</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>

                <?php

                //student any error
                error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                //connect to database
                include 'db_connect.php';

                $queryStudent = "SELECT `StudentNo`, `FirstName`, `LastName`, `Email`, `StudentId`, `GroupNo` FROM `student`";

                if($stmt=$conn->prepare($queryStudent)) {
                    $stmt->execute();
                    $stmt->bind_result($StudentNo, $FirstName, $LastName, $Email, $StudentId, $GroupNo);


                    echo '<table class="table" id="student"><thead><tr class="filters">
                    <th><input type="text" class="form-control" placeholder="Student Id" disabled></th>
                    <th><input type="text" class="form-control" placeholder="First Name" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Last Name" disabled></th>
                    <th></th>
                </tr></thead>';

                

                while($stmt->fetch()) {
                 

                    echo '<tr><td>' .$FirstName. '</td><td>' .$LastName. '</td><td>' .$StudentId. '</td><td><div class="arrow"></div></td></tr>';
                    echo '<tr><td colspan="5"><i>Click to edit</i><br><b>Name:</b> ' .$FirstName. ' ' .$LastName. '<br><b>Email:</b> ' .$Email. '<br><b>Group:</b> ' .$GroupNo. '</td></tr>';
                }

                echo '</table>';
            }
            $stmt->close();
            $conn->close();
            ?>
        </div>
    </div>
</div>


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
