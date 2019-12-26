<?php include 'sessionRedirect.php'; include 'dbconn.php';
	
	if (isset($_POST['approveBtn']))	//approve user
	{
		$id = $_POST['approveBtn'];
		
		$query = "UPDATE user_details SET active='1' WHERE id='$id'";
		$fire = mysqli_query($conn,$query) or die(mysqli_error($conn));

		$_SESSION['request_status']='approved';

		header('Location: ' . $_SERVER['HTTP_REFERER']);	//return to previous page
	}
	else if (isset($_POST['denyBtn'])) 	  //deny user
	{
		$id = $_POST['denyBtn'];

		$query = "UPDATE user_details SET active='-1' WHERE id='$id'";
		$fire = mysqli_query($conn,$query) or die(mysqli_error($conn));

		$_SESSION['request_status']='denied';

		header('Location: ' . $_SERVER['HTTP_REFERER']);	//return to previous page
	}
	else if (isset($_POST['deleteBtn'])) 	  //DELETE user
	{
		$id = $_POST['deleteBtn'];
		
		mysqli_query($conn,"DELETE FROM user_details WHERE id='$id'") or die(mysqli_error($conn));

		mysqli_query($conn,"DELETE FROM user_logins WHERE id='$id'") or die(mysqli_error($conn));

		$_SESSION['request_status']='deleted';

		header('Location: ' . $_SERVER['HTTP_REFERER']);	//return to previous page
	}
	else 	//redirect if accessed by URL
	{
		header('Location: ../../');
	}

 ?>