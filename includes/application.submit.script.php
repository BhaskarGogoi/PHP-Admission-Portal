<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

	$course = $_POST['course'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$fathersname= $_POST['fathersname'];
	$mothersname = $_POST['mothersname'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$religion = $_POST['religion'];
	$caste = $_POST['caste'];
	$nationality = $_POST['nationality'];
	$PhysicallyHandicappe = $_POST['PhysicallyHandicappe'];
	$phNo = $_POST['phNo'];
	$g_phNo = $_POST['g_phNo'];
	$locality = $_POST['locality'];
	$city_village = $_POST['city_village'];
	$district = $_POST['district'];
	$state = $_POST['state'];
	$pincode = $_POST['pincode'];

	//-----Check if form datas are not filled-----

	if (empty($course)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	}
	if (empty($firstname)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($lastname)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($fathersname)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($mothersname)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($gender)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($dob)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($caste)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($nationality)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($PhysicallyHandicappe)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($phNo)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($g_phNo)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($locality)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($city_village)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($district)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($state)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} if (empty($pincode)) {
		header ("Location: //localhost/ccs-dr/dashboard/application.php?error=empty");

		exit();
	} 

	//-----Check if form datas are not filled-----

	else {
		$session = $_SESSION['s_id'];
		$sql = "INSERT INTO applications (applicant_id, course, first_name, last_name, fathers_name, mothers_name, gender, dob, religion, caste, nationality, handicappe, ph_no, guardian_ph_no, locality, city_village, district, state, pincode)
		VALUES ('$session','$course', '$firstname',  '$lastname', '$fathersname', '$mothersname', '$gender', '$dob', '$religion', '$caste', '$nationality', '$PhysicallyHandicappe', '$phNo', '$g_phNo', '$locality', '$city_village', '$district', '$state', '$pincode')";
		$result = $conn->query($sql);

		//getting application_id from applications table
        $sql = "SELECT application_id FROM applications WHERE applicant_id = '$session'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $app_id = $row['application_id'];
        $submit_date = date("Y-m-d"); 

		//insert data into application_status table
		$sql = "INSERT INTO application_status (applicant_id, application_id, firstname, lastname, application_status, submit_date, verify_date, rejected_reason)
		VALUES ('$session', '$app_id', '$firstname', '$lastname', 'Submitted', '$submit_date', '0000-00-00', 0)";
		$result = $conn->query($sql);
	
		
		header ("Location: //localhost/ccs-dr/dashboard/applicant-image-upload?step-one=success");
	}	
?>