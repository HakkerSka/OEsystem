<?php 

    session_start();

    if(!$_SESSION['mobile'])
    {
        header("Location = ../php/login.php");
    }

/*	echo "Welcome !!!";
    echo $_SESSION['fullname'].'<br>';
    echo $_SESSION['mobile'].'<br>';
    echo $_SESSION['email'].'<br>';
    echo $_SESSION['rollnumber'].'<br>';
    echo $_SESSION['college'].'<br>';
    echo $_SESSION['year'].'<br>';
    echo $_SESSION['section'].'<br>';
*/
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
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">

	
</head>
<body>


<!-- Navigation Bar -->




<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">OEsystem</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li> 
        <li><a href="#">Page 3</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>





<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

