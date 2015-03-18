<?php
// The file test.xml contains an XML document with a root element
// and at least an element /[root]/title.
$filename = 'report.xml'; //no need rawurlencode even if the file got space
var_dump($filename);
//./uploads/report.xml
if (file_exists('./uploads/' .$filename)) {
	$xml = simplexml_load_file('./uploads/' .$filename);

	$mygroup = $xml->Group;
	echo $mygroup. '</br></br>';
	echo $xml -> Intro. '</br></br>';
	echo $xml -> Main. '</br></br>';
	echo $xml -> Conclusion. '</br></br>';

} else {
	exit('Failed to open file.');
}
?>