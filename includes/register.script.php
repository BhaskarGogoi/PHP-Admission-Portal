<?php
	session_start();

	if (isset($_POST['submit'])) {

		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$ref_code = mysqli_real_escape_string($conn, $_POST['ref_code']);

		//-----Check if form datas are not filled-----

		if (empty($firstname)) {
			header ("Location:../student-register.php?error=empty");

			exit();
		}
		if (empty($lastname)) {
			header ("Location:../student-register.php?error=empty");

			exit();
		} if (empty($email)) {
			header ("Location:../student-register.php?error=empty");

			exit();
		} if (empty($username)) {
			header ("Location:../student-register.php?error=empty");

			exit();
		} if (empty($password)) {
			header ("Location:../student-register.php?error=empty");

			exit();
		} if (empty($ref_code)) {
			header ("Location:../student-register.php?error=empty");

			exit();
		} 

		//-----End Check if form datas are not filled-----

		else {
			//check if the characters are valid
			if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
				header ("Location:../student-register.php?input=invalid");

				exit();
			} else {
				//check if email is valid
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header ("Location:../student-register.php?email=invalid");
					exit();
				}
				else {
					//-----Check if username or email is already exists----- 
					$sql = "SELECT * FROM student WHERE username = '$username'";
					$result = $conn->query($sql);
					$usernameCheck = mysqli_num_rows($result);

					$sql = "SELECT * FROM student WHERE email = '$email'";
					$result = $conn->query($sql);
					$emailCheck = mysqli_num_rows($result);

					if ($usernameCheck > 0) {
						header ("Location:../student-register.php?error=username");
						exit();
					}
					elseif ($emailCheck > 0) {
						header ("Location:../student-register.php?error=email");
						exit();

					}
					//-----End Check if username or email is already exists-----
					else {
						$sql = "SELECT * FROM referral_code WHERE referral_code = '$ref_code'";
							$result = $conn->query($sql);
							$refCheck = mysqli_num_rows($result);
							if ($refCheck > 0) {
								$encrypted_password = password_hash($password, PASSWORD_DEFAULT); //hashing password
								$sql = "INSERT INTO student (firstname, lastname, username, email, password)
								VALUES ('$firstname', '$lastname',  '$username', '$email', '$encrypted_password')";
								$result = $conn->query($sql);

								header ("Location:../student-login.php?register=success");
							} else {
								header ("Location:../student-register.php?error=ref_code");
								exit();
							}
					}
				}
			}
		}
	} else {
		header ("Location:../student-register.php");
		exit();
	}
	

	
?>