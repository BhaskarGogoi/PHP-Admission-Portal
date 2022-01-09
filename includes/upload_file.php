<?php
	session_start();
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

	if (isset($_POST['submit'])) {

		$session = $_SESSION['s_id'];
	    $sql = "SELECT application_id FROM applications WHERE applicant_id = '$session'";
	    $result = $conn->query($sql);
	    $row = mysqli_fetch_assoc($result);
	    $app_id = $row['application_id'];

		$file = $_FILES['applicant_image'];
		$fileName = $_FILES['applicant_image']['name'];
		$fileTmpName = $_FILES['applicant_image']['tmp_name'];
		$fileSize = $_FILES['applicant_image']['size'];
		$fileError = $_FILES['applicant_image']['error'];
		$fileType = $_FILES['applicant_image']['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg');
		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 100000) {
					$fileNameNew = "applicant_image".$app_id.".".$fileActualExt;
					$fileLocation = $_SERVER['DOCUMENT_ROOT'].'/ccs-dr/img/students-image/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileLocation);
					$sql = "INSERT INTO applicant_image (s_id, application_id, applicant_image_status)
						VALUES ('$session', '$app_id', 1)";
					$result = $conn->query($sql);

					header("Location: //localhost/ccs-dr/dashboard/applicant-marks.php?step-two=success");

				} else {
					echo "Your file is too big";
				}

			} else{
				echo "Error uploading your file";
			}
		}
		else {
			echo "You Cannor upload files of this type";
		}
}
?>