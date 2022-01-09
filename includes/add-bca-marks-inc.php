<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

	if (isset($_POST['submit'])) {
		$semester = mysqli_real_escape_string($conn, $_POST['semester']);
		$roll_no = mysqli_real_escape_string($conn, $_POST['roll_no']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$held_in = mysqli_real_escape_string($conn, $_POST['held_in']);

		$s1 = mysqli_real_escape_string($conn, $_POST['s1']);
		$s1_endSemester = mysqli_real_escape_string($conn, $_POST['s1_endSemester']);
		$s1_inSemester = mysqli_real_escape_string($conn, $_POST['s1_inSemester']);
		$s1_total = mysqli_real_escape_string($conn, $_POST['s1_total']);

		$s2 = mysqli_real_escape_string($conn, $_POST['s2']);
		$s2_endSemester = mysqli_real_escape_string($conn, $_POST['s2_endSemester']);
		$s2_inSemester = mysqli_real_escape_string($conn, $_POST['s2_inSemester']);
		$s2_total = mysqli_real_escape_string($conn, $_POST['s2_total']);

		$s3 = mysqli_real_escape_string($conn, $_POST['s3']);
		$s3_endSemester = mysqli_real_escape_string($conn, $_POST['s3_endSemester']);
		$s3_inSemester = mysqli_real_escape_string($conn, $_POST['s3_inSemester']);
		$s3_total = mysqli_real_escape_string($conn, $_POST['s3_total']);

		$s4 = mysqli_real_escape_string($conn, $_POST['s4']);
		$s4_endSemester = mysqli_real_escape_string($conn, $_POST['s4_endSemester']);
		$s4_inSemester = mysqli_real_escape_string($conn, $_POST['s4_inSemester']);
		$s4_total = mysqli_real_escape_string($conn, $_POST['s4_total']);

		$s5 = mysqli_real_escape_string($conn, $_POST['s5']);
		$s5_endSemester = mysqli_real_escape_string($conn, $_POST['s5_endSemester']);
		$s5_inSemester = mysqli_real_escape_string($conn, $_POST['s5_inSemester']);
		$s5_total = mysqli_real_escape_string($conn, $_POST['s5_total']);

		$s6 = mysqli_real_escape_string($conn, $_POST['s6']);
		$s6_endSemester = mysqli_real_escape_string($conn, $_POST['s6_endSemester']);
		$s6_inSemester = mysqli_real_escape_string($conn, $_POST['s6_inSemester']);
		$s6_total = mysqli_real_escape_string($conn, $_POST['s6_total']);

		$total = mysqli_real_escape_string($conn, $_POST['total']);
		$res = mysqli_real_escape_string($conn, $_POST['res']);


		if ($semester == "Fourth") {
			//insert marks into result table
			$sql = "INSERT INTO result_bca
				(
				roll_no,
				name,
				semester,
				held_in,
				subject_1,
				subject_1_endSem,
				subject_1_inSem,
				subject_1_total,
				subject_2,
				subject_2_endSem,
				subject_2_inSem,
				subject_2_total,
				subject_3,
				subject_3_endSem,
				subject_3_inSem,
				subject_3_total, 
				subject_4,
				subject_4_endSem,
				subject_4_inSem,
				subject_4_total,
				subject_5,
				subject_5_endSem,
				subject_5_inSem,
				subject_5_total,
				subject_6,
				subject_6_endSem,
				subject_6_inSem,
				subject_6_total,
				total_marks,
				result)
			VALUES (
				'$roll_no',
				'$name',
				'$semester',
				'$held_in',
				'$s1',
				'$s1_endSemester',
				'$s1_inSemester',
				'$s1_total',
				'$s2',
				'$s2_endSemester',
				'$s2_inSemester',
				'$s2_total',
				'$s3',
				'$s3_endSemester',
				'$s3_inSemester',
				'$s3_total',
				'$s4',
				'$s4_endSemester',
				'$s4_inSemester',
				'$s4_total',
				'$s5',
				'$s5_endSemester',
				'$s5_inSemester',
				'$s5_total',
				'Null',
				'Null',
				'Null',
				'Null',
				'$total',
				'$res')";

			$result = $conn->query($sql);			
			header ("Location: //localhost/ccs-dr/admin/add-bca-marks.php?success");

		} elseif ($semester == "Fifth") {
			//insert marks into result table
			$sql = "INSERT INTO result_bca 
				(
				roll_no,
				name,
				semester,
				held_in,
				subject_1,
				subject_1_endSem,
				subject_1_inSem,
				subject_1_total,
				subject_2,
				subject_2_endSem,
				subject_2_inSem,
				subject_2_total,
				subject_3,
				subject_3_endSem,
				subject_3_inSem,
				subject_3_total, 
				subject_4,
				subject_4_endSem,
				subject_4_inSem,
				subject_4_total,
				subject_5,
				subject_5_endSem,
				subject_5_inSem,
				subject_5_total,
				subject_6,
				subject_6_endSem,
				subject_6_inSem,
				subject_6_total,
				total_marks,
				result)
			VALUES (
				'$roll_no',
				'$name',
				'$semester',
				'$held_in',
				'$s1',
				'$s1_endSemester',
				'$s1_inSemester',
				'$s1_total',
				'$s2',
				'$s2_endSemester',
				'$s2_inSemester',
				'$s2_total',
				'$s3',
				'$s3_endSemester',
				'$s3_inSemester',
				'$s3_total',
				'$s4',
				'$s4_endSemester',
				'$s4_inSemester',
				'$s4_total',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'$total',
				'$res')";

			$result = $conn->query($sql);			
			header ("Location: //localhost/ccs-dr/admin/add-bca-marks.php?success");

		} elseif ($semester == "Sixth") {
			//insert marks into result table
			$sql = "INSERT INTO result_bca 
				(
				roll_no,
				name,
				semester,
				held_in,
				subject_1,
				subject_1_endSem,
				subject_1_inSem,
				subject_1_total,
				subject_2,
				subject_2_endSem,
				subject_2_inSem,
				subject_2_total,
				subject_3,
				subject_3_endSem,
				subject_3_inSem,
				subject_3_total, 
				subject_4,
				subject_4_endSem,
				subject_4_inSem,
				subject_4_total,
				subject_5,
				subject_5_endSem,
				subject_5_inSem,
				subject_5_total,
				subject_6,
				subject_6_endSem,
				subject_6_inSem,
				subject_6_total,
				total_marks,
				result)
			VALUES (
				'$roll_no',
				'$name',
				'$semester',
				'$held_in',
				'$s1',
				'$s1_endSemester',
				'$s1_inSemester',
				'$s1_total',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'Null',
				'$total',
				'$res')";

			$result = $conn->query($sql);			
			header ("Location: //localhost/ccs-dr/admin/add-bca-marks.php?success");
		} else {
			$sql = "INSERT INTO result_bca
				(
				roll_no,
				name,
				semester,
				held_in,
				subject_1,
				subject_1_endSem,
				subject_1_inSem,
				subject_1_total,
				subject_2,
				subject_2_endSem,
				subject_2_inSem,
				subject_2_total,
				subject_3,
				subject_3_endSem,
				subject_3_inSem,
				subject_3_total, 
				subject_4,
				subject_4_endSem,
				subject_4_inSem,
				subject_4_total,
				subject_5,
				subject_5_endSem,
				subject_5_inSem,
				subject_5_total,
				subject_6,
				subject_6_endSem,
				subject_6_inSem,
				subject_6_total,
				total_marks,
				result)
			VALUES (
				'$roll_no',
				'$name',
				'$semester',
				'$held_in',
				'$s1',
				'$s1_endSemester',
				'$s1_inSemester',
				'$s1_total',
				'$s2',
				'$s2_endSemester',
				'$s2_inSemester',
				'$s2_total',
				'$s3',
				'$s3_endSemester',
				'$s3_inSemester',
				'$s3_total',
				'$s4',
				'$s4_endSemester',
				'$s4_inSemester',
				'$s4_total',
				'$s5',
				'$s5_endSemester',
				'$s5_inSemester',
				'$s5_total',
				'$s6',
				'$s6_endSemester',
				'$s6_inSemester',
				'$s6_total',
				'$total',
				'$res')";

			$result = $conn->query($sql);
			
			header ("Location: //localhost/ccs-dr/admin/add-bca-marks.php?success");

		}
	}	
?>
