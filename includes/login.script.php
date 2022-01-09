<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');


	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn ,$_POST['password']);

	//-----Check if form datas are not filled-----

	if (empty($username)) {
		header ("Location:../student-login.php?error=empty");
		exit();
	}
	if (empty($password)) {
		header ("Location:../student-login.php?error=empty");
		exit();
	} 
	//-----Check if form datas are not filled-----

	//-----Check For Hash Password and Dehash-----

	$sql = "SELECT * FROM student WHERE username = '$username'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	$hash_password = $row['password'];
	$dehash = password_verify($password, $hash_password);
	if ($dehash == 0) {
		header ("Location:../student-login.php?error=not-found");
		exit();
	}

	//-----End Check For Hash Password and Dehash-----  

	else {
		$sql = "SELECT * FROM student WHERE username = '$username'  AND password = '$hash_password' ";
		$result = $conn->query($sql);

		if (!$row = $result->fetch_assoc()) {
			echo "Your username or password is incorrect";
		} else {
			$_SESSION['s_id'] = $row['s_id'];
			$_SESSION['firstname'] = $row['firstname'];
		}
		header ("Location: //localhost/ccs-dr/dashboard/dashboard");
	}
?>