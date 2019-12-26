<?php

	include 'sessionRedirect.php'; include "dbconn.php";  //connect to db

	if(isset($_POST['bidBtn']))		//if bid btn clicked
	{
		$email = $_SESSION['casino_admin'];
	
		$fire = mysqli_query($conn,"SELECT id FROM admin_logins WHERE username='$email'") or die(mysqli_error($conn));
		$id = mysqli_fetch_array($fire);   //get current admin id
		
		$bid = $_POST['bid'];   //not done any bids earlier
		$tableNo = $_POST['tableNo'];
		
		$date = date("d-m-Y"); 
	
		$query="INSERT INTO game_data (admin_id,table_no,bid,created_at) VALUES ('$id[0]','$tableNo','$bid',str_to_date('$date','%d-%m-%Y'))";
		$fire = mysqli_query($conn,$query) or die(mysqli_error($conn));
	
		if($fire)
		{
			$_SESSION['bidStatus']='done';
			header('Location: ../play.php');
		}
		else
		{
			?> <script>alert("Data not inserted"); window.location="../play.php";</script> <?php
		}
	}
	else 	//redirect if accessed by URL
	{
		header('Location: ../../');
	}
?>