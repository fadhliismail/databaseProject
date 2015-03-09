<?php

//report any error
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to database
include 'db_connect.php';

$GroupNo = 4;

$query = "INSERT INTO report (GroupNo, File_Name, File_Size, File_Link, File_Type, Submission_Timestamp) VALUES (?, ?, ?, ?, ?, ?)";
$queryReport = "LOAD XML LOCAL INFILE '?' INTO TABLE report ROWS IDENTIFIED BY '<report>'";
//http://localhost/virtual_learning/uploads/report.xml
$ds = "/";
$storeFolder = 'uploads';


if(!empty($_FILES)) {
	$myfileName = basename($_FILES['file']['name']);
	$myfileType = $_FILES['file']['type'];
	$myfileSize = $_FILES['file']['size'];
	$myfileLink = 'http://localhost/virtual_learning/uploads/' . rawurlencode($myfileName);
	$myfileDate = date("Y-m-d H:i:s");

	$tempFile = $_FILES['file']['tmp_name'];
	$targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;
	$targetFile = $targetPath . $_FILES['file']['name'];
	move_uploaded_file($tempFile, $targetFile);

	$stmt = $conn->prepare($query);
	$stmt->bind_param('isisss', $GroupNo, $myfileName, $myfileSize, $myfileLink, $myfileType, $myfileDate);

	if($stmt->execute()) {
		echo 'Success!';
	} else {
		die('Error: ('. $conn->errno . ') ' . $conn->error);
	}

	$stmtReport = $conn->prepare($queryReport);
	$stmtReport->bind_param('s', $myfileLink);
	$stmtReport->execute();
}

//Close statement
$stmt->close();

//Close 2nd statement
$stmtReport->close();

//Close connection
$conn->close();



?>