<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

	if(isset($_POST['submit'])) {
		$app_id = $_POST['submit'];
		$roll_no = $_POST['roll_no'];

		//getting data from application table
	    $sql = "SELECT * FROM applications WHERE application_id = '$app_id'";
	    $result = $conn->query($sql);
	    $row = mysqli_fetch_assoc($result);

	    $applicant_id = $row['applicant_id'];
		$course = $row['course'];
		$firstname = $row['first_name'];
		$lastname = $row['last_name'];
		$fathersname= $row['fathers_name'];
		$mothersname = $row['mothers_name'];
		$gender = $row['gender'];
		$dob = $row['dob'];
		$religion = $row['religion'];
		$caste = $row['caste'];
		$nationality = $row['nationality'];
		$phNo = $row['ph_no'];
		$g_phNo = $row['guardian_ph_no'];
		$locality = $row['locality'];
		$city_village = $row['city_village'];
		$district = $row['district'];
		$state = $row['state'];
		$pincode = $row['pincode'];

		$enrolled_date = date("Y");

		//-----Check if form datas are not filled-----
		if (empty($applicant_id)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		}

		if (empty($course)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		}
		if (empty($firstname)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		} if (empty($lastname)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");;

			exit();
		} if (empty($fathersname)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		} if (empty($mothersname)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		} if (empty($gender)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		} if (empty($dob)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		} if (empty($caste)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		} if (empty($nationality)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		}  if (empty($phNo)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		} if (empty($g_phNo)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		} if (empty($locality)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		} if (empty($city_village)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		} if (empty($district)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		} if (empty($state)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		} if (empty($pincode)) {
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=empty");

			exit();
		} 

		//-----Check if form data are not filled-----

		else {
			$sql = "INSERT INTO enrolled_students (applicant_id, roll_no, course, firstname, lastname, fathers_name, mothers_name, gender, dob, religion, caste, nationality, ph_no, guardian_ph_no, locality, city_village, district, state, pincode, enrolled_year)
			VALUES ('$applicant_id','$roll_no','$course', '$firstname',  '$lastname', '$fathersname', '$mothersname', '$gender', '$dob', '$religion', '$caste', '$nationality', '$phNo', '$g_phNo', '$locality', '$city_village', '$district', '$state', '$pincode', '$enrolled_date')";
			$result = $conn->query($sql);

			$sql = "UPDATE application_status SET application_status = 'Enrolled' , verify_date = '$verify_date' WHERE application_id = '$app_id'";
			$result = $conn->query($sql);
			
			header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=success");
		}
	}
	else {
		header ("Location: //localhost/ccs-dr/admin/student-entry.php?enroll=error");
	}	
?>