<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

	if (isset($_POST['submit'])) {

		$elective_1 = $_POST['elective_1'];
		$elective_2 = $_POST['elective_2'];
		$elective_3 = $_POST['elective_3'];
		$elective_4 = $_POST['elective_4'];
		$total_marks= $_POST['total'];
		$aggregate_percentage = $_POST['aggregate'];

		//-----Check if form datas are not filled-----

		if (empty($elective_1)) {
			header ("Location: //localhost/ccs-dr/dashboard/applicant-marks.php?error=empty");

			exit();
		}
		if (empty($elective_2)) {
			header ("Location: //localhost/ccs-dr/dashboard/applicant-marks.php?error=empty");

			exit();
		} if (empty($elective_3)) {
			header ("Location: //localhost/ccs-dr/dashboard/applicant-marks.php?error=empty");

			exit();
		} if (empty($elective_4)) {
			header ("Location: //localhost/ccs-dr/dashboard/applicant-marks.php?error=empty");

			exit();
		} if (empty($total_marks)) {
			header ("Location: //localhost/ccs-dr/dashboard/applicant-marks.php?error=empty");

			exit();
		} if (empty($aggregate_percentage)) {
			header ("Location: //localhost/ccs-dr/dashboard/applicant-marks.php?error=empty");

			exit();
		}

		//-----Check if form datas are not filled-----

		else {
			$session = $_SESSION['s_id'];

			//Select Application ID from applications table

			$sql = "SELECT application_id FROM applications WHERE s_id = '$session'";
		    $result = $conn->query($sql);
		    $row = mysqli_fetch_assoc($result);
		    $app_id = $row['application_id'];

		    //insert marks into applicant_marks table

			$sql2 = "INSERT INTO applicant_marks (s_id, application_id, elective_1, elective_2, elective_3, elective_4, total_marks, aggregate_percentage)
			VALUES ('$session', '$app_id', '$elective_1', '$elective_2', '$elective_3', '$elective_4', '$total_marks', '$aggregate_percentage')";
			$result2 = $conn->query($sql2);
			
			
			header ("Location: //localhost/ccs-dr/dashboard/dashboard.php?step-three=success");
		}
	}	
?>