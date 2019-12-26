<?php include 'sessionRedirect.php'; include 'dbconn.php';
	
	if (isset($_POST['approveBtn']))	//approve user
	{
		$id = $_POST['approveBtn'];
		
		$query = "UPDATE user_details SET active='1' WHERE id='$id'";
		$fire = mysqli_query($conn,$query) or die(mysqli_error($conn));

		$fire = mysqli_query($conn,"SELECT username FROM user_logins WHERE id = '$id'") or die(mysqli_error($conn));
		$user = mysqli_fetch_array($fire);

		?>
		<script> alert("Successfully approved <?php echo $user[0]; ?> for Bids"); 
  			window.location="../request.php"; 
  		</script> 
  		<?php 		
	}
	else if (isset($_POST['denyBtn'])) 	  //deny user
	{
		$id = $_POST['denyBtn'];

		$query = "UPDATE user_details SET active='-1' WHERE id='$id'";
		$fire = mysqli_query($conn,$query) or die(mysqli_error($conn));
		header('Location: ../request.php');
	}
	else 	//redirect if accessed by URL
	{
		header('Location: ../index.php');
	}

 ?>