<?php
session_start();

// Manage page session variables;
$i = $_SESSION["count"];
echo $i;

if(isset($_POST["submit_manage_sub_btn1"]))
{
    echo $_POST["sub_name1"];
}



?>