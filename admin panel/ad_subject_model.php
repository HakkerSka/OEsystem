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

    @$result = "SELECT * FROM subjectdetails WHERE sub_id = $sub_id";
    @$result2 = mysqli_query($conn,$result);
    @$fetch_details = mysqli_num_rows($result2);

    if($result2)
    {
        if($fetch_details > 0)
        {
            $row = mysqli_fetch_array($result2);
        
            $check_values = array(
                "subjectname" => "0",
                "test name" => "0",
                "test description" => "0",
                "no_of_questions" => "0",
                "time" => "0",
                "date from" => "0",
                "date to" => "0",
                "secret code" => "0",
                
            );

            $check_values2 = array(
                "subjectname" => "'$sub_name'",
                "test name" => "'$test_name'",
                "test description" => "'$test_description'",
                "no_of_questions" => $no_of_questions,
                "time" => $time,
                "date from" => $date_from,
                "date to" => $date_to,
                "secret code" => "'$secret_code'",
                
            );

            if($row[1] != $sub_name)
            {
                $check_values['subjectname'] = "1"; 
            }
            else if($row[2] != $test_name)
            {
                $check_values['test name'] = "1"; 
            }
            else if($row[3] != $test_description)
            {
                $check_values['test description'] = "1";
            }
            else if($row[4] != $no_of_questions)
            {
                $check_values['no_of_qustions'] = "1";
            }
            else if($row[5] != $time)
            {
                $check_values['time'] = "1";    
            }
            else if($row[6] != $date_from)
            {
                $check_values['date from'] = "1";
            }
            else if($row[7] != $date_to)
            {
                $check_values['date to'] = "1";
            }
            else if($row[8] != $secret_code)
            {
                $check_values['secret code'] = "1";
            }
           

            foreach ($check_values as $i => $i_values)
            {
                       

                if($i_values == 1)
                {   
                   echo $i;
                   echo $check_values2[$i];
                 
                   @$value3 = $check_values2[$i]; 
                   @$details_update = "UPDATE subjectdetails SET $i = $value3 WHERE sub_id = $sub_id";
                   @$details_update2 = mysqli_query($conn,$details_update);

                   if(!$details_update2)
                   {
                       echo "<script>alert('Error2');</script>";
                   }
                   else
                   {
                       echo "Success";
                   }
                }   
            }
            
        }

    }


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


unset($_POST['time']);

mysqli_close($conn);
?>