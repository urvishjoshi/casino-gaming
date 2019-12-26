<?php

	include "dbconn.php"; include 'session.php'; //connect to db

	$email = $_SESSION['casino_admin'];

	$fire = mysqli_query($conn,"SELECT id FROM admin_logins WHERE username='$email'") or die(mysqli_error($conn));
	$id = mysqli_fetch_array($fire);   //get current admin id
	
	$fire = mysqli_query($conn,"SELECT bid FROM game_data,admin_logins WHERE admin_logins.username='$email' AND game_data.admin_id='$id[0]'") or die(mysqli_error($conn));

	if (mysqli_num_rows($fire)>=1) 	//get previous bid value & add it with current bid
	{
		$results = mysqli_fetch_array($fire);
		$bid = $_POST['bid'] + $results['bid'];   //update bid value
	}
	else $bid = $_POST['bid'];   //not done any bids earlier
	$tableNo = $_POST['tableNo'];
	
	
	$date = date("d-m-Y"); 

	$query="INSERT INTO game_data (admin_id,table_no,bid,created_at) VALUES ('$id[0]','$tableNo','$bid',str_to_date('$date','%d-%m-%Y'))";
	$fire = mysqli_query($conn,$query) or die(mysqli_error($conn));

	if($fire)
	{
		header('Location: play.php');
	}
	else
	{
		?> <script>alert("Data not inserted"); window.location="play.php";</script> <?php
	}
?>