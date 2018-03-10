<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Examination</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<!-- bOOTSTRAP CSS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<!-- web font -->
	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">

	<style type="text/css">
		body {
			background-image: url("../images/main_back.jpg");
			background-repeat: no-repeat;

		}
	</style>
</head>
<body>


		<div class="col-md-4 col-md-offset-4"
		<div class="container-fluid">
			<div class="panel panel-default">
					<div class="panel-heading">
						<h3 align="center">Online Examination System</h3>
					</div>	
					<div class="panel-body">
						<form method="post" action="login_validate.php">
							
							<div class="form-group">
								<label class="col-md-4">Mobile :</label>
								<div class="col-md-8">
									<input type="number" name="tf1" placeholder="Enter your Mobile Number" class="form-control" required>
									<br>
								</div>
							</div>

							<div class="form-grou"p>
								<label class="col-md-4">Password :</label>
								<div class="col-md-8">
									<input type="textfield" name="tf2" placeholder="Enter your Password" class="form-control" required>
									<br>
								</div>
							</div>


							<div class="form-group">
									<div class="col-md-12" align="center">
										<input type="submit" name="tf8" class="btn btn-default" value="Submit" >
										<a href="../index.html" style="float:right;">Don't have account?</a>
										<br>
									</div>
							</div>


						</form>
					</div>	
			</div>
		</div>
	</div>
	
	

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>


</body>
</html>