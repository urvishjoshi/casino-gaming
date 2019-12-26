<?php

	$host = "localhost";
	$db_name = "casinodb";
	$username = "root";
	$password = "";
	
	$conn = mysqli_connect($host,$username,$password,$db_name) or die("Could not connect to db:".mysqli_error($conn));
?>