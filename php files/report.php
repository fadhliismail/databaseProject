<?php
//report any error
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include 'db_connect.php';
$response = array();

for($j = 1; $j<6 ; $j++){
    $comment = 'comment'.$j;
    $$comment = filter_input(INPUT_POST, $comment);
    $criteria = 'c'.$j;
    $$criteria = filter_input(INPUT_POST, $criteria);
    
    if(empty($$comment)){
        echo '<script type="text/javascript">';
        echo "<!--\n";
        echo 'alert("Please enter comment);' ."\n";
        echo 'location.href = "http://localhost:8888/PhpProject1/Reportpage.php"';
        echo '// -->';
        echo '</script>';
        //echo "Please enter comment of".$j;
        break;
    }
}
   //query statement
        $queryUpdate = "UPDATE `score` SET `Comment`= '".$$comment."',`Score_Criteria`= '".$$criteria."' WHERE `AssessmentNo` = 1 AND `CriteriaNo`=$j";
        if ($stmtUpdate = $conn->prepare($queryUpdate)) {
            $stmtUpdate->execute();
            $stmtUpdate->store_result();
        }
        $AssessmentNo = 1; /*this cannot be a fixed number. it has to get data from session.*/
        //query statement
        $queryTime = "UPDATE `report` SET `Submission_Timestamp`= NOW(),`Submission_Updated`= NOW() WHERE `ReportNo`=1";
        $queryScore = "SELECT `CriteriaNo`, `Comment`,`Score_Criteria`FROM `score` WHERE `AssessmentNo` = ?";
    
        // Update timestamp 
        if ($stmtTimeUpdate = $conn->prepare($queryTime)) {
            $stmtTimeUpdate->execute();
            $stmtTimeUpdate->store_result();
        }
        // Show what this script did
        if ($stmtScore = $conn->prepare($queryScore)) {
            $stmtScore->bind_param('i', $AssessmentNo);
            $stmtScore->execute();
            $stmtScore->store_result();
            $stmtScore->bind_result($CriteriaNo, $Comment,$Score_Criteria);

            echo '<div class="table-responsive"><table class ="table table-nonfluid"><tr><th>CriteriaNo,</th><th>Comment,</th><th>Score_Criteria</th></tr>';
            echo '<div class="page-header"><h1>Group '.$AssessmentNo.'</h1></div>';
            echo '<p><b>database value:</b></p>';

            while ($stmtScore->fetch()) {
            echo '<tr>';
            echo '<td>'.$CriteriaNo.', '.$Comment.', '.$Score_Criteria.'</td>';
            echo '</tr>';
            }
            echo '</table></div>';
        }
?>



