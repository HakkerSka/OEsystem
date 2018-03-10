<?php

# connection buildup

require 'config.php';


if (!$conn) {
	# code...

	echo "database not connected";
}


# Needed variables


@$name = @$email = @$mobile = @$year = @$sec = @$college = @$rollnumber = @$password = "";


# Getting form values  !!!


# checking for xss script !!!


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
}



$select = "INSERT INTO userdetails VALUES ('$name','$email','$college',$year,'$sec',$mobile,$rollnumber,$password)";


if(mysqli_query($conn,$select))
{
	echo "<script>alert('Registration Successfull');
		window.location.href='php/login.php';
		</script>";
}


mysqli_close($conn);

?>