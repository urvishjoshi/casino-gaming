<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Casino Game</title>

	<!-- bt4 compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- jQuery snippet -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<!-- font awesome icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="home.php">Casino</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='home.php') echo 'active';?>">
					<a class="nav-link" href="home.php">Home <span class="sr-only"></span></a>
				</li>
				<li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='deposit.php') echo 'active';?>">
					<a class="nav-link" href="deposit.php">Deposit <span class="sr-only"></span></a>
				</li>
				<li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='settings.php') echo 'active';?>">
					<a class="nav-link" href="settings.php">Settings</a>
				</li>
			</ul>
		</div>
		<div class="collapse navbar-collapse navbar-fill justify-content-end" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="logoutProcess.php" type="submit">Log out <i class="fa fa-sign-out"></i></a>
				</li>
			</ul>
		</div>
	</nav>

	<?php include "dbconn.php"; ?> <!-- connect to db -->