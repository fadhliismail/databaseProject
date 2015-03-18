<?php
//report any error
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to database
include 'db_connect.php';

$GroupNo = 4;

$query = "SELECT File_Link FROM report WHERE GroupNo = ?";
$query2 = "UPDATE report SET Group = ?, Intro = ?, Main = ?, Conclusion = ? WHERE GroupNo = ?";

if($stmt=$conn->prepare($query)) {
	$stmt->bind_param('i', $GroupNo);
	$stmt->execute();
	$stmt->bind_result($File_Link);
	$stmt->fetch();	

	$xml = file_get_contents($File_Link);
	$feed = simplexml_load_string($xml);

	$Group = $feed->Group;
	$Intro = $feed->Intro;

if($stmt2 = $conn->prepare($query2)) {
	$stmt2->bind_param('ssssi', $Group, $Intro, $Main, $Conclusion, $GroupNo);
	$stmt2->execute();
}

	/*echo $Group;
	echo $Intro;*/

	$stmt -> close();
	$conn -> close();

}
?>