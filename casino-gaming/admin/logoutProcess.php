<?php 
	session_start();

	unset($_SESSION['casino_admin']);   //empty session of current logged in User
	header("location: index.php");
?>