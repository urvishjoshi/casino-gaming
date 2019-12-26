<?php include "dbconn.php"; include 'session.php'; //connect to db


	$bid = $_POST['bid'];
	$tableNo = $_POST['tableNo'];
	
	$username = $_SESSION['casino_admin'];
	$fire = mysqli_query($conn,"SELECT id FROM admin_logins WHERE username='$username'") or die(mysqli_error($conn));
	$id = mysqli_fetch_array($fire);
	$date = date("d-m-Y"); 

	$query="INSERT INTO game_data (user_id,table_no,bid,created_at) VALUES ('$id[0]','$tableNo','$bid',str_to_date('$date','%d-%m-%Y'))";
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