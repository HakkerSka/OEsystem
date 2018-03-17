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


if(!$conn)
{
	die("<script>alert('Error');
	window.location.href='../index.html';
	</script>");
}

@$sub_name = @$test_name = @$test_description = @$date_from = @$date_to = @$secret_code = @$no_of_questions = @$time = @$status = " ";


//@$sub_name = $_REQUEST['subject_name'];

function test_input($data)
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
        $test_name = test_input($_POST['no_of_ques']);
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


    echo $_POST['sub_id_for_checkup'];
    
}

/*

@$fetchi = "SELECT * FROM subjectdetails WHERE subjectname = '$sub_name'"; 

if(@$fetchi2 = mysqli_query($conn,$fetchi))
{
    @$result4 = mysqli_fetch_array($fetchi2);

    $test_name = $result4['test name'];
    $test_description = $result4['test description'];
    $no_of_questions = $result4['no_of_questions'];
    $time = $result4['time'];
    $date_from = $result4['date from'];
    $date_to = $result4['date to'];
    $secret_code = $result4['secret code'];
    $status = $result4['status'];
}


/*
echo "<div class='modal fade' id='mymodal' role='dialog'>
<div class='modal-dialog'>

    <div class='model-content'>
        <div class='modal-content'>
            <div class='modal-header'>
                Edit Details:
            </div>
            <div class='modal-body'>
    
        
        <form action='' method='post'>
            <div class='form-group row'>
                <label for='sub_name' class='col-md-3'>Subject Name: </label>
                <div class='col-md-9'>
                <input type='text' class='form-control' placeholder=".  $sub_name  ." name='sub_name' required>
                </div>
            </div>
            <div class='form-group row'>
                <label for='sub_name' class='col-md-3'>Exam Name: </label>
                <div class='col-md-9'>
                <input type='text' class='form-control' placeholder=". $test_name  ." name='exam_name' required>
                </div>
            </div>
            <div class='form-group row'>
                <label for='sub_name' class='col-md-3'>Exam Description: </label>
                <div class='col-md-9'>
                <input type='textarea' rows='5' class='form-control' placeholder=". $test_description ." name='description' required>
                </div>
            </div>

            <div class='form-group row'>
                <label for='sub_time' class='col-md-3'>Time(Seconds): </label>
                <div class='col-md-9'>
                <input type='number' min=60 max=3600 class='form-control' placeholder=". $time ." name='time' required>
                </div>
            </div>
            <div class='form-group row'>
                <label for='sub_time' class='col-md-3'>No of Questions: </label>
                <div class='col-md-9'>
                <input type='number' min=4 max=60 class='form-control' placeholder=". $no_of_questions ." name='no_of_ques' required>
                </div>
            </div>
            <div class='form-group row'>
                <label for='sub_name' class='col-md-3'>From: </label>
                <div class='col-md-9'>
                <input type='date' class='form-control' name='date_from' placeholder=". $date_from ." required>
                </div>
            </div>
            <div class='form-group row'>
                <label for='sub_name' class='col-md-3'>To: </label>
                <div class='col-md-9'>
                <input type='date' class='form-control' placeholder=". $date_to ." name='date_to' required>
                </div>
            </div>
            <div class='form-group row'>
                <label for='sub_name' class='col-md-3'>Secret code: </label>
                <div class='col-md-9'>
                <input type='password' class='form-control' name='secret_code' placeholder=". $secret_code ." required> 
                </div>
            </div>
            <br>
            <div class='form-group row'>
                <div class='col-md-9' align='center'>
                <input type='submit' class='btn btn-default' name='tf4' value='Submit' required>
                </div>
            </div>
        </form>	
     
  

            </div>
        </div>
    </div>

</div>
</div>
";


*/

/*echo "<div class="modal fade" id="mymodal" role="dialog">
	<div class="modal-dialog">

		<div class="model-content">
			<div class="modal-content">
				<div class="modal-header">
					Edit Details:
				</div>
				<div class="modal-body">
		
            
			<form action="" method="post">
                <div class="form-group row">
                    <label for="sub_name" class="col-md-3">Subject Name: </label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="<?php echo $sub_values['subjectname'] ; ?>" name="sub_name" required>
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
		</div>

	</div>
</div>";

*/


mysqli_close($conn);
?>