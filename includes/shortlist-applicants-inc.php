<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

		$application_id = mysqli_real_escape_string($conn, $_POST['submit']);
		
		$verify_date = date("Y-m-d");
		$sql = "UPDATE application_status SET application_status = 'Short Listed' , verify_date = '$verify_date' WHERE application_id = '$application_id'";
		$result = $conn->query($sql);
		header ("Location: //localhost/ccs-dr/admin/accepted-applications.php");
				
			
	} else {
		header ("Location: //localhost/ccs-dr/admin/accepted-applications.php?error");
		exit();
	}
	
?>
