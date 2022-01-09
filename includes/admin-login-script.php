<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');


	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn ,$_POST['password']);

	//-----Check if form datas are not filled-----

	if (empty($username)) {
		header ("Location://localhost/ccs-dr/admin/login.php?error=empty");
		exit();
	}
	if (empty($password)) {
		header ("Location://localhost/ccs-dr/admin/login.php?error=empty");
		exit();
	} 
	//-----Check if form datas are not filled-----

	//-----Check For Hash Password and Dehash-----

	$sql = "SELECT * FROM admin WHERE a_username = '$username'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	$hash_password = $row['a_password'];
	$dehash = password_verify($password, $hash_password);
	if ($dehash == 0) {
		header ("Location://localhost/ccs-dr/admin/login.php?error=not-found");
		exit();
	}

	//-----End Check For Hash Password and Dehash-----  

	else {
		$sql = "SELECT * FROM admin WHERE a_username = '$username'  AND a_password = '$hash_password' ";
		$result = $conn->query($sql);

		if (!$row = $result->fetch_assoc()) {
			echo "Your username or password is incorrect";
		} else {
			$_SESSION['a_id'] = $row['a_id'];
			$_SESSION['a_firstname'] = $row['a_firstname'];
		}
		header ("Location: //localhost/ccs-dr/admin/dashboard");
	}

	
?>