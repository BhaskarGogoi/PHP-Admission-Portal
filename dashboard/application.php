<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Application</title>";
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
					    $sql = "SELECT * FROM applications WHERE applicant_id = '$session'";
					    $result = $conn->query($sql);
					    $row = mysqli_fetch_assoc($result);
					    $application_apply_status = $row['s_id'];

					    if ($application_apply_status < 1) {
					    	echo"
								<div class='col-lg-12 col-md-12 col-sm-12'>
									<div class='application-section'>
										<form class='form-horizontal' role='form' action='//localhost/ccs-dr/includes/application.submit.script.php'  method='POST'>
											<h3>Course Details</h3>
											<div class='blue-dash'>
												<span></span>
											</div><br><br>
											<div class='form-group'>
											 	<label class='col-sm-2 control-label'>Apply For</label>            
												<div class='col-sm-10'>         
													<input type='radio' name='course' value='BCA'> BCA<br>
													<input type='radio' name='course' value='PGDCA'> PGDCA<br>
												  <input type='radio' name='course' value='DCA'> DCA<br>
												</div>    
											</div><br>
											<h3>Personal Details</h3>
											<div class='blue-dash'>
												<span></span>
											</div><br><br>
											<div class='form-group'>
											 	<label class='col-sm-2 control-label'>First Name</label>            
												<div class='col-sm-10'>         
													<input type='text' class='form-control' id='firstname' name='firstname' placeholder='First Name'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Last Name</label>             
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='lastname' name='lastname' placeholder='Last Name'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Father's Name</label>             
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='fathersname' name='fathersname' placeholder='Fathers Name'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Mother's Name</label>            
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='username' name='mothersname' placeholder='Mothers Name'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Gender</label>            
												<div class='col-sm-10'>          
												  <input type='radio' name='gender' value='Male'> Male<br>
												  <input type='radio' name='gender' value='Female'> Female<br>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Date of birth</label>            
												<div class='col-sm-10'>          
												 	<input type='date' class='form-control' id='dob' name='dob' placeholder='Date of birth'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Religion</label>            
												<div class='col-sm-10'>          
												 	<input type='text' class='form-control' id='religion' name='religion' placeholder='Religion'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Caste</label>            
												<div class='col-sm-10'>          
												 	<input type='radio' name='caste' value='General'> General<br>
												  	<input type='radio' name='caste' value='OBC'> OBC<br>
												  	<input type='radio' name='caste' value='MOBC'> MOBC<br>
												  	<input type='radio' name='caste' value='SC'> SC<br>
												  	<input type='radio' name='caste' value='ST'> ST<br>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Nationality</label>            
												<div class='col-sm-10'>          
												 	<input type='text' class='form-control' id='nationality' name='nationality' placeholder='Nationality'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Person with disability</label>            
												<div class='col-sm-10'>          
												 	<input type='radio' name='PhysicallyHandicappe' value='Yes'> Yes<br>
												  	<input type='radio' name='PhysicallyHandicappe' value='No'> No<br>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Phone No.</label>            
												<div class='col-sm-10'>          
												 	<input type='text' class='form-control' id='phNo' name='phNo' placeholder='Phone No.'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Parents/Guardian Phone No.</label>            
												<div class='col-sm-10'>          
											 	<input type='text' class='form-control' id='g_phNo' name='g_phNo' placeholder='Parents/Guardian Phone No.'>
												</div>    
											</div><br>

											<h3>Address</h3>
											<div class='blue-dash'>
												<span></span>
											</div><br><br>
											 <div class='form-group'>
												<label class='col-sm-2 control-label'>Locality/Street</label>             
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='locality' name='locality' placeholder='Locality'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>City/Village</label>             
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='city_village' name='city_village' placeholder='City/Village'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>District</label>             
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='district' name='district' placeholder='District'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>State</label>             
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='state' name='state' placeholder='State'>
												</div>    
											</div> 
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Pincode</label>             
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='pincode' name='pincode' placeholder='Pincode'>
												</div>    
											</div><br><br>    
											<div class='form-group'>       
												<div class='col-sm-12'>          
													<button type='submit' class='btn btn-primary' name='submit'>Submit</button>    
												</div>    
											</div>
										</form>
									</div>
								</div>";
					    } else {
					    	header("Location: //localhost/ccs-dr/dashboard/applicant-image-upload.php");
					    }
						
						
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