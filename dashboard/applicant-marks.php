<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Applicant Marks</title>";
?>
<script type="text/javascript">
	function add() {
		var elective1 = parseInt (document.getElementById("elective_1").value) || 0;
		var elective2 = parseInt (document.getElementById("elective_2").value) || 0;
		var elective3 = parseInt (document.getElementById("elective_3").value) || 0;
		var elective4 = parseInt (document.getElementById("elective_4").value) || 0;
		var total_mark = document.getElementById("total").value = elective1 + elective2 + elective3 + elective4;
		document.getElementById("aggregate").value = total_mark/4;
	}
</script>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');		
	?>

	<section class="application">
		<div class="container">
		<?php
			$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			if (strpos($url, 'error=empty')!== false) {
				echo "
					<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 20px auto; margin-top: 20px;'>    
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
							&times;
						</button>    
						Fill out all the fields! 
					 </div>";
			} elseif (strpos($url, 'step-two=success')!== false) {
				echo "
					<div class='progress progress-striped' style='width: 80%; margin: 20px auto;'>    
						<div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width: 60%;'>
							<span class='sr-only'>30% Complete (info)</span>2/3   
						</div> 
					</div";
			} 
		?>
			<div class="row">
					<?php
					if(isset($_SESSION['s_id'])) {
						$session = $_SESSION['s_id'];
					    $sql = "SELECT * FROM applicant_marks WHERE applicant_id = '$session'";
					    $result = $conn->query($sql);
					    $row = mysqli_fetch_assoc($result);
					    $applicant_marks_status = $row['s_id'];

					    if($applicant_marks_status < 1) {
							echo"
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='application-section'>
									<form class='form-horizontal' role='form' action='//localhost/ccs-dr/includes/applicant.marks.submit.script.php'  method='POST'>
									<h3>Applicant Marks Details</h3>
									<div class='blue-dash'>
										<span></span>
									</div><br><br>
									<div class='form-group'>
									 	<label class='col-sm-2 control-label'>Elective 1</label>            
										<div class='col-sm-10'>         
											<input type='text' class='form-control' id='elective_1' name='elective_1' onkeyup='add()' required='required'>
										</div>    
									</div>
									<div class='form-group'>
										<label class='col-sm-2 control-label'>Elective 2</label>             
										<div class='col-sm-10'>          
											<input type='text' class='form-control' id='elective_2' name='elective_2' onkeyup='add()' required='required'>
										</div>    
									</div>									 
									<div class='form-group'>
										<label class='col-sm-2 control-label'>Elective 3</label>             
										<div class='col-sm-10'>          
											<input type='text' class='form-control' id='elective_3' name='elective_3' onkeyup='add()' required='required'>
										</div>    
									</div>
									<div class='form-group'>
										<label class='col-sm-2 control-label'>Elective 4</label>             
										<div class='col-sm-10'>          
											<input type='text' class='form-control' id='elective_4' name='elective_4' onkeyup='add()' required='required'>
										</div>    
									</div>
									<div class='form-group'>
										<label class='col-sm-2 control-label'>Total Marks</label>             
										<div class='col-sm-10'>          
											<input type='text' class='form-control' id='total' name='total' >
										</div>    
									</div>
									<div class='form-group'>
										<label class='col-sm-2 control-label'>Aggregate Percentage</label>             
										<div class='col-sm-10'>          
											<input type='text' class='form-control' id='aggregate' name='aggregate' >
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
							header("Location: //localhost/ccs-dr/dashboard/dashboard.php");
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