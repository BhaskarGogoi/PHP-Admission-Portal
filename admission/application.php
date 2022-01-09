<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Application</title>";
?>
<script type="text/javascript">
	//enable/disable submit button
	function ch() {
		var v = document.getElementById('checkBox').checked;
		var button = document.getElementById("submitButton");
		if (v == true) {
			document.getElementById("submitButton").disabled = false;
		} 
		else if (v == false) {
			document.getElementById("submitButton").disabled = true;
		}
	}
</script>
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
					if(isset($_SESSION['applicant_id'])) {
						$session = $_SESSION['applicant_id'];
					    $sql = "SELECT * FROM applications WHERE applicant_id = '$session'";
					    $result = $conn->query($sql);
					    $row = mysqli_fetch_assoc($result);
					    $application_apply_status = $row['applicant_id'];

					    if ($application_apply_status < 1) {
					    	echo"
								<div class='col-lg-12 col-md-12 col-sm-12'>
									<div class='application-section'>
										<form class='form-horizontal' role='form' action='//localhost/ccs-dr/admission/includes/application.submit.script.php'  method='POST'>
											<h3>Course Details</h3>
											<div class='blue-dash'>
												<span></span>
											</div><br><br>
											<div class='form-group'>
											 	<label class='col-sm-2 control-label'>Apply For <span class='redStar'>*</span></label>            
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
											 	<label class='col-sm-2 control-label'>First Name <span class='redStar'>*</span></label>            
												<div class='col-sm-10'>         
													<input type='text' class='form-control' id='firstname' name='firstname' placeholder='First Name' required='reduired'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Last Name <span class='redStar'>*</span></label>             
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='lastname' name='lastname' placeholder='Last Name' required='reduired'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Father's Name <span class='redStar'>*</span></label>             
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='fathersname' name='fathersname' placeholder='Fathers Name' required='reduired'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Mother's Name <span class='redStar'>*</span></label>            
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='username' name='mothersname' placeholder='Mothers Name' required='reduired'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Gender <span class='redStar'>*</span></label>            
												<div class='col-sm-10'>          
												  <input type='radio' name='gender' value='Male' required='reduired'> Male<br>
												  <input type='radio' name='gender' value='Female' required='reduired'> Female<br>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Date of birth <span class='redStar'>*</span></label>            
												<div class='col-sm-10'>          
												 	<input type='date' class='form-control' id='dob' name='dob' placeholder='Date of birth' required='reduired'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Religion <span class='redStar'>*</span></label>            
												<div class='col-sm-10'>          
												 	<input type='text' class='form-control' id='religion' name='religion' placeholder='Religion' required='reduired'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Caste <span class='redStar'>*</span></label>            
												<div class='col-sm-10'>          
												 	<input type='radio' name='caste' value='General' required='reduired'> General<br>
												  	<input type='radio' name='caste' value='OBC' required='reduired'> OBC<br>
												  	<input type='radio' name='caste' value='MOBC' required='reduired'> MOBC<br>
												  	<input type='radio' name='caste' value='SC' required='reduired'> SC<br>
												  	<input type='radio' name='caste' value='ST' required='reduired'> ST<br>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Nationality <span class='redStar'>*</span></label>            
												<div class='col-sm-10'>          
												 	<input type='text' class='form-control' id='nationality' name='nationality' placeholder='Nationality' required='reduired'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Person with disability <span class='redStar'>*</span></label>            
												<div class='col-sm-10'>          
												 	<input type='radio' name='PhysicallyHandicappe' value='Yes' required='reduired'> Yes<br>
												  	<input type='radio' name='PhysicallyHandicappe' value='No' required='reduired'> No<br>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Phone No. <span class='redStar'>*</span></label>            
												<div class='col-sm-10'>          
												 	<input type='text' class='form-control' id='phNo' name='phNo' placeholder='Phone No.' required='reduired'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Parents/Guardian Phone No. <span class='redStar'>*</span></label>            
												<div class='col-sm-10'>          
											 	<input type='text' class='form-control' id='g_phNo' name='g_phNo' placeholder='Parents/Guardian Phone No.' required='reduired'>
												</div>    
											</div><br>

											<h3>Address</h3>
											<div class='blue-dash'>
												<span></span>
											</div><br><br>
											 <div class='form-group'>
												<label class='col-sm-2 control-label'>Locality/Street <span class='redStar'>*</span></label>             
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='locality' name='locality' placeholder='Locality' required='reduired'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>City/Village <span class='redStar'>*</span></label>             
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='city_village' name='city_village' placeholder='City/Village' required='reduired'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>District <span class='redStar'>*</span></label>             
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='district' name='district' placeholder='District' required='reduired'>
												</div>    
											</div>
											<div class='form-group'>
												<label class='col-sm-2 control-label'>State <span class='redStar'>*</span></label>             
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='state' name='state' placeholder='State' required='reduired'>
												</div>    
											</div> 
											<div class='form-group'>
												<label class='col-sm-2 control-label'>Pincode <span class='redStar'>*</span></label>             
												<div class='col-sm-10'>          
													<input type='text' class='form-control' id='pincode' name='pincode' placeholder='Pincode' required='reduired'>
												</div>    
											</div><br><br>
											<div class='form-group'>       
												<div class='col-sm-12'>          
													<input type='checkBox' id='checkBox' onclick='ch()'>
													I'm confirming that the details entered in this form are correct.    
												</div>    
											</div>   
											<div class='form-group'>       
												<div class='col-sm-12'>          
													<button type='submit' id = 'submitButton' class='btn btn-primary' name='submit' disabled='disbled'>Submit</button>    
												</div>    
											</div>
										</form><br><br>
										<span class='redStar'>*</span> fields are mandatory<br><br>
										<span><b>Note:</b> Details cannot be changed after submit. Perform a double check before submit.</span>
									</div>
								</div>";
					    } else {
					    	header("Location: //localhost/ccs-dr/admission/applicant-image-upload");
					    }
						
						
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