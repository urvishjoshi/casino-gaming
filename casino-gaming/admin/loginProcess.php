<?php include "dbconn.php";  //connect to db
	
	if ( empty($_POST['username']) && empty($_POST['password']) ) {	  //redirect if accessed by URL
		header('Location: index.php');
	}

	$un=$_POST['username'];

	$pw=$_POST['password'];
	$hash = hash('gost',$pw);   //hashing function: hash( hashing algorithm, string )

	$query="SELECT * FROM admin_logins WHERE username = '$un' AND password = '$hash' ";
	$fire = mysqli_query($conn,$query) or die(mysqli_error($conn));
	
	$rec = mysqli_num_rows($fire);

	if($rec>=1)
	{ 
		session_start(); 
		$_SESSION['casino_admin'] = $un;

		header('Location: home.php');
	}
	else
	{
		?><script>alert("Incorrect ID or Password"); window.location="index.php";</script> <?php
		
	}
?>