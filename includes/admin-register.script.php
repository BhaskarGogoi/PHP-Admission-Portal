<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		//-----Check if form datas are not filled-----

		if (empty($firstname)) {
			header ("Location: //localhost/ccs-dr/admin/register.php?error=empty");

			exit();
		}
		if (empty($lastname)) {
			header ("Location: //localhost/ccs-dr/admin/register.php?error=empty");

			exit();
		} if (empty($email)) {
			header ("Location: //localhost/ccs-dr/admin/register.php?error=empty");

			exit();
		} if (empty($username)) {
			header ("Location: //localhost/ccs-dr/admin/register.php?error=empty");

			exit();
		} if (empty($password)) {
			header ("Location://localhost/ccs-dr/admin/register.php?error=empty");

			exit();
		} 

		//-----End Check if form datas are not filled-----

		else {
			//check if the characters are valid
			if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
				header ("Location: //localhost/ccs-dr/admin/register.php?input=invalid");

				exit();
			} else {
				//check if email is valid
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header ("Location: //localhost/ccs-dr/admin/register.php?email=invalid");
					exit();
				}
				else {
					//-----Check if username or email is already exists----- 
					$sql = "SELECT * FROM admin WHERE a_username = '$username'";
					$result = $conn->query($sql);
					$usernameCheck = mysqli_num_rows($result);
					if ($usernameCheck > 0) {
						header ("Location: //localhost/ccs-dr/admin/register.php?error=username");
						exit();

						$sql = "SELECT * FROM admin WHERE a_email = '$email'";
						$result = $conn->query($sql);
						$emailCheck = mysqli_num_rows($result);
						if ($emailCheck > 0) {
							header ("Location: //localhost/ccs-dr/admin/register.php?error=email");
							exit();
						}
					//-----End Check if username or email is already exists-----
					}
					else {
						$encrypted_password = password_hash($password, PASSWORD_DEFAULT); //hashing password
						$sql = "INSERT INTO admin (a_firstname, a_lastname, a_username, a_email, a_password)
						VALUES ('$firstname', '$lastname',  '$username', '$email', '$encrypted_password')";
						$result = $conn->query($sql);

						header ("Location: //localhost/ccs-dr/admin/login.php?register=success");

					}
				}
			}
		}
	} else {
		header ("Location:../student-register.php");
		exit();
	}
	

	
?>