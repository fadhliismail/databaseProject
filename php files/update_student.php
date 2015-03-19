<?php

//report any error
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to database
include 'db_connect.php';

$pk = $_POST['pk'];  //StudentNo
$name = $_POST['name']; //Column in database
$value = $_POST['value']; //Updated value

if(!empty($value)) {

	$query = "UPDATE `users` SET " .$name. " = ? WHERE UserId = ?";
	//$result = 'update users set '.mysql_escape_string($name).'="'.mysql_escape_string($value).'" where user_id = "'.mysql_escape_string($pk).'"';

	$stmt = $conn->prepare($query);
	$stmt->bind_param('si', $value, $pk);
	$stmt->execute();
	//print_r($_POST);

} else {	
	header('HTTP 400 Bad Request', true, 400);
	echo "This field is required!";
}



?>