<?php
	session_start();

	if (isset($_POST['status'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

		$status = mysqli_real_escape_string($conn, $_POST['status']);
		$app_id = mysqli_real_escape_string($conn, $_POST['app_id']);
		$rejected_reason =  mysqli_real_escape_string($conn, $_POST['rejected_reason']);

		//-----Check if form datas are not filled-----

		if (empty($status)) {
			header ("Location: //localhost/ccs-dr/admin/view-application.php?error=empty");

			exit();
		} 

		//-----End Check if form datas are not filled-----
	
		else {
			if ($status == "Accepted") {
				$verify_date = date("Y-m-d");
				$sql = "UPDATE application_status SET application_status = 'Accepted' , verify_date = '$verify_date' WHERE application_id = '$app_id'";
				$result = $conn->query($sql);
				header ("Location: //localhost/ccs-dr/admin/applications.php");
			}
			else {
				$verify_date = date("Y-m-d");
				$sql = "UPDATE application_status SET application_status = 'Rejected' , verify_date = '$verify_date', rejected_reason = '$rejected_reason' WHERE application_id = '$app_id'";
				$result = $conn->query($sql);
				header ("Location: //localhost/ccs-dr/admin/applications.php");
			}
			

		}
				
			
	} else {
		header ("Location: //localhost/ccs-dr/admin/applications.php");
		exit();
	}
	

	
?>