<?php

//report any error
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to database
include 'db_connect.php';

$assessor = $_GET['id'];
$Group_to_Assess = $_GET['group'];

$query = "UPDATE `assessment` SET `Group_to_Assess` = ? WHERE Assessor = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('ii', $Group_to_Assess, $Assessor);
$stmt->execute();

$stmt->close();
$conn->close();

?>