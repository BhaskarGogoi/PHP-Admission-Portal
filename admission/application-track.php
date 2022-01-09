<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>Application Track</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
	?>

	<section class="appTrack">
		<div class="container">
			<div class="row">
					<?php
					if(isset($_SESSION['applicant_id'])) {
						$session = $_SESSION['applicant_id'];
                        $sql = "SELECT * FROM application_status WHERE applicant_id = '$session'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_assoc($result); 
                        $rejected_reason = $row['rejected_reason'];
						echo "
						<div class='col-lg-12 col-md-12 col-sm-12'>
							<div class='track-section'>
								<h3>Application Track</h3>
								<div class='blue-dash'>
									<span></span>
								</div><br><br>
								<div class='application_track'>
									<table class='table  table-condensed'> 
										<thead>      
											<tr>          
												<th>Application ID</th>          
												<th>Status</th>      
												<th>Submit Date</th>";
												if($rejected_reason == 0) {

												} else {
													echo "<th>Rejected Reason</th>";
													echo "<th>Rejected Date</th>";
												}     
												      
									   echo  "</tr>    
										</thead>    
										<tbody>       
											<tr>         
												 <td>$row[application_id]</td>               
												 <td>$row[application_status]</td>          
												 <td>$row[submit_date]</td> ";

												 if($rejected_reason == 0) {

												 } else {
												 	echo "<td>$row[rejected_reason]</td>";
												 	echo "<td>$row[verify_date]</td>";
												 }        
          
										echo" </tr>         
										 </tbody> 
									 </table>
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