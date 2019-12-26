<?php

//redirect if accessed by URL
if ( empty($_POST['name']) && empty($_POST['username']) && empty($_POST['password']) && empty($_POST['phone']) )
{
	header('Location: index.php');
}

	include "dbconn.php"; //connect to db

	$username = $_POST['username'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	
	$hash = hash('gost', $password);  //hashing function: hash( hashing algorithm, string )
	$date = date("d-m-Y"); 

	$query="INSERT INTO user_logins (username,password,created_at,updated_at) 
			VALUES('$username', '$hash', str_to_date('$date','%d-%m-%Y'), str_to_date('$date','%d-%m-%Y'))";

	$results = mysqli_query($conn,$query) or die(mysqli_error($conn));
	
	$query="INSERT INTO user_details (name,email,phone,active,created_at,updated_at) 
			VALUES('$name', '$username', '$phone', '0', str_to_date('$date','%d-%m-%Y'), str_to_date('$date','%d-%m-%Y'))";
	
	$results2 = mysqli_query($conn,$query) or die(mysqli_error($conn));

	if($results && $results2)
	{
		session_start(); 
		$_SESSION['casino_user'] = $username;

		header('Location: home.php');
	}
	else
	{
		?> <script>alert("Data not inserted"); window.location="index.php";</script> <?php
	}
?>