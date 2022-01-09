<?php
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Payment Receipt</title>";
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
					if(isset($_SESSION['s_id'])) {
						$session = $_SESSION['s_id'];
                        $sql = "SELECT * FROM semester_fees WHERE s_id = '$session'";
                        $result = $conn->query($sql);
                        if (mysqli_num_rows($result) > 0) {
                        	echo "
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='application-view-section'>
									<div class='application-summary'>
									<h3>Payment Receipts</h3>
									<div class='blue-dash'>
										<span></span>
									</div><br><br>
									<table class='table table-striped'> 
										<thead>      
											<tr>          
												<th>Transaction ID</th>          
												<th>Roll No</th>      
												<th>Name</th>      
												<th>Semester</th>      
												<th>Amount</th>      
												<th>Payment Date</th>      
												<th>Download</th>      
											</tr>    
										</thead>    
										<tbody>       
											<tr>";
											while($row = mysqli_fetch_assoc($result)) {
												echo"       
												 <td>$row[transaction_id]</td>          
												 <td>$row[roll_no]</td>               
												 <td>$row[student_name]</td>               
												 <td>$row[semester]</td>               
												 <td>$row[amount]</td>               
												 <td>$row[payment_date]</td>              
												 <td>
												 <form action='//localhost/ccs-dr/includes/semester-fee-payment-receipts.php' method='POST'>
												 	<input type='hidden' name='tran_id' value='$row[transaction_id]'>	
												 	<button type='submit' name='submit' value='$row[s_id]'>Download</button>
												 </form></td>              
											 </tr>";
											} echo"   
										 </tbody> 
									 </table>					
									</div>
								</div>
							</div>";
                        	
                        } else {
                        	echo"
                        	<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='application-view-section'>
									<div class='application-summary'>
										No Receipts Found!
									</div>
								</div>
							</div>";
                        }
						
					} else {
						echo "
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='alert alert-danger alert-dismissable' style='width: 250px; margin: 0 auto;'><button type='button' class='close' data-dismiss='alert'        aria-hidden='true'>&times;</button> You are not logged in! </div>
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