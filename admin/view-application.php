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
					if(isset($_SESSION['a_id'])) {

						if (isset($_POST['submit'])) {
							$app_id =  $_POST['submit'];

							//getting information from application table
							$sql = "SELECT * FROM applications WHERE application_id = '$app_id'";
	                        $result = $conn->query($sql);
	                        $row = mysqli_fetch_assoc($result);

	                        //getting information from applicant_marks table
							$sql2 = "SELECT * FROM applicant_marks WHERE application_id = '$app_id'";
	                        $result2 = $conn->query($sql2);
	                        $row2 = mysqli_fetch_assoc($result2);

	                       	
							echo "
							<div class='col-lg-9 col-md-9 col-sm-12'>
								<div class='application-view-section'>
									<div class='application-summary'>
										<form class='form-horizontal' role='form' action='includes/application.submit.script.php'  method='POST'>
										<h3>Personal Details</h3>
										<div class='blue-dash'>
											<span></span>
										</div><br><br>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Course</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[course]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>First Name</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[first_name]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Last Name</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[last_name]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Fathers Name</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[fathers_name]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Mothers Name</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[mothers_name]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Gender</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[gender]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Date of birth</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[dob]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Religion</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[religion]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Caste</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[caste]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Nationality</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[nationality]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Person with disability</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[handicappe]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Phone No.</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[ph_no]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Guardian Phone No.</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[guardian_ph_no]' disabled='disabled'>
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
												<input type='text' class='form-control' placeholder='$row[locality]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>City/Village</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[city_village]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>District</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[district]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>State</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[state]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Pincode</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row[pincode]' disabled='disabled'>
											</div>    
										</div><br>


										<h3>Marks</h3>
										<div class='blue-dash'>
											<span></span>
										</div><br><br>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Elective 1</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row2[elective_1]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Elective 2</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row2[elective_2]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Elective 3</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row2[elective_3]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Elective 4</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row2[elective_4]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Total Marks</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row2[total_marks]' disabled='disabled'>
											</div>    
										</div>
										<div class='form-group'>
										 	<label class='col-sm-2 control-label'>Aggregate Percentage</label>            
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='$row2[aggregate_percentage]' disabled='disabled'>
											</div>    
										</div><br>
									</form>						
									</div>
								</div>
							</div>
							<div class='col-lg-3 col-md-3 col-sm-12'>
								<div class='application-image-view'>
									<div class='applicant-image'>
										<img src = '//localhost/ccs-dr/img/students-image/applicant_image$app_id.jpg'>
									</div>
								</div>
							</div>";}

							//accept or reject
							$sql = "SELECT * FROM application_status WHERE application_id = $app_id";
                        	$result = $conn->query($sql);
                        	$row = mysqli_fetch_assoc($result);
                        	$status = $row['application_status'];
                        	if($status == 'Accepted' || $status == 'Rejected') 
                        	{
                        		echo "<div class='col-lg-9 col-md-9 col-sm-12'>
									<div class='application-view-section'>
										<form>
											<div class='col-sm-10'>         
												<input type='text' class='form-control' placeholder='This application is already $status' disabled='disabled'>
											</div> 
	                        			</form><br>
									</div>
								</div>";
                        	} else {
                        		echo "
								<div class='col-lg-9 col-md-9 col-sm-12'>
									<div class='application-view-section'>
										<form action='//localhost/ccs-dr/includes/application-accept-reject.php.' method='POST' style='display: inline'>
											<input type='hidden' name='app_id' value='$app_id'/>
	                        				<button type='submit' class='btn btn-success' name='status' value='Accepted'>Accept</button> &nbsp; &nbsp;
	                        			</form>
	                        			<form action='//localhost/ccs-dr/includes/application-accept-reject.php.' method='POST' style='display: inline;'>
											<input type='hidden' name='app_id' value='$app_id'/>
	                        				<button type='submit' class='btn btn-danger' name='status' value='Rejected'>Reject</button><br><br>
	                        				<h5>If rejected state the reason below.</h5>
	                        				<input type='text' name= 'rejected_reason' required = 'required' style='width: 100%;'/>
	                        			</form>
									</div>
								</div>";
                        	}

					} else {
						echo "
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='alert alert-danger alert-dismissable' style='width: 250px; margin: 0 auto;'>    <button type='button' class='close' data-dismiss='alert'        aria-hidden='true'>       &times;    </button> You are not logged in! </div>
								<h4 style='text-align: center; margin-top: 20px;'>
									Click <a href='//localhost/ccs-dr/admin/login'><span>here</span></a>
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