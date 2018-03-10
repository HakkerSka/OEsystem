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
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">

	
</head>
<body>

<div class="container col-md-6">
    <div class="jumbotron">
    <h2 align="center"> Admin Login </h2>    
    <form action="" method="post">
            <div class="form-group row">
                <label class="col-md-2" for="username">Username:</label>
                <div class="col-md-10">
                <input type="text" name="tf1" class="form-control" placeholder="enter username">
                </div>
            </div>
     
            <div class="form-group row">
                    <label class="col-md-2" for="username">Password:</label>
                    <div class="col-md-10">
                    <input type="text" name="tf2" class="form-control" placeholder="enter username">
                    </div>
            </div>
            <div class="form-group row" align="center">
                <input type="submit" name="tf3" value="Submit" class="btn btn-default">
            </div>
    </form>
    </div>
</div>


<?php


require '../config.php';

if(!$conn)
{
    die("Connection Failed".mysqli_connect_error()."<br>");
}


@$username = @$password = "";

function input_test($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

if(isset($_POST['tf3']))
{
    if(empty($_POST['tf1']))
    {
        echo "<script> alert('Invalid'); </script>";
    }
    else
    {
        @$username = input_test($_POST['tf1']);
    }

    if(empty($_POST['tf2']))
    {
        echo "<script> alert('Invalid'); </script>";
    }
    else
    {
        @$password = input_test($_POST['tf2']);
    }
}

if($username == "ska" && $password == "123")
{
    @$abc = "infinity";
    $_SESSION['check'] = $abc;
    echo "<script> window.location.href='admin_home.php'; </script>";

}
else
{
    header("Location = ../index.html");
}

?>


<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>


