
<?php
	session_start();
	if(isset($_SESSION['s_id'])) {
		if(isset($_POST['submit'])) {
			require($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/fpdf/fpdf.php');

			include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');

			$s_id = mysqli_real_escape_string($conn, $_POST['submit']);
			$t_id = mysqli_real_escape_string($conn, $_POST['tran_id']);

            $sql = "SELECT * FROM semester_fees WHERE s_id = '$s_id' AND transaction_id='$t_id'";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);

            $tran_id = $row['transaction_id'];       
            $name = $row['student_name'];       
            $roll_no = $row['roll_no'];       
            $semester = $row['semester'];       
            $amount = $row['amount'];       
            $date = $row['payment_date'];       

            $image1 = $_SERVER['DOCUMENT_ROOT']."/ccs-dr/img/logo-college.png";
            $Authorized_Signatory = $_SERVER['DOCUMENT_ROOT']."/ccs-dr/img/Authorized-Signatory.jpg";

			$pdf = new FPDF('P','mm',array(200,150));
			$pdf -> AddPage();
			$pdf -> Image($image1, $pdf->GetX(), $pdf->GetY(), 15.78);
			$pdf -> SetFont("Arial", "B", 13);
			$pdf -> Cell(0, 8, "Center For Computer Studies",0,1,"C");
			$pdf -> SetFont("Arial", "", 12);
			$pdf -> Cell(0, 8, "Debraj Roy College, Golaghat",0,1,"C");
			$pdf -> SetFont("Arial", "", 12);
			$pdf -> Cell(0, 8, "Payment Receipt",0,1,"C");
			$pdf -> Ln( 5 );

			$pdf -> SetFont("Arial", "", 9);
			$pdf -> SetFont("Arial", "B");
			$pdf -> Cell(30, 7,"Transaction ID :",0,0, "L");
			$pdf -> SetFont("Arial", "");
			$pdf -> Cell(30, 7,"$tran_id",0,1, "L");
			$pdf -> SetFont("Arial", "B");
			$pdf -> Cell(30, 7,"Name :",0,0, "L");
			$pdf -> SetFont("Arial", "");
			$pdf -> Cell(30, 7,"$name",0,1, "L");
			$pdf -> SetFont("Arial", "B");
			$pdf -> Cell(30, 7,"Roll No :",0,0, "L");
			$pdf -> SetFont("Arial", "");
			$pdf -> Cell(30, 7,"$roll_no",0,1, "L");
			$pdf -> SetFont("Arial", "B");
			$pdf -> Cell(30, 7,"Payment Date :",0,0, "L");
			$pdf -> SetFont("Arial", "");
			$pdf -> Cell(30, 7,"$date",0,1, "L");
			$pdf -> SetFont("Arial", "B");
			$pdf -> Cell(30, 7,"Class :",0,0, "L");
			$pdf -> SetFont("Arial", "");
			$pdf -> Cell(30, 7,"$semester",0,1, "L");
			$pdf -> Ln( 10 );


			$pdf -> SetFillColor(230,230,230);
			$pdf -> Cell(13, 7,"Sl. No. ",1,0, "C", true);
			$pdf -> Cell(75, 7,"Description ",1,0, "C", true);
			$pdf -> Cell(40, 7,"Amount ",1,1, "C", true);
			$pdf -> Cell(13, 10,"1. ",1,0, "C");
			$pdf -> Cell(75, 10,"$semester Fee ",1,0, "C");
			$pdf -> Cell(40, 10,"$amount ",1,1, "C");
			$pdf -> SetFont("Arial", "B", 10);
			$pdf -> Cell(88, 7,"Total ",0,0, "R");
			$pdf -> SetFillColor(230,230,230);
			$pdf -> Cell(40, 7,"$amount ",1,1, "C", true);
			$pdf -> Ln( 25 );

			$pdf -> Image($Authorized_Signatory, 115, 120, 15.78);
			$pdf -> Cell(90, 7,"",0,0, "C");
			$pdf -> Cell(40, 7,"Authorized Signatory ",0,1, "C");



			$pdf -> output();
		} else {
			header("Location:../student-login.php?error=notClicked");
			exit();
		}
	} else {
		header ("Location:../student-login.php?error");
		exit();
	}
?>