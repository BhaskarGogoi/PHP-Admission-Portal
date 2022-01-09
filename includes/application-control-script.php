<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

		$status = mysqli_real_escape_string($conn, $_POST['status']);		
		//-----Check if form datas are not filled-----

		if (empty($status)) {
			header ("Location: //localhost/ccs-dr/admin/dashboard.php?error");

			exit();
		} 

		else {
			$sql = "UPDATE application_control SET app_status = '$status' WHERE app_control_id = '1' ";
			$result = $conn->query($sql);

			header ("Location: //localhost/ccs-dr/admin/dashboard.php?changeStatus=Success");	
		}
	} else {
		header ("Location: //localhost/ccs-dr/admin/dashboard.php?something-went-wrong");
		exit();
	}
	

	
?>