
<?php
	session_start();
	if(isset($_SESSION['a_id'])) {
		if(isset($_POST['submit'])) {
			require($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/fpdf/fpdf.php');

			include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

            $image1 = $_SERVER['DOCUMENT_ROOT']."/ccs-dr/img/logo-college.png";


			$pdf = new FPDF();
			$pdf -> AddPage();
			$pdf -> Image($image1, $pdf->GetX(), $pdf->GetY(), 15.78);
			$pdf -> SetFont("Arial", "B", 13);
			$pdf -> Cell(0, 10, "Debraj Roy College, Golaghat",0,1,"C");
			$pdf -> SetFont("Arial", "", 11);
			$pdf -> Cell(0, 10, "Center For Computer Studies",0,1,"C");
			$pdf -> Cell(0, 10, "Short Listed Applications For Admission Into BCA",0,1,"C");
			$pdf -> Ln( 10 );

			$pdf -> SetFont("Arial", "B", 9);
			$pdf -> Cell(40, 7,"Application No ",1,0, "C");
			$pdf -> Cell(55, 7,"First Name ",1,0, "C");
			$pdf -> Cell(55, 7,"Last Name ",1,0, "C");
			$pdf -> Cell(38, 7,"Percentage ",1,1, "C");
			$pdf -> SetFont("Arial", "", 9);


			$sql = "SELECT * FROM application_status WHERE application_status='Short Listed' ";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_assoc($result)) {
            	$app_ID         = $row['application_id'];
	            $firstname      = $row['firstname'];
	            $lastname       = $row['lastname'];
	            $percentage  = $row['percentage'];

				$pdf -> Cell(40, 7,"$app_ID ",1,0, "C");
				$pdf -> Cell(55, 7,"$firstname ",1,0, "C");
				$pdf -> Cell(55, 7,"$lastname ",1,0, "C");
				$pdf -> Cell(38, 7,"$percentage ",1,1, "C");
            }
            


			$pdf -> Ln( 10 );

			
			
		
			$pdf -> output();
		} else {
			header("Location://localhost/ccs-dr/admin/short-listed-applications.php?rror=notClicked");
			exit();
		}
	} else {
		header ("Location:../student-login.php?error");
		exit();
	}
?>