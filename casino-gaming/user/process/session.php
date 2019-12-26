<?php 
	session_start(); 
	
  	if(isset($_SESSION['casino_user'])==false)
  	{ ?> 
  		<script> alert("Please Login first"); 
  			window.location="../"; 
  		</script> <?php 
	} 
?>