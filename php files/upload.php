<?php

//report any error
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to database
include 'db_connect.php';

$GroupNo = 4;

$ds = "/";
$storeFolder = 'uploads';


if(!empty($_FILES)) {
	$myfileName = basename($_FILES['file']['name']);
	$myfileType = $_FILES['file']['type'];
	$myfileSize = $_FILES['file']['size'];
	$myfileLink = 'http://localhost/virtual_learning/uploads/' . rawurlencode($myfileName);

	$tempFile = $_FILES['file']['tmp_name'];
	$targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;
	$targetFile = $targetPath . $_FILES['file']['name'];
	move_uploaded_file($tempFile, $targetFile);

	$xml = simplexml_load_file($targetFile);

	$mygroup = $xml->Group;
	$intro = $xml->Intro;
	$main = $xml->Main;
	$conclusion = $xml->Conclusion;

	$queryUpload = "INSERT INTO report (GroupNo, File_Link, File_Name, File_Size, File_Type, GroupIT, Intro, Main, Conclusion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

	$stmt = $conn->prepare($queryUpload);
	$stmt->bind_param('issssssss', $GroupNo, $myfileLink, $myfileName, $myfileSize, $myfileType, $mygroup, $intro, $main, $conclusion);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($GroupNo, $File_Link, $File_Name, $File_Size, $File_Type, $GroupIT, $Intro, $Main, $Conclusion);


}

//Close statement
$stmt->close();

//Close connection
$conn->close();



?>