<?php
	session_start();
	if (isset($_SESSION['casino_user'])) {	//if user is already logged in then go to home page
		header('Location: ../home.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Casino Gaming Forgot Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- bt4 compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>.dec-none{text-decoration: none!important;}</style>
</head>
<body>
	<section>
		
	<div class="container mt-5 pt-5">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-primary text-white">Forgot passsword</div>
					<div>
						<div class="card-body">
							<form action="process/forgotProcess.php" method="POST">

								<div class="form-group">
									<label for="email" class="form-label">Enter your email</label>
									<input type="email" for="email" name="email" id="email" class="form-control" required>
								</div>
								<div class="row justify-content-center">
									<button class="btn btn-primary" type="submit" name="forgotBtn" value="forgotBtn">Send Reset Password link</button>
								</div>
								<br>
								<a href="#" onClick="history.go(-1);" class="link row"><i class="material-icons dec-none">&#xe408;</i> Go to login</a>
								
							</form>
						</div>
					</div>
				</div>
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