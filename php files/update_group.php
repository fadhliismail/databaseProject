<?php

//report any error
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to database
include 'db_connect.php';

$studentno = $_GET['id'];
$groupno = $_GET['group'];


if($groupno == "0") {	
	$query = "UPDATE `users` SET `GroupNo` = NULL WHERE UserId = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param('i', $studentno);
	$stmt->execute();
} else {
	$query = "UPDATE `users` SET `GroupNo` = ? WHERE UserId = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param('ii', $groupno, $studentno);
	$stmt->execute();
}



$stmt->close();
$conn->close();



?>