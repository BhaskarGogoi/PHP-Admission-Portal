<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Pay Fees</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if (strpos($url, 'error=empty')!== false) {
			echo "
				<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 0 auto; margin-top: 20px;'>    
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
						&times;
					</button>    
					Fill out all the fields! 
				 </div>";
		}
	?>

	<section class="application">
		<div class="container">
			<div class="row">
					<?php
					if(isset($_SESSION['s_id'])) {
						$session = $_SESSION['s_id'];
					    	echo"
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='application-section'>";

								$sql = "SELECT enrolled_year, roll_no, firstname, lastname FROM enrolled_students WHERE applicant_id = $session";
								$result = $conn->query($sql);
								$row = mysqli_fetch_assoc($result);
								$enrolled_year = $row['enrolled_year'];
								$roll_no = $row['roll_no'];
								$firstname = $row['firstname'];
								$lastname = $row['lastname'];
								$current_date = date("d-m-Y");
								
								$current_Date=date_create($current_date);
								$enrolled_date=date_create("$enrolled_year-08-01");
								$diff=date_diff($current_Date,$enrolled_date);
								$diff2 =  $diff->format("%a days");

								//calculate semester
								if($diff2 >= 1095) {
									$semester = "Graduated";
								} elseif ($diff2 >= 912) {
									$semester = "Sixth Semester";
								} elseif ($diff2 >= 729) {
									$semester = "Fifth Semester";
								} elseif ($diff2 >=546) {
									$semester = "Fourth Semester";
								} elseif ($diff2 >= 365) {
									$semester = "Third Semester";
								} elseif ($diff2 >= 182) {
									$semester = "Second Semester";
								} else {
									$semester = "First Semester";
								}

								$sql = "SELECT * FROM semester_fees WHERE s_id = $session AND semester = '$semester'";
								$result = $conn->query($sql);

								if (mysqli_num_rows($result) > 0) {
									echo "Fees Alreday Paid";
								} else {
									echo "<form class='form-horizontal' role='form' action='//localhost/ccs-dr/dashboard/payment-gateway.php'  method='POST'>
										<h3>Pay Fees</h3>
										<div class='blue-dash'>
											<span></span>
										</div><br><br>
										<div class='form-group'>
											<label class='col-sm-2 control-label'>Semester</label>
											<div class='col-sm-10' >
										 		<input type='text' class='form-control' name='semester' value='$semester' readonly>
									 		</div>    
										</div>
										<div class='form-group'>
											 	<label class='col-sm-2 control-label'>Roll No.</label>            
												<div class='col-sm-10'>         
													<input type='text' class='form-control' name='roll' value='$roll_no' readonly>
												</div>    
										</div>
										<div class='form-group'>
											 	<label class='col-sm-2 control-label'>Name</label>            
												<div class='col-sm-10'>         
													<input type='text' class='form-control' name='name' value='$firstname $lastname' readonly>
												</div>    
										</div>
										<div class='form-group'>
											 	<label class='col-sm-2 control-label'>Amount</label>            
												<div class='col-sm-10'>         
													<input type='text' class='form-control' name='amount' value='10000' readonly>
												</div>    
										</div>
										<div class='form-group'>       
											<div class='col-sm-12'>          
												<button type='submit' class='btn btn-primary' name='pay'>Pay</button>    
											</div>    
										</div>
									</form>";
								}
								echo "</div>
							</div>";				
						
					} else {
						echo "
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='alert alert-danger alert-dismissable' style='width: 250px; margin: 0 auto;'>    <button type='button' class='close' data-dismiss='alert'        aria-hidden='true'>       &times;    </button> You are not logged in! </div>
								<h4 style='text-align: center; margin-top: 20px;'>
									Click <a href='//localhost/ccs-dr/student-login.php'><span>here</span></a>
								to login.</h4>
							</div>";}
					?>

			</div>
		</div>
	</section>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/footer.php');
	?>

</body>
</html> 