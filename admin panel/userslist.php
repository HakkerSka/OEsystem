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
<html>
<head>
	<title>Admin Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<!-- bOOTSTRAP CSS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	

	<script src="../js/jquery.min.js"></script>

	<!-- web font -->
	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	<style type="text/css">
		
	</style>
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


<!-- Main Body -->

<div class="container">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>SNo. </th>
					<th>Name: </th>
					<th> Email: </th>
					<th> College: </th>
					<th> Year: </th>
					<th> Section:</th>
					<th> Mobile: </th>
					<th> Roll Number: </th>
					<th> Password </th>
					<th> Update </th>
					<th> Delete </th>
				</tr>
			</thead>
			<tbody>
					
			<?php


				

					if(!$conn)
					{
						die("<script> alert('". mysqli_connect_error() ."'); 
						window.location.href='ad_log.php';
						</script>");
						
					}

					@$result = "SELECT * FROM userdetails";
					@$result2 = mysqli_query($conn,$result);
					@$num_registration = mysqli_num_rows($result2);

					@$count = 0;
					@$num = 0;
					if($result2)
					{
						while(@$row = mysqli_fetch_array($result2))
						{
							$count++;
							$num++;	
							echo "<tr> 
									<td>". $count ." </td>
									<td id='fullname1".$num."'>". $row['fullname'] ." </td>
									<td id='email1".$num."'>". $row['email']  . "</td>
									<td id='college1".$num."'>". $row['college']  . "</td>
									<td id='year1".$num."'>". $row['year']  . "</td>
									<td id='section1".$num."'>". $row['section']  . "</td>
									<td id='mobile1".$num."'>". $row['mobile']  . "</td>
									<td id='rollnumber1".$num."'>". $row['rollnumber']  . "</td>
									<td id='password1".$num."'>". $row['password']  . "</td>
									<td id='edit_btn1".$num."'> <input type='button' id='edit_button".$num."' onclick='abc(".$num.")' data-toggle='modal' data-target='#mymodal' class='btn btn-primary' value='Update' name='edit'>  </td>
									<td id='delete_btn1".$num."'> <input type='button' class='btn btn-danger' value='Delete' name='delete'> </td>
									</tr>";

						}
					}
					else
					{
						echo "<script>alert('Error');</script>";	
					}

					?>


					
			</tbody>
		</table>
	</div>
</div>	


<div class="modal fade" id="mymodal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
				<div class="modal-header">
						UPDATE USER DETAILS
				</div>
				<div class="modal-body">
						<form action="" method="post">			
										<input type="email" style="visibility:hidden;" name="tf2" id="email2" class="form-control" placeholder="Enter your email" required>
								<div class="form-group row">
								<label class="col-md-4">Full Name :</label>
								<div class="col-md-8">
								<input type="textfield" name="tf1" id="student_name2" class="form-control" placeholder="Enter your name" required>
								
								</div>
							</div>

							

							<div class="form-group row">
									<label class="col-md-4">College/School:</label>
									<div class="col-md-8">
										<input type="textfield" name="tf3" id="college_name2" class="form-control" placeholder="Enter your college name" required>
							
									</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2">Year:</label>
								<div class="col-md-4">
									<select class="form-control" name="tf4" id="year2">
										<option value="1">I</option>
										<option value="2">II</option>
										<option value="3">III</option>
										<option value="4">IV</option>
									</select>
								</div>
								<label class="col-md-2">Sec:</label>
								<div class="col-md-4">
								<select class="form-control" name="tf5" id="section2">
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
										<option value="D">D</option>
								</select>	
								</div>
							</div>

							<div class="form-group row">
									<label class="col-md-4">Mobile :</label>
									<div class="col-md-8">
										<input type="number" min=0 max=9999999999 class="form-control" id="mobile2" name="tf6" placeholder="Enter your Mobile No" required>
										
									</div>
							</div>

							<div class="form-group row">
									<label class="col-md-4">Roll number :</label>
									<div class="col-md-8">
										<input type="number" name="tf7" id="roll_number2" class="form-control" placeholder="Enter your RollNumber" required>
									
									</div>
							</div>

							<div class="form-group row">
								<label class="col-md-4">Password :</label>
								<div class="col-md-8">
									<input type="text" name="tf8" id="password2" class="form-control" placeholder="Enter your password" id="password" required>
							
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-4">Confirm Password :</label>
								<div class="col-md-8">
									<input type="text" name="tf9" id="confirm_password2" class="form-control" placeholder="Confirm password" id="confirm_password" required>
								
								</div>
							</div>


							<div class="form-group row">
									<div class="col-md-12" align="center">
										<input type="submit" name="update_udetails" id="update_modal_submit2" class="btn btn-default" value="Submit">
										
									</div>
							</div>
						</form>
				</div>
		</div>			
	</div>
</div>



<?php


if(!$conn)
{
	die("<script>alert('Error');
	window.location.href='../index.html';
	</script>");
}


function input_test($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


if(isset($_POST['update_udetails']))
{
	@$name = @$email = @$mobile = @$year = @$sec = @$college = @$rollnumber = @$password = " ";

	if(empty($_POST['tf1']))
			{
				echo "<script>alert('Enter a valid Name !!!');</script>";
			}
	else
			{
				$name = input_test($_POST['tf1']);
			}

	if(empty($_POST['tf2']))
			{
				echo "<script>alert('Enter a valid Email !!!');</script>";
			}
	else
			{
				$email = input_test($_POST['tf2']);
			}

	if(empty($_POST['tf3']))
			{
				echo "<script>alert('Enter a valid College Name !!!');</script>";
			}
	else
			{
				$college = input_test($_POST['tf3']);
			}

		if(empty($_POST['tf4']))
			{
				echo "<script>alert('Please select year !!!');</script>";
			}
	else
			{
				$year = input_test($_POST['tf4']);
			}
		if(empty($_POST['tf5']))
	{
		echo "<script>alert('Please select section !!!');</script>";
	}
	else
	{
		$sec = input_test($_POST['tf5']);
	}
		if(empty($_POST['tf6']))
	{
		echo "<script>alert('Enter a valid Mobile Number !!!');</script>";
	}
	else
	{
		$mobile = input_test($_POST['tf6']);
	}
		if(empty($_POST['tf7']))
	{
		echo "<script>alert('Enter a valid Roll Number !!!');</script>";
	}
	else
	{
		$rollnumber = input_test($_POST['tf7']);
	}

	if(empty($_POST['tf8']) || empty($_POST['tf9']))
	{
		echo "<script>alert('Enter a valid Password !!!');</script>";
	}
	else if($_POST['tf8'] != $_POST['tf9'])
	{
		echo "<script>alert('Password donot match !!!');</script>";
	}
	else
	{
		$password = input_test($_POST['tf8']);
	}


	@$check = "SELECT * FROM userdetails WHERE email = '$email'";
	@$check2 = mysqli_query($conn,$check);

	@$check_mobile = "SELECT * FROM userdetails WHERE mobile = '$mobile'";
	@$check_mobile2 = mysqli_query($conn,$check_mobile);

	if($check2 && $check_mobile)
	{
		$total_rows1 = mysqli_num_rows($check2);
		$total_rows2 = mysqli_num_rows($check_mobile2);
		
		
		if($total_rows1 > 1 && $total_rows2 <= 1 )
		{
			echo "<script>alert('Email already exist !!!');
			
			</script>";
		}
		else if($total_rows1 <= 1 && $total_rows2 > 1)
		{
			echo "<script>alert('Mobile number already exist !!!');
		
			</script>";
		}
		else if($total_rows1 <= 1 && $check_mobile <= 1)
		{

			

			@$select = "UPDATE userdetails SET fullname='$name',college='$college',year=$year, section='$sec', mobile=$mobile, rollnumber=$rollnumber, password='$password' WHERE email='$email'";


			if(mysqli_query($conn,$select))
			{
				echo "<script>alert('Registration Successfull');
					</script>";
			}
			else
			{
				echo "<script>alert('Registration Unsuccessfull');
				window.location.href='admin_home.php';
				</script>";
			}
					
		}
		else
		{
			echo "<script>alert('Error');
		
			</script>";
		}
	}
	else
	{
		echo "error";
	}



}




?>







<script>
/*
$(document).ready(function(){

	for(var i=1;i<= <?//php echo $num_registration; ?>;i++)
{
	$("#edit_button"+i).click(function() {
		console.log(i);
		var a = document.getElementById('fullname1'+i);
		console.log(a);

		
	});
}

});

*/
	
function abc(i) {
		
		var a = document.getElementById('fullname1'+i).innerHTML;
		var b = document.getElementById('email1'+i).innerHTML;
		var c = document.getElementById('college1'+i).innerHTML;
		var d = document.getElementById('year1'+i).innerHTML;
		var e = document.getElementById('section1'+i).innerHTML;
		var f = document.getElementById('mobile1'+i).innerHTML;
		var g = document.getElementById('rollnumber1'+i).innerHTML;
		var h = document.getElementById('password1'+i).innerHTML;
		
		console.log(a,b,c,d,e,f,g,h);

		document.getElementById("student_name2").setAttribute("value",a);
		document.getElementById("email2").setAttribute("value",b);
		document.getElementById("college_name2").setAttribute("value",c);
		
		document.getElementById("mobile2").setAttribute("value",f) ;
		document.getElementById("roll_number2").setAttribute("value",g);
		document.getElementById("password2").setAttribute("value",h);
		document.getElementById("confirm_password2").setAttribute("value",h);

	

		
	}


</script>

<script src="../js/bootstrap.min.js"></script>


</body>
</html>