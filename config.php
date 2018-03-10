<?php

@$host = 'localhost';
@$username = 'root';
@$databaseName = 'online_examination';
@$password = '';


@$conn = mysqli_connect($host,$username,$password,$databaseName);

if(!$conn)
{
	echo 'Connection Filed !!!!';
}

?>