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
									<td> ". $row['email']  . "</td>
									<td> ". $row['college']  . "</td>
									<td> ". $row['year']  . "</td>
									<td> ". $row['section']  . "</td>
									<td> ". $row['mobile']  . "</td>
									<td> ". $row['rollnumber']  . "</td>
									<td> ". $row['password']  . "</td>
									<td> <input type='button' id='edit_button".$num."' onclick='abc(".$num.")' class='btn btn-primary' value='Update' name='edit'>  </td>
									<td> <input type='button' class='btn btn-danger' value='Delete' name='delete'> </td>
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
		console.log(a);

		
	}


</script>

<script src="../js/bootstrap.min.js"></script>


</body>
</html>