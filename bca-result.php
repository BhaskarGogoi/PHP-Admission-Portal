<?php

	include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/header.php');
	echo "<title>BCA Result</title>";
?>
<style type="text/css">
	.Table {
		width: 100%;
	}
	.Table td {
		text-align: center;
		padding: 10px;
	}
	.Table th {
		text-align: center;
		padding: 10px;
	}
</style>
</head>

<body>
	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/nav.php');
	?>

	<div class="container" style="margin-top: 20px;">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="blog-single">
					<div class="blog-breadcum-title">Latest BCA result</div>
					<div class="blue-dash">
						<span></span>
					</div><br><br>
					<h3><b>Center Code:</b> 301 DR College</h3><br>
					<h4><b>Fourth Semester</b></h4><br>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<table  class='Table' border="1">
						  <tr>
						    <th colspan="2">Male</th>
						  </tr>
						  <tr>
						    <td>Appeared 5</td>
						    <td>Pass 5</td>
						  </tr>
						</table>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<table class='Table' border="1">
						  <tr>
						    <th colspan="2">Female</th>
						  </tr>
						  <tr>
						    <td>Appeared 4</td>
						    <td>Pass 4</td>
						  </tr>
						</table>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<table  class='Table' border="1">
						  <tr>
						    <th colspan="2">Total</th>
						  </tr>
						  <tr>
						    <td>Appeared 9</td>
						    <td>Pass 9</td>
						  </tr>
						</table>
					</div>
					..	
				</div>
			</div>
		</div>
	</div>

	<?php
		include($_SERVER['DOCUMENT_ROOT'].'/ccs-dr/includes/footer.php');
	?>


</body>
</html>