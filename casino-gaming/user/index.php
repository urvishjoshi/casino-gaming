<?php
	session_start();
	if (isset($_SESSION['casino_user'])) {	//if user is already logged in then go to home page
		header('Location: home.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Casino Gaming Login</title>

	<!-- casino gaming icon -->
	<link rel="shortcut icon" type="image/png" href="../favicon.png"/>
	
	<!-- bt4 compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<section>
		
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-primary text-white">Player login</div>
					<div>
						<div class="card-body">
							<form action="process/loginProcess.php" method="POST">

								<div class="form-group">
									<label for="username" class="form-label">Email</label>
									<input type="email" for="username" name="username" id="username" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="password" class="form-label">Password</label>
									<input type="password" for="password" name="password" id="password" class="form-control" required>
									<!-- <a href="forgot.php" class="link">Forgot Password?</a> -->
								</div>
								<div class="row justify-content-center">
									<button class="btn btn-primary" type="submit">Log In</button>
								</div>
							</form>
						</div>
					</div>
				</div><br><center>or<br>- <a href="register.php" class="link">Register</a> here as New player -</center>
			</div>
		</div>
	</div>

	</section>

	<!-- jquery, popper & JS plugins -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>