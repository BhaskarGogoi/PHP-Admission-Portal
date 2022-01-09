<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Student Entry</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
	?>

	<section class="dashboard">
		<div class="container">
			<div class="row">
					<?php
						$sql = "SELECT * FROM application_status WHERE application_status='Short Listed'";
                        $result = $conn->query($sql);

						if(isset($_SESSION['a_id'])) { 
						include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/admin-navbar.php');
							if (mysqli_num_rows($result) > 0) {
	                        	echo                        
		                    	"<div class='col-lg-12 col-md-12 col-sm-12'>
									<div class='application-view-section'>
									<table class='table table-striped'> 
										<thead>      
											<tr>          
												<th>App. ID</th>               
												<th>Name</th>
												<th>View</th>      
												<th>Enter Roll No</th>           
											</tr>    
										</thead>    
										<tbody>";
											while($row = mysqli_fetch_assoc($result)) {
												echo "<tr>";
					                        	echo "<td>$row[application_id]</td>";
					                        	echo "<td>$row[firstname] $row[lastname]</td>";
					                        	echo "<td>
					                        			<form action='//localhost/ccs-dr/admin/view-application.php' method='POST'>
					                        				<button type='submit' class='btn btn-default' name='submit' value='$row[application_id]'>View</button>
					                        			</form>
					                        		</td>";
					                        	echo "<td>
					                        			<form action='//localhost/ccs-dr/includes/enroll.php' method='POST'>
					                        				<input type='text' name='roll_no' required='required'>
					                        				<button type='submit' class='btn btn-default' name='submit' value='$row[application_id]'>Enroll</button>
					                        			</form>
					                        		</td>";
												echo "</tr>";
					                    	}
					                    	echo"        
										 </tbody> 
									 </table> 
									</div>
								</div>"; 
							} else {
								echo                        
		                    	"<div class='col-lg-12 col-md-12 col-sm-12'>
									<div class='application-view-section'>
										<h4>No accepted applications found</h4>
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