<?php
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>View Application</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
	?>

	<section class="application-view">
		<div class="container">
			<div class="row">
					<?php
					if(isset($_SESSION['applicant_id'])) {
						$session = $_SESSION['applicant_id'];
                        $sql = "SELECT * FROM applications WHERE applicant_id = '$session'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        $app_id = $row['application_id'];

                        //getting marks from applicant_marks table
                        $sql2 = "SELECT * FROM applicant_marks WHERE applicant_id = '$session' AND application_id = '$app_id'";
                        $result2 = $conn->query($sql2);
                        $row2 = mysqli_fetch_assoc($result2);

						echo "
						<div class='col-lg-8 col-md-8 col-sm-12'>
							<div class='application-view-section'>
								<div class='application-summary'>
									<form class='form-horizontal' role='form' action='includes/application.submit.script.php'  method='POST'>
									<h3>Personal Details</h3>
									<div class='blue-dash'>
										<span></span>
									</div><br><br>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Application ID</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[application_id]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Course</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[course]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>First Name</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[first_name]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Last Name</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[last_name]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Fathers Name</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[fathers_name]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Mothers Name</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[mothers_name]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Gender</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[gender]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Date of birth</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[dob]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Religion</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[religion]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Caste</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[caste]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Nationality</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[nationality]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Person with disability</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[handicappe]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Phone No.</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[ph_no]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Guardian Phone No.</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[guardian_ph_no]' disabled='disabled'>
										</div>    
									</div>
									<br>

									<h3>Address</h3>
									<div class='blue-dash'>
										<span></span>
									</div><br><br>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Locality</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[locality]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>City/Village</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[city_village]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>District</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[district]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>State</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[state]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Pincode</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row[pincode]' disabled='disabled'>
										</div>    
									</div><br>


									<h3>Marks</h3>
									<div class='blue-dash'>
										<span></span>
									</div><br><br>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Elective 1</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row2[elective_1]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Elective 2</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row2[elective_2]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Elective 3</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row2[elective_3]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Elective 4</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row2[elective_4]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Total Marks</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row2[total_marks]' disabled='disabled'>
										</div>    
									</div>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Aggregate Percentage</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' value='$row2[aggregate_percentage]' disabled='disabled'>
										</div>    
									</div>
								</form>						
								</div>
							</div>
						</div>
						<div class='col-lg-4 col-md-4 col-sm-12'>
							<div class='application-image-view'>
								<div class='applicant-image'>
									<img src = '//localhost/ccs-dr/admission/img/applicant-image/applicant_image$app_id.jpg'>
								</div>
							</div>
						</div>
						<div class='col-lg-8 col-md-8 col-sm-12'>
							<div class='application-view-section'>
								<div class='application-summary'>
								<form action='//localhost/ccs-dr/admission/includes/generate-receipt-pdf.php' method='POST'>
									<input type='hidden' name='applicationID' value='$row[application_id]'/>
									Download a copy of this form.
									<button type='submit'  name='submit' class='btn btn-primary'>Download</button>
								</form>
								</div>
							</div>
						</div>";
						
					} else {
						echo "
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='alert alert-danger alert-dismissable' style='width: 250px; margin: 0 auto;'>    <button type='button' class='close' data-dismiss='alert'        aria-hidden='true'>       &times;    </button> You are not logged in! </div>
								<h4 style='text-align: center; margin-top: 20px;'>
									Click <a href='//localhost/ccs-dr/admission/applicant-login'><span>here</span></a>
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