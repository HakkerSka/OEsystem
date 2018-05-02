<?php
session_start();

if(empty($_SESSION['check']) || !isset($_SESSION['check']))
{
	header("Location = ../index.php");
}
else if($_SESSION['check'] != "infinity")
{
	header("Location = ../index.php");
}
else
{
	require '../config.php';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Examination</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- bOOTSTRAP CSS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<!-- web font -->
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	<script src="../js/jquery.min.js"></script>
	
</head>
<body>

<nav class="navbar navbar-default">
	<div class="conatiner-fluid">
		<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"> </span>
			<span class="icon-bar"> </span>
			<span class="icon-bar"> </span>
		</button>
		<a href="admin_home.php" class="navbar-brand">OEsystem</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-left">

					
					<li class="dropdown"><a href="#" class="dropdown-toggle" id="navbardrop" data-toggle="dropdown">New</a>
						<div class="dropdown-menu">
							<a href="ad_subject.php" class="dropdown-item" style="text-decoration: none; "><input type="button" name="" value="Subject" class="btn btn-default form-control"></a>
							<br>
							
							<a href="#" class="dropdown-item" style="text-decoration: none;"><input type="button" name="" value="Exam" class="btn btn-default form-control"></a>
						</div>	
					</li>
					<li ><a href="userslist.php">Users</a></li>
					<li ><a href="#">Exam results</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php" class="btn btn-default" style="border-color: black;">Signout</a></li>
			</ul>
		</div>
	</div>
</nav>











<script src="../js/bootstrap.min.js"></script>
</body>
</html>

