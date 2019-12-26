<?php
	session_start();
	if (isset($_SESSION['casino_admin'])) {	  //if user is already Logged in then go to Home page
		header('Location:home.php');
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

	<!-- jQuery snippet -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<!-- font awesome icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<section>	

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-dark text-white">Admin login</div>
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
								</div>
								<div class="row justify-content-center">
									<button class="btn btn-primary" type="submit">Log In</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
<?php include 'layouts/footer.php'; ?>