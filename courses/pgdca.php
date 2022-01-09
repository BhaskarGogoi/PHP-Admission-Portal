<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');;
	echo "<title>PGDCA</title>";
?>

</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
	?>

	<div class="container" style="margin-top: 20px;">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8">
				<div class="courses">
					<div class="courses-title">Post Graduate Diploma in Computer Application (PGDCA)</div>
					<div class="blue-dash">
						<span></span>
					</div><br><br>
					<p><b>Eligibility for Admission:</b> Graduate in any discipline with 45% marks.</p>
					<p><b>Mode of Selection:</b> Merit Basis</p>
					<p><b>Course Duration:</b> One Years</p>
					<p><b>Course Type:</b> Diploma</p>
					<p><b>Admission Fee:</b> Rs. 1000/-</p><br>
					<!-- <p><b>Course Fee Structure:</b></p>
					<table class="table table-striped"> 
						<thead>      
							<tr>          
								<th>Semester</th>          
								<th>Fees</th>      
							</tr>    
						</thead>    
						<tbody>       
							<tr>         
								 <td>First Semester</td>          
								 <td>Rs. 10000/-</td>               
							 </tr>       
							 <tr>         
								 <td>Second Semester</td>          
								 <td>Rs. 10000/-</td>               
							 </tr>
							 <tr>         
								 <td>Third Semester</td>          
								 <td>Rs. 10000/-</td>               
							 </tr>
							 <tr>         
								 <td>Fourth Semester</td>          
								 <td>Rs. 10000/-</td>               
							 </tr>
							 <tr>         
								 <td>Fifth Semester</td>          
								 <td>Rs. 10000/-</td>               
							 </tr>
							 <tr>         
								 <td>Sixth Semester</td>          
								 <td>Rs. 10000/-</td>               
							 </tr>        
						 </tbody> 
					 </table> -->
				</div>
			</div>

			<!--=========== Courses Side Bar ================-->

			<div class="col-lg-4 col-md-4 col-sm-4">
				<div class="courses-sidebar">
					<div class="courses-sidebar-title">
						Other Courses
					</div>
					<div>
						<ul>
							<li><a href="//localhost/ccs-dr/courses/bca.php">BCA</a></li><hr>
							<li><a href="#">PGDCA Distance</a></li><hr>
							<li><a href="//localhost/ccs-dr/courses/6mccca.php">6MCCCA</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/footer.php');
	?>


</body>
</html>