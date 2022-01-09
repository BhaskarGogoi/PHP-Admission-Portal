
<?php
	session_start();
	if(isset($_SESSION['applicant_id'])) {
		if(isset($_POST['submit'])) {
			require($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/fpdf/fpdf.php');

			include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

			$app_id = mysqli_real_escape_string($conn, $_POST['applicationID']);
            $sql = "SELECT * FROM applications WHERE application_id = '$app_id'";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            $app_ID         = $row['application_id'];
            $firstname      = $row['first_name'];
            $lastname       = $row['last_name'];
            $fathers_name   = $row['fathers_name'];
            $mothers_name   = $row['mothers_name'];
            $gender         = $row['gender'];
            $dob            = $row['dob'];
            $religion       = $row['religion'];
            $caste          = $row['caste'];
            $nationality    = $row['nationality'];
            $handicappe     = $row['handicappe'];
            $ph_no          = $row['ph_no'];
            $guardian_ph_no = $row['guardian_ph_no'];
            $locality       = $row['locality'];
            $city           = $row['city_village'];
            $district       = $row['district'];
            $state          = $row['state'];
            $pincode        = $row['pincode'];

            $image1 = $_SERVER['DOCUMENT_ROOT']."/ccs-dr/img/logo-college.png";
            $student_image = $_SERVER['DOCUMENT_ROOT']."/ccs-dr/admission/img/applicant-image/applicant_image".$app_id.".jpg";

            $sql2 = "SELECT * FROM applicant_marks WHERE application_id = '$app_id'";
            $result2 = $conn->query($sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $elective1 = $row2['elective_1'];
            $elective2 = $row2['elective_2'];
            $elective3 = $row2['elective_3'];
            $elective4 = $row2['elective_4'];
            $total_marks = $row2['total_marks'];
            $aggregate_percentage = $row2['aggregate_percentage'];

			$pdf = new FPDF();
			$pdf -> AddPage();
			$pdf -> Image($image1, $pdf->GetX(), $pdf->GetY(), 15.78);
			$pdf -> SetFont("Arial", "B", 15);
			$pdf -> Cell(0, 10, "Debraj Roy College, Golaghat",0,1,"C");
			$pdf -> SetFont("Arial", "", 12);
			$pdf -> Cell(0, 10, "Application Form For Admission Into BCA",0,1,"C");
			$pdf -> Ln( 10 );

			//personal details
			$pdf -> SetFont("Arial", "B", 14);
			$pdf -> Cell(50, 7,"Personal Details",0,1, "L");
			$pdf -> Ln( 7 );
			$pdf -> SetFont("Arial", "", 10);
			$pdf -> Cell(40, 7,"Application No ",1,0, "R");
			$pdf -> Cell(50, 7,"$app_ID",1,1, "L");
			$pdf -> Cell(40, 7,"Firstname ",1,0, "R");
			$pdf -> Cell(50, 7,"$firstname",1,1, "L");
			$pdf -> Cell(40, 7,"Lastname ",1,0, "R");
			$pdf -> Cell(50, 7,"$lastname",1,1, "L");
			$pdf -> Cell(40, 7,"Father's Name ",1,0, "R");
			$pdf -> Cell(50, 7,"$fathers_name",1,1, "L");
			$pdf -> Cell(40, 7,"Mother's Name ",1,0, "R");
			$pdf -> Cell(50, 7,"$mothers_name",1,1, "L");
			$pdf -> Cell(40, 7,"Gender",1,0, "R");
			$pdf -> Cell(50, 7,"$gender",1,1, "L");
			$pdf -> Cell(40, 7,"Date of birth ",1,0, "R");
			$pdf -> Cell(50, 7,"$dob",1,1, "L");
			$pdf -> Cell(40, 7,"Religion",1,0, "R");
			$pdf -> Cell(50, 7,"$religion",1,1, "L");
			$pdf -> Cell(40, 7,"Caste ",1,0, "R");
			$pdf -> Cell(50, 7,"$caste",1,1, "L");
			$pdf -> Cell(40, 7,"Nationality ",1,0, "R");
			$pdf -> Cell(50, 7,"$nationality",1,1, "L");
			$pdf -> Cell(40, 7,"Handicappe ",1,0, "R");
			$pdf -> Cell(50, 7,"$handicappe",1,1, "L");
			$pdf -> Cell(40, 7,"Phone No ",1,0, "R");
			$pdf -> Cell(50, 7,"$ph_no",1,1, "L");
			$pdf -> Cell(40, 7,"Guardian Ph No ",1,0, "R");
			$pdf -> Cell(50, 7,"$guardian_ph_no",1,1, "L");
			$pdf -> Ln( 10 );

			//Address
			$pdf -> SetFont("Arial", "B", 14);
			$pdf -> Cell(50, 7,"Address",0,1, "L");
			$pdf -> Ln( 7 );
			$pdf -> SetFont("Arial", "", 10);
			$pdf -> Cell(40, 7,"Locality ",1,0, "R");
			$pdf -> Cell(50, 7,"$locality",1,1, "L");
			$pdf -> Cell(40, 7,"City ",1,0, "R");
			$pdf -> Cell(50, 7,"$city",1,1, "L");
			$pdf -> Cell(40, 7,"District ",1,0, "R");
			$pdf -> Cell(50, 7,"$district",1,1, "L");
			$pdf -> Cell(40, 7,"State ",1,0, "R");
			$pdf -> Cell(50, 7,"$state",1,1, "L");
			$pdf -> Cell(40, 7,"Pincode ",1,0, "R");
			$pdf -> Cell(50, 7,"$pincode",1,1, "L");
			
			//applicant Image

			$pdf -> Image($student_image, 140, 53, 20.78);
			$pdf -> Ln( 10 );

			//marks
			$pdf -> SetFont("Arial", "B", 14);
			$pdf -> Cell(50, 7,"Marks",0,1, "L");
			$pdf -> Ln(7);
			$pdf -> SetFont("Arial", "", 10);
			$pdf -> Cell(20, 7,"Elective I ",1,0, "C");
			$pdf -> Cell(20, 7,"Elective II ",1,0, "C");
			$pdf -> Cell(20, 7,"Elective III ",1,0, "C");
			$pdf -> Cell(20, 7,"Elective IV ",1,0, "C");
			$pdf -> Cell(25, 7,"Total Marks ",1,0, "C");
			$pdf -> Cell(40, 7,"Aggregate Percentage ",1,1, "C");
			$pdf -> Cell(20, 7,"$elective1",1,0, "C");
			$pdf -> Cell(20, 7,"$elective2",1,0, "C");
			$pdf -> Cell(20, 7,"$elective3",1,0, "C");
			$pdf -> Cell(20, 7,"$elective4",1,0, "C");
			$pdf -> Cell(25, 7,"$total_marks ",1,0, "C");
			$pdf -> Cell(40, 7,"$aggregate_percentage ",1,1, "C");
		
			$pdf -> output();
		} else {
			header("Location:../applicant-login?error=notClicked");
			exit();
		}
	} else {
		header ("Location:../applicant-login?error");
		exit();
	}
?>