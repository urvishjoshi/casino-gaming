<?php 
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	} 
	
  	if(isset($_SESSION['casino_admin'])==false)
  	{ 
  		header('location: ../');
	} 
?>