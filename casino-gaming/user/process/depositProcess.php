<?php include 'dbconn.php'; include 'session.php';

	if (isset($_POST['depositBtn'])) {		//deposit btn clicked

		$deposit = (int)$_POST['deposit'];
		$user = $_SESSION['casino_user'];
		$date = date("d-m-Y"); 


		$fire=mysqli_query($conn,"SELECT * FROM user_details WHERE email= '$user'")or die(mysqli_error($conn));
		$user = mysqli_fetch_array($fire);

		$fire = mysqli_query($conn,"SELECT SUM(bid) FROM game_data WHERE user_id= '$user[0]'")or die(mysqli_error($conn));
		$sumBid = mysqli_fetch_assoc($fire);
		
		$sumBid = (int)$sumBid['SUM(bid)']; 

		if ($users['deposit']==NULL) {		//if null then initalize it with 0
			mysqli_query($conn,"UPDATE user_details SET deposit=0 WHERE id='$user[0]'")or die(mysqli_error($conn));
		}

		if ($deposit == $sumBid) 	//deposit is equal to total bids
		{	
			$fire = mysqli_query($conn,"DELETE FROM game_data WHERE user_id='$user[0]'")or die(mysqli_error($conn));
			$fire = mysqli_query($conn,"UPDATE user_details SET deposit=deposit+0 WHERE id='$user[0]'")or die(mysqli_error($conn));
			
			$_SESSION['deposit_status']='recovered';
			header("Location: ../deposit.php");
		}
		else if ($deposit > $sumBid) 	//deposit is greater than total bids
		{
			$remainingMoney = $deposit - $sumBid;	//remaining of deposit transferred to user account(deposit column)
			
			$fire = mysqli_query($conn,"DELETE FROM game_data WHERE user_id='$user[0]'")or die(mysqli_error($conn));
			$fire = mysqli_query($conn,"UPDATE user_details SET deposit=deposit+'$remainingMoney' WHERE id='$user[0]'")or die(mysqli_error($conn));

			$_SESSION['deposit_status']='added';
			header("Location: ../deposit.php");
		}
		else { 
			$neededMoney = abs($sumBid - $deposit);
			?>
			<script> 
				alert("You need ₹<?php echo $neededMoney; ?>* more to pay all bids!");
				window.location="../deposit.php"; 
			</script> <?php
		}
	}
	else 	//redirect if accesses by URL
	{	  
		header('Location: ../');
	}

?>