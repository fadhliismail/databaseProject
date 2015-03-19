<?php

        //student any error
error_reporting(E_ALL); ini_set('display_errors', 1); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //connect to database
include 'db_connect.php';

/*Count number of existing groups*/
$querygroup = "SELECT COUNT(DISTINCT GroupNo) AS `countgroup` FROM student WHERE `GroupNo` !=0";

if($stmt=$conn->prepare($querygroup)) {
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($countgroup);
	$stmt->fetch();
}
$stmt->close();

/*insert blank assessment into DB*/
		$Group_to_Assess = 0; //initialise value to zero

		for($y=1;$y<=$countgroup;$y++){
			
			$queryassessment ="INSERT INTO `assessment`(`Assessor`, `Group_to_Assess`) VALUES (?,?)";

			if($stmt3=$conn->prepare($queryassessment)) {
				$stmt3->bind_param('ii', $y, $Group_to_Assess);

				for ($i=0;$i<$assessmentcount;$i++){
					$stmt3->execute();
				}
			}
			$stmt3->close();
		}
		

		if(isset($_POST['Submit'])){
			$assessmentcount = $_POST['assessmentcount']; //number of groups to be assessed by each group
		} else {
			die('<div class="col-xs-12 col-md-8"><div id="err1" class="alert alert-danger alert-dismissible" role="alert"><div class = "showerror">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> You have not assigned any assessment yet!</div></div></div>');
		}
		/*Show list of groups with no assessment assigned (not sorted)*/
		$querynotassign = "SELECT DISTINCT `Assessor` FROM `assessment` WHERE `Group_to_Assess` = 0 ORDER BY `Assessor`";

		if($stmt4=$conn->prepare($querynotassign)) {
			$stmt4->execute();
			$stmt4->bind_result($Assessor);

			echo '<div class="col-xs-6 col-sm-3">';
			echo '<div class="layer tile_unsorted" data-force="30">';
			echo '<div class="tile__unsorted_name"><b>List of Groups (Not Sorted)</b></div>';
			echo '<div id="tile__list">';
			echo '<ul id="0" class="connectedSortable" style="padding: 2px;"}>';

			while ($stmt4->fetch()){				
				for ($z=0;$z<$assessmentcount;$z++) {
					echo '<li id="' .$Assessor. '">Group ' .$Assessor. '</li>';	
				}
			}

			echo '</ul></div></div></div>';
		}
		$stmt4->close();

		/*Show list of students in the assigned group*/
		if ($countgroup != 0) {
			for ($x= 1; $x<=$countgroup;$x++) {

				$query = "SELECT `Group_to_Assess` FROM `assessment` WHERE `Assessor` = ? AND `Group_to_Assess` != 0";

				if($stmt2=$conn->prepare($query)) {
					$stmt2->bind_param('i', $x);
					$stmt2->store_result();
					$stmt2->execute();
					$stmt2->bind_result($Group_to_Assess);

					echo '<div class="col-xs-6 col-sm-3">';
					echo '<div class="layer tile" data-force="30">';
					echo '<div class="tile__name"><b>Group ' .$x. '</b> will assess</div>';
					echo '<div id="tile__list">';
					echo '<ul id="' .$x. '" class="connectedSortable" style="padding: 2px;"}>';

					while ($stmt2->fetch()){
						echo '<li id="' .$Group_to_Assess. '">Group ' .$Group_to_Assess. '</li>';					
					}

					echo '</ul></div></div></div>';
				}
			}
		} else {
			die('<div class="col-xs-12 col-md-8"><div id="err1" class="alert alert-danger alert-dismissible" role="alert"><div class = "showerror">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> You have not assigned students to group yet! Go to "Manage Group" to assign groups.</div></div></div>');
		}

		$stmt2->close();
		$conn->close();

		?>