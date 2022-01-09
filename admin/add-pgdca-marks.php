<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Add PGDCA Marks</title>";
?>
<script type="text/javascript">
	function s1_add() {
		var s1_endSemester = parseInt (document.getElementById("s1_endSemester").value) || 0;
		var s1_inSemester = parseInt (document.getElementById("s1_inSemester").value) || 0;
		var total_mark = document.getElementById("s1_total").value = s1_endSemester + s1_inSemester;
	}
	function s2_add() {
		var s2_endSemester = parseInt (document.getElementById("s2_endSemester").value) || 0;
		var s2_inSemester = parseInt (document.getElementById("s2_inSemester").value) || 0;
		var total_mark = document.getElementById("s2_total").value = s2_endSemester + s2_inSemester;
	}
	function s3_add() {
		var s3_endSemester = parseInt (document.getElementById("s3_endSemester").value) || 0;
		var s3_inSemester = parseInt (document.getElementById("s3_inSemester").value) || 0;
		var total_mark = document.getElementById("s3_total").value = s3_endSemester + s3_inSemester;
	}
	function s4_add() {
		var s4_endSemester = parseInt (document.getElementById("s4_endSemester").value) || 0;
		var s4_inSemester = parseInt (document.getElementById("s4_inSemester").value) || 0;
		var total_mark = document.getElementById("s4_total").value = s4_endSemester + s4_inSemester;
	}
	function s5_add() {
		var s5_endSemester = parseInt (document.getElementById("s5_endSemester").value) || 0;
		var s5_inSemester = parseInt (document.getElementById("s5_inSemester").value) || 0;
		var total_mark = document.getElementById("s5_total").value = s5_endSemester + s5_inSemester;
	}
	function s6_add() {
		var s6_endSemester = parseInt (document.getElementById("s6_endSemester").value) || 0;
		var s6_inSemester = parseInt (document.getElementById("s6_inSemester").value) || 0;
		var total_mark = document.getElementById("s6_total").value = s6_endSemester + s6_inSemester;
	}
	function TOTAL() {
		var s1_total = parseInt (document.getElementById("s1_total").value) || 0;
		var s2_total = parseInt (document.getElementById("s2_total").value) || 0;
		var s3_total = parseInt (document.getElementById("s3_total").value) || 0;
		var s4_total = parseInt (document.getElementById("s4_total").value) || 0;
		var s5_total = parseInt (document.getElementById("s5_total").value) || 0;
		var s6_total = parseInt (document.getElementById("s6_total").value) || 0;
		var total2 = document.getElementById("total").value = s1_total + s2_total + s3_total + s4_total + s5_total + s6_total;
		if (total2 >= 180) {
			document.getElementById("res").value = "Pass";
		} else {
			document.getElementById("res").value = "Fail";
		}
	}
</script>
</head>
<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');		
	?>
	<section class="application">
		<div class="container">
			<div class="row">
					<?php
					if(isset($_SESSION['a_id'])) {
						$session = $_SESSION['a_id'];
						include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/admin-navbar.php');

						//Show error/success messages
						$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
						if (strpos($url, 'error=empty')!== false) {
							echo "
								<div class='alert  alert-danger alert-dismissable' style='width: 395px; margin: 20px auto; margin-top: 20px;'>    
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
										&times;
									</button>    
									Fill out all the fields! 
								 </div>";
						} elseif (strpos($url, 'success')!== false) {
							echo "
								<div class='alert  alert-success alert-dismissable' style='width: 395px; margin: 20px auto; margin-top: 20px;'>    
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
										&times;
									</button>    
									Marks successfully addes! 
								 </div>";
						}
						//end show error/success messages

						echo"
							<div class='col-lg-2 col-md-2 col-sm-12'>
								<div class='result-navbar'>
									<ul>
										<a href='//localhost/ccs-dr/admin/view-result'><li>View Result</li></a>
										<a href='//localhost/ccs-dr/admin/add-bca-marks'><li>Add BCA Marks</li></a>
										<a href='//localhost/ccs-dr/admin/add-pgdca-marks'><li class='active'>Add PGDCA Marks</li></a>
									</ul>

								</div>
							</div>
							<div class='col-lg-10 col-md-10 col-sm-12'>
								<div class='application-section'>
									<form class='form-horizontal' role='form' action='//localhost/ccs-dr/includes/add-pgdca-marks-inc.php'  method='POST'>
									<h3>PGDCA Marks Entry</h3>
									<div class='blue-dash'>
										<span></span>
									</div><br><br>
									 <div class='form-group'>
										<label class='col-sm-2 control-label'>Roll No</label>
										<div class='col-sm-10'> 
										 	<input type='text' class='form-control' name='roll_no' required='required' style='max-width: 150px;'>
									 	</div>   
									 </div>
									 <div class='form-group'>
										<label class='col-sm-2 control-label'>Name</label>
										<div class='col-sm-10'> 
										 	<input type='text' class='form-control' name='name' required='required' style='max-width: 200px;'>
									 	</div>   
									 </div>
									 <div class='form-group'>
										<label class='col-sm-2 control-label'>Held in</label>
										<div class='col-sm-10'> 
										 	<input type='date' class='form-control' name='held_in' required='required' style='max-width: 190px;'>
									 	</div>   
									 </div><br><br>
									<table class='table table-striped'> 
										<thead>      
											<tr>          
												<th>Subject</th>          
												<th>End Semester</th>      
												<th>In Semester</th>      
												<th>Total</th>           
											</tr>    
										</thead>    
										<tbody>
											<tr id='tableRow1'>
					                        	<td><input type='text' class='form-control' id='s1' name='s1' readonly='readonly' value='Basic Information Technology'></td>
					                        	<td><input type='text' class='form-control' id='s1_endSemester' name='s1_endSemester' onkeyup='s1_add()' ></td>
					                        	<td><input type='text' class='form-control' id='s1_inSemester' name='s1_inSemester' onkeyup='s1_add()' ></td>
					                        	<td><input type='text' class='form-control' id='s1_total' name='s1_total' readonly='readonly'></td>
											</tr>
											<tr id='tableRow2'>
					                        	<td><input type='text' class='form-control' id='s2' name='s2' readonly='readonly' value='Programming With C'></td>
					                        	<td><input type='text' class='form-control' id='s2_endSemester' name='s2_endSemester' onkeyup='s2_add()' ></td>
					                        	<td><input type='text' class='form-control' id='s2_inSemester' name='s2_inSemester' onkeyup='s2_add()' ></td>
					                        	<td><input type='text' class='form-control' id='s2_total' name='s2_total' readonly='readonly'></td>
											</tr>
											<tr id='tableRow3'>
					                        	<td><input type='text' class='form-control' id='s3' name='s3' readonly='readonly' value='Internet Technology, E-Commerce'></td>
					                        	<td><input type='text' class='form-control' id='s3_endSemester' name='s3_endSemester' onkeyup='s3_add()' ></td>
					                        	<td><input type='text' class='form-control' id='s3_inSemester' name='s3_inSemester' onkeyup='s3_add()' ></td>
					                        	<td><input type='text' class='form-control' id='s3_total' name='s3_total'  readonly='readonly'></td>
											</tr>
											<tr id='tableRow4'>
					                        	<td><input type='text' class='form-control' id='s4' name='s4'  readonly='readonly' value='Relational Database Management System, Using Oracle'></td>
					                        	<td><input type='text' class='form-control' id='s4_endSemester' name='s4_endSemester' onkeyup='s4_add()' ></td>
					                        	<td><input type='text' class='form-control' id='s4_inSemester' name='s4_inSemester' onkeyup='s4_add()' ></td>
					                        	<td><input type='text' class='form-control' id='s4_total' name='s4_total' readonly='readonly'></td>
											</tr>
											<tr id='tableRow5'>
					                        	<td><input type='text' class='form-control' id='s5' name='s5' readonly='readonly' value='Data Communication And Computer Network'></td>
					                        	<td><input type='text' class='form-control' id='s5_endSemester' name='s5_endSemester' onkeyup='s5_add()' ></td>
					                        	<td><input type='text' class='form-control' id='s5_inSemester' name='s5_inSemester' onkeyup='s5_add()' ></td>
					                        	<td><input type='text' class='form-control' id='s5_total' name='s5_total' readonly='readonly'></td>
											</tr>
											<tr id='tableRow6'>
					                        	<td><input type='text' class='form-control' id='s6' name='s6' readonly='readonly' value='Major Project'></td>
					                        	<td><input type='text' class='form-control' id='s6_endSemester' name='s6_endSemester' onkeyup='s6_add()' ></td>
					                        	<td><input type='text' class='form-control' id='s6_inSemester' name='s6_inSemester' onkeyup='s6_add()' ></td>
					                        	<td><input type='text' class='form-control' id='s6_total' name='s6_total' readonly='readonly'></td>
											</tr>			        
										 </tbody> 
									 </table><br><br>
									<div class='form-group'>
										<label class='col-sm-2 control-label'>Total Marks</label>             
										<div class='col-sm-10'>          
											<input type='text' class='form-control' id='total' name='total' onclick='TOTAL()' readonly='readonly'>
										</div>    
									</div>
									<div class='form-group'>
										<label class='col-sm-2 control-label'>Result</label>             
										<div class='col-sm-10'>          
											<input type='text' class='form-control' id='res' name='res' readonly='readonly'>
										</div>    
									</div><br><br>   
									<div class='form-group'>       
										<div class='col-sm-12'>          
											<button type='submit' class='btn btn-primary' name='submit'>Submit</button>
											<button type='reset' class='btn btn-default' >Reset</button>    
										</div>    
									</div>
								</form>
								</div>
							</div>";						
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