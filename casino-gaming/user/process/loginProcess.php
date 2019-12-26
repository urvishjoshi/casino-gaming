<?php include "dbconn.php";  //connect to db
	
	session_start();
	if (isset($_SESSION['casino_user'])) {	//if user is already logged in then go to home page
		header('Location:../home.php');
	}

	$un=$_POST['username'];

	$pw=$_POST['password'];
	$hash = hash('gost',$pw);  //hashing function: hash( hashing algorithm, string )

	$query="SELECT * FROM user_logins WHERE username = '$un' AND password = '$hash' ";

	$fire = mysqli_query($conn,$query);
	
	$rec = mysqli_num_rows($fire);

	if($rec>=1)
	{ 
		session_start(); 
		$_SESSION['casino_user'] = $un;

		header('Location: ../home.php');
	}
	else
	{
		?><script> alert("Incorrect ID or Password"); window.location="../"; </script> <?php
	}
?>