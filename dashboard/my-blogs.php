<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/database_connection.php');
	echo "<title>My Blogs</title>";
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
						$sql = "SELECT * FROM blog WHERE author_type = 'Student' AND id = '$session'";
						$result = $conn->query($sql);
						if (mysqli_num_rows($result) > 0) {
							echo"
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='application-view-section'>
								<table class='table table-striped'> 
									<thead>      
										<tr>          
											<th>Blog ID</th>          
											<th>Blog Title</th>      
											<th>Date</th>      
											<th>Status</th>      
											<th>View</th>      
										</tr>    
									</thead>    
									<tbody>";
										while($row = mysqli_fetch_assoc($result)) {
											echo "<tr>";
				                        	echo "<td>$row[blog_id]</td>";
				                        	echo "<td>$row[blog_title]</td>";
				                        	echo "<td>$row[submit_date]</td>";
				                        	echo "<td>$row[status]</td>";
				                        	echo "<td>
				                        			<form action='//localhost/ccs-dr/dashboard/view-blog' method='POST'>
				                        				<button type='submit' class='btn btn-default' name='submit' value='$row[blog_id]'>View</button>
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
										<h4>No blogs found</h4>
									</div>
								</div>";
							}				
						
					} else {
						echo "
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<div class='alert alert-danger alert-dismissable' style='width: 250px; margin: 0 auto;'>    <button type='button' class='close' data-dismiss='alert'        aria-hidden='true'>       &times;    </button> You are not logged in! </div>
								<h4 style='text-align: center; margin-top: 20px;'>
									Click <a href='//localhost/ccs-dr/student-login'><span>here</span></a>
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