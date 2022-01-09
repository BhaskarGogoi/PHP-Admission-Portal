<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Result</title>";
?>
<script type="text/javascript">
	function selectCourse() {
		var semester = document.getElementById("semester");
		semester.style.display = '';
		var sem = document.getElementById("Semester");
		sem.style.display = '';

		var course = document.getElementById("course").value;
		if(course == "PGDCA") {
			var semester = document.getElementById("semester");
			semester.style.display = 'none';
			var sem = document.getElementById("Semester");
			sem.style.display = 'none';
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

						echo"
							<div class='col-lg-2 col-md-2 col-sm-12'>
								<div class='result-navbar'>
									<ul>
										<a href='//localhost/ccs-dr/admin/view-result'><li class='active'>View Result</li></a>
										<a href='//localhost/ccs-dr/admin/add-bca-marks'><li>Add BCA Marks</li></a>
										<a href='//localhost/ccs-dr/admin/add-pgdca-marks'><li>Add PGDCA Marks</li></a>
									</ul>

								</div>
							</div>
							<div class='col-lg-10 col-md-10 col-sm-12'>
								<div class='application-section'>
									<form class='form-horizontal' role='form' action='//localhost/ccs-dr/admin/view-result.php'  method='POST'>
									<h3>View Result</h3>
									<div class='blue-dash'>
										<span></span>
									</div><br><br>
									<div class='form-group'>
										<label class='col-sm-2 control-label'>Course</label>
										<div class='col-sm-10'> 
										 	<select class='form-control' name='course' style='max-width: 150px;' required='required' id='course' onchange='selectCourse()'>
										 		<option value=''></option>
										 		<option value='BCA'>BCA</option>
										 		<option value='PGDCA'>PGDCA</option>
										 	</select>
									 	</div>   
									 </div>
									<div class='form-group'>
										<label class='col-sm-2 control-label' id='Semester'>Semester</label>
										<div class='col-sm-10'> 
										 	<select class='form-control' name='semester' id='semester' style='max-width: 150px;'>
										 		<option value=''></option>
										 		<option value='First'>First</option>
										 		<option value='Second'>Second</option>
										 		<option value='Third'>Third</option>
										 		<option value='Fourth'>Fourth</option>
										 		<option value='Fifth'>Fifth</option>
										 		<option value='Sixth'>Sixth</option>
										 	</select>
									 	</div>   
									 </div>
									 <div class='form-group'>
										<label class='col-sm-2 control-label'>Roll No</label>
										<div class='col-sm-10'> 
										 	<input type='text' class='form-control' name='roll_no' required='required' style='max-width: 150px;'>
									 	</div>   
									 </div>  
									<div class='form-group'>       
										<div class='col-sm-12'>          
											<button type='submit' class='btn btn-primary' name='submit'>Submit</button>    
										</div>    
									</div>
								</form>";
								if (isset($_POST['submit'])) {
									$course = $_POST['course'];
					
									if ($course == 'BCA') {
										$semester =  $_POST['semester'];
										$roll_no =  $_POST['roll_no'];
										$sql = "SELECT * FROM result_bca WHERE roll_no = '$roll_no' AND semester = '$semester'";
				                        $result = $conn->query($sql);
				                        $row = mysqli_fetch_assoc($result);
				                        $name = $row['name'];


				                        if($semester == "First") {
				                        	if (mysqli_num_rows($result) > 0) {
					                        echo" 
					                        <div class= 'result-info'>
					                        	<h3>Roll No: $row[roll_no]</h3>
					                        	<h3>Name: $row[name]</h3>
					                        	<h3>Semester: $row[semester]</h3>
					                        	<h3>Held In: $row[held_in]</h3>
					                        </div>
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
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_1]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_endSem]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_inSem]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_total]'></td>
													</tr>
													<tr id='tableRow2'>
							                        	<td><input type='text' class='form-control' value='$row[subject_2]' readonly='readonly'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_total]'></td>
													</tr>
													<tr id='tableRow3'>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly'value='$row[subject_3_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3_total]'></td>
													</tr>
													<tr id='tableRow4'>
							                        	<td><input type='text' class='form-control'   readonly='readonly' value='$row[subject_4]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_4_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_4_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_4_total]'></td>
													</tr>
													<tr id='tableRow5'>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_endSem]' ></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_inSem]' ></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_total]'></td>
													</tr>
													<tr id='tableRow6'>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_6]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_6_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_6_inSem]' ></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_6_total]'></td>
													</tr>
																        
												 </tbody>
											 </table>
											 <div class= 'result-info'>
					                        	<h3>Total Marks: $row[total_marks]</h3>
					                        	<h3>Result: $row[result]</h3>
					                        </div>";
					                    } else {
				                    		echo"No Results Found";
				                    	}
									} elseif ($semester == "Second") {
										if (mysqli_num_rows($result) > 0) {
											echo" 
											 <div class= 'result-info'>
					                        	<h3>Roll No: $row[roll_no]</h3>			           
					                        	<h3>Name: $row[name]</h3>        	
					                        	<h3>Semester: $row[semester]</h3>
					                        	<h3>Held In: $row[held_in]</h3>
					                        </div>
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
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_1]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_endSem]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_inSem]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_total]'></td>
													</tr>
													<tr id='tableRow2'>
							                        	<td><input type='text' class='form-control' value='$row[subject_2]' readonly='readonly'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_total]'></td>
													</tr>
													<tr id='tableRow3'>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly'value='$row[subject_3_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3_total]'></td>
													</tr>
													<tr id='tableRow4'>
							                        	<td><input type='text' class='form-control'   readonly='readonly' value='$row[subject_4]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_4_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_4_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_4_total]'></td>
													</tr>
													<tr id='tableRow5'>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_endSem]' ></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_inSem]' ></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_total]'></td>
													</tr>
													<tr id='tableRow6'>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_6]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_6_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_6_inSem]' ></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_6_total]'></td>
													</tr>													        
												 </tbody> 
											 </table>
											 <div class= 'result-info'>
					                        	<h3>Total Marks: $row[total_marks]</h3>
					                        	<h3>Result: $row[result]</h3>
					                        </div>";
				                    	} else {
				                    		echo"No Results Found";
				                    	}
									} elseif ($semester == "Third") {
										if (mysqli_num_rows($result) > 0) {
											echo" 
											 <div class= 'result-info'>
					                        	<h3>Roll No: $row[roll_no]</h3>			       
					                        	<h3>Name: $row[name]</h3>          	
					                        	<h3>Semester: $row[semester]</h3>
					                        	<h3>Held In: $row[held_in]</h3>
					                        </div>
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
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_1]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_endSem]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_inSem]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_total]'></td>
													</tr>
													<tr id='tableRow2'>
							                        	<td><input type='text' class='form-control' value='$row[subject_2]' readonly='readonly'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_total]'></td>
													</tr>
													<tr id='tableRow3'>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly'value='$row[subject_3_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3_total]'></td>
													</tr>
													<tr id='tableRow4'>
							                        	<td><input type='text' class='form-control'   readonly='readonly' value='$row[subject_4]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_4_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_4_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_4_total]'></td>
													</tr>
													<tr id='tableRow5'>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_endSem]' ></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_inSem]' ></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_total]'></td>
													</tr>
													<tr id='tableRow6'>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_6]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_6_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_6_inSem]' ></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_6_total]'></td>
													</tr>													        
												 </tbody> 
											 </table>
											 <div class= 'result-info'>
					                        	<h3>Total Marks: $row[total_marks]</h3>
					                        	<h3>Result: $row[result]</h3>
					                        </div>";
				                    	} else {
				                    		echo"No Results Found";
				                    	}
									} elseif ($semester == "Fourth") {
										if (mysqli_num_rows($result) > 0) {
											echo" 
											 <div class= 'result-info'>
					                        	<h3>Roll No: $row[roll_no]</h3>
					                        	<h3>Name: $row[name]</h3>                        	
					                        	<h3>Semester: $row[semester]</h3>
					                        	<h3>Held In: $row[held_in]</h3>
					                        </div>
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
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_1]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_endSem]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_inSem]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_total]'></td>
													</tr>
													<tr id='tableRow2'>
							                        	<td><input type='text' class='form-control' value='$row[subject_2]' readonly='readonly'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_total]'></td>
													</tr>
													<tr id='tableRow3'>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly'value='$row[subject_3_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3_total]'></td>
													</tr>
													<tr id='tableRow4'>
							                        	<td><input type='text' class='form-control'   readonly='readonly' value='$row[subject_4]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_4_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_4_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_4_total]'></td>
													</tr>
													<tr id='tableRow5'>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_endSem]' ></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_inSem]' ></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_total]'></td>
													</tr>													        
												 </tbody> 
											 </table>
											 <div class= 'result-info'>
					                        	<h3>Total Marks: $row[total_marks]</h3>
					                        	<h3>Result: $row[result]</h3>
					                        </div>";
				                    	} else {
				                    		echo"No Results Found";
				                    	}
									} elseif ($semester == "Fifth") {
										if (mysqli_num_rows($result) > 0) {
											echo" 
											 <div class= 'result-info'>
					                        	<h3>Roll No: $row[roll_no]</h3>
					                        	<h3>Name: $row[name]</h3>
					                        	<h3>Semester: $row[semester]</h3>
					                        	<h3>Held In: $row[held_in]</h3>
					                        </div>
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
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_1]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_endSem]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_inSem]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_total]'></td>
													</tr>
													<tr id='tableRow2'>
							                        	<td><input type='text' class='form-control' value='$row[subject_2]' readonly='readonly'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_total]'></td>
													</tr>
													<tr id='tableRow3'>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly'value='$row[subject_3_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3_total]'></td>
													</tr>
													<tr id='tableRow4'>
							                        	<td><input type='text' class='form-control'   readonly='readonly' value='$row[subject_4]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_4_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_4_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_4_total]'></td>
													</tr>												        
												 </tbody> 
											 </table>
											 <div class= 'result-info'>
					                        	<h3>Total Marks: $row[total_marks]</h3>
					                        	<h3>Result: $row[result]</h3>
					                        </div>";
				                    	} else {
				                    		echo"No Results Found";
				                    	}
									} elseif ($semester == "Sixth") {
										if (mysqli_num_rows($result) > 0) {
											$sql2 = "SELECT * FROM result_bca WHERE roll_no = '$roll_no' AND name = '$name'";
					                        $result2 = $conn->query($sql2);
											while($row2 = mysqli_fetch_assoc($result2)) {
												$t = $row2['total_marks'];
												$a[] = $t;
											}
											$oT = array_sum($a);
											$aggregate_per = $oT/31;
											$agg = number_format((float)$aggregate_per, 2, '.', ''); 
											echo" 
											 <div class= 'result-info'>
					                        	<h3>Roll No: $row[roll_no]</h3>			                 
					                        	<h3>Name: $row[name]</h3>
					                        	<h3>Semester: $row[semester]</h3>
					                        	<h3>Held In: $row[held_in]</h3>
					                        </div>
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
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_1]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_endSem]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_inSem]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_total]'></td>
													</tr>						        
												 </tbody> 
											 </table>
											 <div class= 'result-info'>
					                        	<h3>Total Marks: $row[total_marks]</h3>
					                        	<h3>Result: $row[result]</h3><br><br>
					                        	<h3>Overall Total: $oT/3100</h3>
					                        	<h3>Aggregate Percentage: $agg</h3>
					                        </div>";
				                    	} else {
				                    		echo"No Results Found";
				                    	}
									} 									
								} elseif ($course == 'PGDCA')  {
										$roll_no =  $_POST['roll_no'];
										$sql = "SELECT * FROM result_pgdca WHERE roll_no = '$roll_no'";
				                        $result = $conn->query($sql);
				                        $row = mysqli_fetch_assoc($result);

				                        	if (mysqli_num_rows($result) > 0) {
					                        echo" 
					                        <div class= 'result-info'>
					                        	<h3>Roll No: $row[roll_no]</h3>
					                        	<h3>Name: $row[name]</h3>
					                        	<h3>Held In: $row[held_in]</h3>
					                        </div>
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
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_1]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_endSem]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_inSem]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_1_total]'></td>
													</tr>
													<tr id='tableRow2'>
							                        	<td><input type='text' class='form-control' value='$row[subject_2]' readonly='readonly'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_2_total]'></td>
													</tr>
													<tr id='tableRow3'>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly'value='$row[subject_3_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_3_total]'></td>
													</tr>
													<tr id='tableRow4'>
							                        	<td><input type='text' class='form-control'   readonly='readonly' value='$row[subject_4]'></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_4_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_4_inSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_4_total]'></td>
													</tr>
													<tr id='tableRow5'>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_endSem]' ></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_inSem]' ></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_5_total]'></td>
													</tr>
													<tr id='tableRow6'>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_6]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_6_endSem]'></td>
							                        	<td><input type='text' class='form-control' readonly='readonly' value='$row[subject_6_inSem]' ></td>
							                        	<td><input type='text' class='form-control'  readonly='readonly' value='$row[subject_6_total]'></td>
													</tr>
																        
												 </tbody>
											 </table>
											 <div class= 'result-info'>
					                        	<h3>Total Marks: $row[total_marks]</h3>
					                        	<h3>Result: $row[result]</h3>
					                        </div>";
					                    } else {
				                    		echo"No Results Found";
				                    	}}
							}								
								echo" </div>
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