<?php 
	session_start(); 
	
  	if(isset($_SESSION['casino_admin'])==false)
  	{ ?> 
  		<script> alert("Please Login first"); 
  			window.location="index.php"; 
  		</script> <?php 
	} 
?>