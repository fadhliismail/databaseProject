<?php
//set connection variables
$host = "localhost";
$user = "root";
$pass = "";
$db = "virtual_learning";

//connect to database
$conn = new mysqli($host, $user, $pass, $db);

//check for connection error
if($conn->connect_error){
die('Error: ('. $conn->connect_errno .') '. $conn->connect_error);
}


/*if($conn == true) {
echo 'Success!';
} else {
echo 'Fail!';
}*/



?>
