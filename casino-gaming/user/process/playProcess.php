<?php

	include "dbconn.php"; include 'session.php'; //connect to db

	if (isset($_POST['bidBtn'])) {
		
		$email = $_SESSION['casino_user'];

		$fire = mysqli_query($conn,"SELECT id,deposit FROM user_details WHERE email='$email'") or die(mysqli_error($conn));
		$results = mysqli_fetch_array($fire);   //get current user id
		
		$deposit = (int)$results['deposit'];
		$bid = (int)$_POST['bid'];
		$tableNo = $_POST['tableNo'];
		
		if ($bid <= $deposit) {		//if deposit has money then pay automatic for current bid
			$deposit = $deposit - $bid;
			
			mysqli_query($conn,"UPDATE user_details SET deposit='$deposit' WHERE id='$results[0]'")or die(mysqli_error($conn));
			$_SESSION['bidStatus']='recovered';
		}
		else{	  //bid will be added in database

			$date = date("d-m-Y");
			$query="INSERT INTO game_data (user_id,table_no,bid,created_at) VALUES ('$results[0]','$tableNo','$bid',str_to_date('$date','%d-%m-%Y'))";
			$fire = mysqli_query($conn,$query) or die(mysqli_error($conn));
			$_SESSION['bidStatus']='done';
		}

		header('Location: ../home.php');
	}
	else 	//redirect if accessed by URL
	{
		header('Location: ../');
	}
?>