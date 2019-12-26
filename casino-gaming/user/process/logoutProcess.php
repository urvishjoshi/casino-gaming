<?php 
	session_start();

	unset($_SESSION['casino_user']);   //empty session of current logged in User
	header("location: ../");
?>