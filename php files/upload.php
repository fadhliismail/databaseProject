<?php

//report any error
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to database
include 'db_connect.php';

$GroupNo = 4;

$queryUpload = "INSERT INTO report (GroupNo, File_Name, File_Size, File_Link, File_Type, Submission_Timestamp) VALUES (?, ?, ?, ?, ?, ?)";
//$queryXML = "LOAD DATA LOCAL INFILE '?' INTO TABLE report ROWS IDENTIFIED BY '<report>'";
//$query = "LOAD XML LOCAL INFILE '?' INTO TABLE report ROWS IDENTIFIED BY '<report>' SET GroupNo = ?, File_Name = ?, File_Size = ?, File_Link = ?, File_Type = ?, Submission_Timestamp = ?";
//SET GroupNo = ?, File_Name = ?, File_Size = ?, File_Link = ?, File_Type = ?, Submission_Timestamp = ?

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

	$stmt = $conn->prepare($queryUpload);
	$stmt->bind_param('isisss', $GroupNo, $myfileName, $myfileSize, $myfileLink, $myfileType, $myfileDate);
	
	if($stmt->execute()) {
		//header("location:submission.php?success=true&reason=uploaded"));
} else {
	//die(header("location:submission.php?failed=true&reason=failupload"));
}

}

//Close statement
$stmt->close();

//Close connection
$conn->close();



?>