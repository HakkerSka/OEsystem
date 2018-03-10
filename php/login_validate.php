<?php

# connection buildup

session_start();

require '../config.php';


if (!$conn) {
	# code...
	die("Connection failed".mysqli_connect_error()."<br>");
}


@$mobile = @$password = "";

function input_test($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


if(isset($_POST['tf8']))
{
	if(empty($_POST['tf1']))
	{
		echo "<script> alert('Mobile number required'); </script>";
	}
	else
	{
		$mobile = input_test($_POST['tf1']);
	}

	if(empty($_POST['tf2']))
	{
		echo "<script> alert('Password required'); </script>";
	}
	else
	{
		$password = input_test($_POST['tf2']);	
	}

}




@$result = "SELECT * FROM userdetails where mobile = $mobile AND password = $password";
@$result2 = mysqli_query($conn,$result);


if(mysqli_num_rows($result2) > 0)
{
	@$fetch_details = mysqli_fetch_array($result2);

	$_SESSION['fullname'] = $fetch_details['fullname'];
	$_SESSION['email'] = $fetch_details['email'];
	$_SESSION['college'] = $fetch_details['college'];
	$_SESSION['year'] = $fetch_details['year'];
	$_SESSION['section'] = $fetch_details['section'];
	$_SESSION['mobile'] = $fetch_details['mobile'];
	$_SESSION['rollnumber'] = $fetch_details['rollnumber'];


	echo "<script>window.location.href='../student panel/studentPanel.php';</script>";
	
}
else{
	echo "<script>alert('User not found');
	window.location.href='login.php';
	</script>";
}



mysqli_close();	

?>