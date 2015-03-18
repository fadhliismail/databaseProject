<?php

//report any error
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to database
include 'conn.php';

$ds = "/";
$storeFolder = 'uploads';


if(!empty($_FILES)) {
	$fname = basename($_FILES['file']['name']);
	$ftype = $_FILES['file']['type'];
	$fsize = $_FILES['file']['size'];
	$flink = 'http://localhost/aps/upload/' . rawurlencode($fname);

	$file_data = 

	$xml = simplexml_load_file(file_get_contents($targetFile));

	$firstname = $xml->FirstName;
	$lastname = $xml->LastName;
	$phone = $xml->Phone;
	$address = $xml->Address;

	$tempFile = $_FILES['file']['tmp_name'];
	$targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;
	$targetFile = $targetPath . $_FILES['file']['name'];
	move_uploaded_file($tempFile, $targetFile);

	$query = "INSERT INTO user_details (link, name, size, type, first_name, last_name, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

	$stmt = $conn->prepare($query);
	$stmt->bind_param('ssssssss', $flink, $fname, $fsize, $ftype, $firstname, $lastname, $phone, $address);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($link, $name, $size, $type, $first_name, $last_name, $phone, $address);


}

//Close statement
$stmt->close();

//Close connection
$conn->close();



?>