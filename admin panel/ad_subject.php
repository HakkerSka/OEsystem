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




    
        <div class="panel panel-default col-md-6 col-md-offset-3">
            <div class="panel-heading ">
            REGISTRATION TO ADD NEW EXAM    
            </div>
            <div class="panel-body">
			<form action="" method="post">
                <div class="form-group row">
                    <label for="sub_name" class="col-md-3">Subject Name: </label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Enter Subject/Topic name" name="sub_name" required>
                    </div>
                </div>
				<div class="form-group row">
                    <label for="sub_name" class="col-md-3">Exam Name: </label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Enter Exam name" name="exam_name" required>
                    </div>
                </div>
				<div class="form-group row">
                    <label for="sub_name" class="col-md-3">Exam Description: </label>
                    <div class="col-md-9">
                    <input type="textarea" rows="5" class="form-control" placeholder="Enter exam description" name="description" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sub_time" class="col-md-3">Time(Seconds): </label>
                    <div class="col-md-9">
                    <input type="number" min=60 max=3600 class="form-control" placeholder="Enter exam time (minutes)" name="time" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sub_time" class="col-md-3">No of Questions: </label>
                    <div class="col-md-9">
                    <input type="number" min=4 max=60 class="form-control" placeholder="Enter number of Questions" name="no_of_ques" required>
                    </div>
                </div>
				<div class="form-group row">
                    <label for="sub_name" class="col-md-3">From: </label>
                    <div class="col-md-9">
                    <input type="date" class="form-control" name="date_from" required>
                    </div>
                </div>
				<div class="form-group row">
                    <label for="sub_name" class="col-md-3">To: </label>
                    <div class="col-md-9">
                    <input type="date" class="form-control" name="date_to" required>
                    </div>
                </div>
				<div class="form-group row">
                    <label for="sub_name" class="col-md-3">Secret code: </label>
                    <div class="col-md-9">
                    <input type="password" class="form-control" name="secret_code" required>
                    </div>
                </div>
				<br>
				<div class="form-group row">
                    <div class="col-md-9" align="center">
                    <input type="submit" class="btn btn-default" name="tf4" value="Submit" required>
                    </div>
                </div>
			</form>	
            </div>
        </div>
   

<?php

if(!$conn)
{
	die("<script>alert('Error');
	window.location.href='../index.html';
	</script>");
}

@$subject_name = @$test_name = @$test_description = @$date_from = @$date_to = @$secret_code = @$no_of_questions = @$time = "";

function input_test($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data); 
	return $data;
}

if(isset($_POST['tf4']))
{
	if(empty($_POST['sub_name']))
	{
		echo "<script>alert('Subject name required');</script>";
	}
	else
	{
		$subject_name = input_test($_POST['sub_name']);
	}


	if(empty($_POST['exam_name']))
	{
		echo "<script>alert('Exam name required');</script>";
	}
	else
	{
		$test_name = input_test($_POST['exam_name']);
	}


	if(empty($_POST['description']))
	{
		echo "<script>alert('Exam description required');</script>";
	}
	else
	{
		$test_description = input_test($_POST['description']);
	}


	if(empty($_POST['time']))
	{
		echo "<script>alert('Exam time required');</script>";
	}
	else
	{
		$time = input_test($_POST['time']);
	}


	if(empty($_POST['no_of_ques']))
	{
		echo "<script>alert('Number of questions required');</script>";
	}
	else
	{
		$no_of_questions = input_test($_POST['no_of_ques']);
	}


	if(empty($_POST['date_from']))
	{
		echo "<script>alert('Starting Date required');</script>";
	}
	else
	{
		$date_from = input_test($_POST['date_from']);
	}


	if(empty($_POST['date_to']))
	{
		echo "<script>alert('End date required');</script>";
	}
	else
	{
		$date_to = input_test($_POST['date_to']);
	}


	if(empty($_POST['secret_code']))
	{
		echo "<script>alert('Secret code required');</script>";
	}
	else
	{
		$secret_code = input_test($_POST['secret_code']);
	}




	@$result = "INSERT INTO subjectdetails VALUES ('$subject_name','$test_name','$test_description',$no_of_questions,$time,'$date_from','$date_to','$secret_code','No')";


if(mysqli_query($conn,$result))
{
	echo "<script>alert('New Subject Created');
	window.location.href = 'admin_home.php';
	</script>";
}
else 
{
//	echo "<script>alert('Error');
//	window.location.href = 'ad_subject.php';
//	</script>";
}

	


}



mysqli_close($conn);

?>



<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

