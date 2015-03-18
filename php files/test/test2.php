<?php

//report any error
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to database
include 'db_connect.php';

$GroupNo = 4;

$query = "INSERT INTO report (GroupNo, File_Name, File_Size, File_Link, File_Type, Submission_Timestamp, Group) VALUES (?, ?, ?, ?, ?, ?, ?)";

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

	//$doc = new SimpleXMLElement(file_get_contents('./uploads/' .$myfileName));
	/*$filename = './uploads/report.xml';
	$xml = simplexml_load_file($filename) or die("Error: Cannot create object");
	$mygroup = $xml->group;*/

	$filename = 'report.xml';
	$xml = simplexml_load_file('./uploads/' .$targetFile);
	$mygroup = $xml -> group;
/*
	$xml = simplexml_load_file('./uploads/' .$myfileName) or die("Error: Cannot create object");
	var_dump($xml);
*/
	//$mygroup = $xml->group;
	/*$myintro = $xml->intro;
	$mymain = $xml->main;
	$myconclusion = $xml->conclusion;*/

	$stmt = $conn->prepare($query);
	$stmt->bind_param('isissss', $GroupNo, $myfileName, $myfileSize, $myfileLink, $myfileType, $myfileDate, $mygroup);

	if($stmt->execute()) {
		echo 'Success!';
	} else {
		die('Error: ('. $conn->errno . ') ' . $conn->error);
	}

}

?>