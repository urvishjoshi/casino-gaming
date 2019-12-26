<?php

	include "dbconn.php";	 //connect to db

	if (isset($_POST['forgotBtn']))	//forgotbtn clicked
	{
		$email = $_POST['email'];
		
		$token = hash('haval256,5',$email);

		mysqli_query($conn,"INSERT INTO password_resets VALUES ('$email','$token')") or die(mysqli_error($conn));

		$uri = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].'/casino/user/forgot.php?token='.$token;

		$to = $email;
	    $subject = "Reset your password on examplesite.com";
	    $msg = "Hi there, click on this <a href=".$uri.">link</a> to reset your password on our site";
	    $msg = wordwrap($msg,70);
	    $headers = "From: Casino gaming";

	    if(mail('urvishjoshi49@gmail.com', $subject, $msg, $headers)) echo 'success'; else echo 'fail'; die();
	    header('Location: ../forgot.php?status=mailsent');
	}
	else 	//redirect if accessed by URL
	{
		header('Location: ../');
	}
?>