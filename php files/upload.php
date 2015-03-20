<?php

session_start();
if(!isset($_SESSION['login_user'])){
	header("location: loginPage.php");
}
$login_user=$_SESSION['login_user'];
$GroupNo=$_SESSION['GroupNo'];
$firstName=$_SESSION['firstName'];
$lastName=$_SESSION['lastName'];

//report any error
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to database
include 'db_connect.php';

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

	$queryCheck = "SELECT GroupNo FROM report WHERE GroupNo = ?";
	$stmt2 = $conn->prepare($queryCheck);
	$stmt2->bind_param('i', $GroupNo);

	$queryUpload = "INSERT INTO report (GroupNo, File_Link, File_Name, File_Size, File_Type, Intro, Main, Conclusion) VALUES (?, ?, ?, ?, ?, ?, ?, ?)
	ON DUPLICATE KEY UPDATE File_Link = ?, File_Name = ?, File_Size = ?, File_Type = ?, Intro = ?, Main = ?, Conclusion = ?";

	$stmt = $conn->prepare($queryUpload);
	$stmt->bind_param('issssssssssssss', $GroupNo, $myfileLink, $myfileName, $myfileSize, $myfileType, $intro, $main, $conclusion, $myfileLink, $myfileName, $myfileSize, $myfileType, $intro, $main, $conclusion);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($GroupNo, $File_Link, $File_Name, $File_Size, $File_Type, $Intro, $Main, $Conclusion);
	header("Refresh: 1; url= submission.php");
}

//Close statement
$stmt->close();

//Close connection
$conn->close();



?>