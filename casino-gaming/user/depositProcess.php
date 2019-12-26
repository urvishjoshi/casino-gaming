<?php include 'dbconn.php'; include 'session.php';

	if (isset($_POST['depositBtn'])) {		//deposit btn clicked

		$deposit = $_POST['depositBtn'];
		$user = $_SESSION['casino_user'];
		$date = date("d-m-Y"); 

		// $query="UPDATE user_details SET deposit='$deposit', updated_at=str_to_date('$date','%d-%m-%Y') WHERE id='$user'";
		// $fire = mysqli_query($conn,$query) or die(mysqli_error($conn));

		$fire=mysqli_query($conn,"SELECT id FROM user_details WHERE email= '$user'")or die(mysqli_error($conn));
		$id = mysqli_fetch_array($fire);

		$fire = mysqli_query($conn,"SELECT MAX(bid) FROM game_data WHERE user_id= '$id[0]'")or die(mysqli_error($conn));
		$maxBid = mysqli_fetch_assoc($fire);
		
		if ($deposit>=$maxBid) {
			$query="UPDATE game_data SET bid='' WHERE user_id='$id[0]'";
		}
		else{
			$remainingMoney = $maxBid-$deposit;
			$query="UPDATE game_data SET bid='$remainingMoney' WHERE user_id='$id[0]' AND MAX(bid)";
		}
		$fire = mysqli_query($conn,$query) or die(mysqli_error($conn));
	}

?>