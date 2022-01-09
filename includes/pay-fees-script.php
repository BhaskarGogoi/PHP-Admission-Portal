<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

		$s_id = $_SESSION['s_id'];
		$semester = $_SESSION['semester'];
		$roll = $_SESSION['roll'];
		$name = $_SESSION['name']; 
		$amount = $_SESSION['amount'];
		$payment_date = date("d-m-Y");

		$sql = "INSERT INTO semester_fees (s_id, student_name, roll_no, semester, amount, payment_date)
		VALUES ('$s_id', '$name', '$roll',  '$semester', '$amount', '$payment_date')";
		$result = $conn->query($sql);

		header ("Location: ../dashboard/payment-success.php?payment=success");
		
	} else {
		header ("Location: ../dashboard/payment-gateway.php?error");
		exit();
	}
	

	
?>