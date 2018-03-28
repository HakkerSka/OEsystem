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





        <div class="panel panel-default col-md-6 col-md-offset-3">
            <div class="panel-heading">
			<button class="btn btn-primary form-control" type="button" data-toggle="collapse" data-target="#collapse_sub_reg_form" aria-expanded="false" aria-controls="collapseExample">
			CLICK HERE TO REGISTER A NEW SUBJECT
 			 </button>
               
            </div>
            <div class="panel-body">
			<div class="collapse" id="collapse_sub_reg_form">
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
                    <input type="time" min=00:10:00 step="2" class="form-control" placeholder="Enter exam time (minutes)" name="time" required>
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

if(isset($_POST['tf4']))
{
	@$subject_name = @$test_name = @$test_description = @$date_from = @$date_to = @$secret_code = @$no_of_questions = @$time = "";

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


// function to calculate random ID


	function random_id($length = 6)
	{
		@$characters = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		@$lengthstring = strlen($characters);
		for($i = 1; $i<= $length; $i++)
		{
			@$random_string .= $characters[mt_rand(0 , $lengthstring-1)];
		}

		return $random_string;
	}


	$id = random_id();
	@$check = "SELECT * FROM subjectdetails WHERE sub_id = '$id'";
	@$check2 = mysqli_query($conn,$check);


	while(mysqli_num_rows($check2) != 0)
	{	
		$id = random_id();
		@$check = "SELECT * FROM subjectdetails WHERE sub_id = '$id'";
		@$check2 = mysqli_query($conn,$check);
	}
	

	@$result = "INSERT INTO subjectdetails VALUES ('$id','$subject_name','$test_name','$test_description',$no_of_questions,'$time','$date_from','$date_to','$secret_code','No')";


if(mysqli_query($conn,$result))
{
	echo "<script>alert('New Subject Created');
	window.location.href = 'admin_home.php';
	</script>";
}
else 
{
	echo "<script>alert('Error');
	window.location.href = 'ad_subject.php';
	</script>";
}



}

?>


<div class="conatiner">
	<div class="col-md-12	">
	<table class="table table-striped">
		  <tr>
		  		<th> S.No. </th>
				  <th> Sub ID </th>
			  <th>Subject Name</th>
			  <th> Exam Name </th>
			  <th> Exam Description </th>
			  <th> No of Questions </th>
			  <th> Time </th>
			  <th> From </th>
			  <th> To </th>
			  <th> Secret Code </th>
			  <th> Status </th>
			  <th> Edit </th>
			  <th> Manage <th>
		  </tr>


	<?php

@$fetch_subject = "SELECT * FROM subjectdetails";
@$fetch_subject2 = mysqli_query($conn,$fetch_subject);
@$fetch_subject3 = mysqli_num_rows($fetch_subject2);

@$count = 0;

if($fetch_subject2)
{
if($fetch_subject3 <= 0)
{
 echo "<tr> <td colspan='9'> <h5 align='center'>  No Subject yet </h5> </td>  </tr>";
}
else
{

	while(@$sub_values = mysqli_fetch_array($fetch_subject2))
	{
			$count++;


		echo "<tr> 
		<td>". $count  ."</td>	
		<td id='sub_id".$count."'>". $sub_values['sub_id']  ."</td>
		<td id='sub_name".$count."'>". $sub_values['subjectname']  ."</td>
		<td id='test_name".$count."'>". $sub_values['test_name']  ."</td>
		<td id='test_description".$count."'>". $sub_values['test_description']  ."</td>
		<td id='no_of_questions".$count."'>". $sub_values['no_of_questions']  ."</td>
		<td id='time".$count."'>". $sub_values['time']  ."</td>
		<td id='date_from".$count."'>". $sub_values['date_from']  ."</td>
		<td id='date_to".$count."'>". $sub_values['date_to']  ."</td>
		<td id='secret_code".$count."'>". $sub_values['secret_code']  ."</td>
		<td id='status".$count."'>". $sub_values['status']  ."</td>
		<td> <button class='btn btn-success' onclick='edit(".$count.")' id='edit".$count."' data-toggle='modal' data-target='#mymodal'> Edit </button> </td>
		<td> <button class='btn btn-danger'> Manage </button> </td>
	  </tr>";	
	}
	
}
}
else
{
	echo "<script> alert('Cann't fetch details!!!'); </script>";
}




?>



</table>
	</div>
</div>


<div class="modal fade" id="mymodal" role="dialog">
	<div class="modal-dialog">

		<div class="model-content">
			<div class="modal-content">
				<div class="modal-header" id="sub_heading">
					Edit Details:
				</div>
				<div class="modal-body">
		
            
			<form action="" method="post">
				<input type="text" class="form-control" id="sub_id_for_checkup" name="sub_id_for_checkup" style="visibility: hidden;">
                <div class="form-group row">
                    <label for="sub_name" class="col-md-3">Subject Name: </label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" id= "sub_name_modal" placeholder=" hi" name="sub_name" required>
                    </div>
                </div>
				<div class="form-group row">
                    <label for="sub_name" class="col-md-3">Exam Name: </label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="" id= "test_name_modal" name="exam_name" required>
                    </div>
                </div>
				<div class="form-group row">
                    <label for="sub_name" class="col-md-3">Exam Description: </label>
                    <div class="col-md-9">
                    <input type="textarea" rows="5" class="form-control" placeholder="" id= "test_description_modal" name="description" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sub_time" class="col-md-3">Time <sup>(hr:min:sec)</sup> </label>
                    <div class="col-md-9">
                    <input type="time" min=00:10:00 step="2" class="form-control" placeholder="" id= "time_modal" name="time" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sub_time" class="col-md-3">No of Questions: </label>
                    <div class="col-md-9">
                    <input type="number" min=4 max=60 class="form-control" placeholder="" id= "no_of_questions_modal" name="no_of_ques" required>
                    </div>
                </div>
				<div class="form-group row">
                    <label for="sub_name" class="col-md-3">From: </label>
                    <div class="col-md-9">
                    <input type="date" class="form-control" id= "date_from_modal"  name="date_from" required>
                    </div>
                </div>
				<div class="form-group row">
                    <label for="sub_name" class="col-md-3">To: </label>
                    <div class="col-md-9">
                    <input type="date" class="form-control"  id= "date_to_modal"  name="date_to" required>
                    </div>
                </div>
				<div class="form-group row">
                    <label for="sub_name" class="col-md-3">Secret code: </label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" name="secret_code" id= "secret_code_modal" required>
                    </div>
                </div>
				<br>
				<div class="form-group row">
                    <div class="col-md-9" align="center">
                    <input type="submit" class="btn btn-default" name="tf5" value="Submit" required>
                    </div>
                </div>
			</form>	
         
      
   
				</div>
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


function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data); 
	return $data;
}

//@$sub_name = $_REQUEST['subject_name'];

if(isset($_POST['tf5']))
{

	@$sub_name = @$test_name = @$test_description = @$date_from = @$date_to = @$secret_code = @$no_of_questions = @$time = @$status = " ";

	if(empty($_POST['sub_name']))
    {
        echo "<script> alert('Subject Name required'); </script>";
    }
    else
    {
        $sub_name = test_input($_POST['sub_name']);
    }

    if(empty($_POST['exam_name']))
    {
        echo "<script> alert('Test name required'); </script>";
    }
    else
    {
        $test_name = test_input($_POST['exam_name']);
    }

    if(empty($_POST['description']))
    {
        echo "<script> alert('Test Description required'); </script>";
    }
    else
    {
        $test_description = test_input($_POST['description']);
    }

    if(empty($_POST['time']))
    {
        echo "<script> alert('Time required'); </script>";
    }
    else
    {
        $time = test_input($_POST['time']);
    }

    if(empty($_POST['no_of_ques']))
    {
        echo "<script> alert('Number of Questions required'); </script>";
    }
    else
    {
        $no_of_questions = test_input($_POST['no_of_ques']);
    }

    if(empty($_POST['date_from']))
    {
        echo "<script> alert('Start date required'); </script>";
    }
    else
    {
        $date_from = test_input($_POST['date_from']);
    }

    if(empty($_POST['date_to']))
    {
        echo "<script> alert('End date required'); </script>";
    }
    else
    {
        $date_to = test_input($_POST['date_to']);
    }

    if(empty($_POST['secret_code']))
    {
        echo "<script> alert('Secret code required'); </script>";
    }
    else
    {
        $secret_code = test_input($_POST['secret_code']);
    }

    
    $sub_id = test_input($_POST['sub_id_for_checkup']);

    @$result = "SELECT * FROM subjectdetails WHERE sub_id = '$sub_id'";
    @$result2 = mysqli_query($conn,$result);
	@$fetch_details = mysqli_num_rows($result2);
	


    if($result2)
    {
        if($fetch_details > 0)
        {
            $row = mysqli_fetch_array($result2);
        
            $check_values = array(
                "subjectname" => "0",
                "test_name" => "0",
                "test_description" => "0",
                "no_of_questions" => "0",
                "time" => "0",
                "date_from" => "0",
                "date_to" => "0",
                "secret_code" => "0",
                
            );

            $check_values2 = array(
                "subjectname" => "'$sub_name'",
                "test_name" => "'$test_name'",
                "test_description" => "'$test_description'",
                "no_of_questions" => $no_of_questions,
                "time" => "'$time'",
                "date_from" => "'$date_from'",
                "date_to" => "'$date_to'",
                "secret_code" => "'$secret_code'",
                
            );

            if($row[1] != $sub_name)
            {
				$check_values['subjectname'] = "1";
				 
            }
             if($row[2] != $test_name)
            {
                $check_values['test_name'] = "1"; 
            }
             if($row[3] != $test_description)
            {
                $check_values['test_description'] = "1";
            }
             if($row[4] != $no_of_questions)
            {
                $check_values['no_of_questions'] = "1";
            }
             if($row[5] != $time)
            {
                $check_values['time'] = "1";    
            }
             if($row[6] != $date_from)
            {
                $check_values['date_from'] = "1";
            }
             if($row[7] != $date_to)
            {
                $check_values['date_to'] = "1";
            }
             if($row[8] != $secret_code)
            {
                $check_values['secret_code'] = "1";
            }
           

			


            foreach ($check_values as $i => $i_values)
            {	
				
				if($i_values == 1)
                {   
                   
                  
                 
                   @$value3 = $check_values2[$i]; 
                   @$details_update = "UPDATE subjectdetails SET $i = $value3 WHERE sub_id = '$sub_id'";
                   @$details_update2 = mysqli_query($conn,$details_update);

                   if(!$details_update2)
                   {
						$icheck_error = 1;		
                       echo "<script>alert('Error');</script>";
				   }
				   else
				   {
					   echo "";
				   }
                  
				}

				
				   
				
			}
			
			
            
        }

    }
	else{
		echo "fail2";
	}

}

mysqli_close($conn);

?>

<!--

<span id="edit_model"></span>

-->



<script type="text/javascript">



/*
function edit(){
		var sub_name = document.getElementById("sub_name").innerHTML;
		
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200){
				document .getElementById("edit_model").innerHTML = this.responseText;
			}
		};
		xhttp.open("POST","ad_subject_model.php?subject_name="+sub_name,true);
		xhttp.send();
	}
*/

var a = b = c = d = e = f = g = h = i = j = k = "";

function edit(id){
	var a = document.getElementById('sub_name'+id).innerHTML;
	var b = document.getElementById('test_name'+id).innerHTML;
	var c = document.getElementById('test_description'+id).innerHTML;
	var d = document.getElementById('no_of_questions'+id).innerHTML;
	var e = document.getElementById('time'+id).innerHTML;
	var f = document.getElementById('date_from'+id).innerHTML;
	var g = document.getElementById('date_to'+id).innerHTML;
	var h = document.getElementById('secret_code'+id).innerHTML;
	var i = document.getElementById('status'+id).innerHTML;
	var j = "EDIT DETAILS FOR ID - "+document.getElementById('sub_id'+id).innerHTML;
	var k = document.getElementById('sub_id'+id).innerHTML;


	document.getElementById("sub_id_for_checkup").setAttribute("value",k);
	document.getElementById("sub_heading").innerHTML = j;
	document.getElementById("sub_name_modal").setAttribute("value",a)	;
	document.getElementById("test_name_modal").setAttribute("value",b);
	document.getElementById("test_description_modal").setAttribute("value",c)	;
	document.getElementById("no_of_questions_modal").setAttribute("value",d)	;
	document.getElementById("time_modal").setAttribute("value",e)	;
	document.getElementById("date_from_modal").setAttribute("value",f)	;
	document.getElementById("date_to_modal").setAttribute("value",g)	;
	document.getElementById("secret_code_modal").setAttribute("value",h)	;
	

}

</script>


<script src="../js/bootstrap.min.js"></script>
</body>
</html>

