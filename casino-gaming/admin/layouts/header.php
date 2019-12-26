<?php include 'dbconn.php'; include 'sessionRedirect.php';
	$pendingUsers = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user_details WHERE active='0'"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Casino Gaming</title>
	<style> .font-14{ font-size: 14px!important; } </style>   <!-- used in play page -->

	<!-- casino gaming icon -->
	<link rel="shortcut icon" type="image/png" href="../favicon.png"/>
	
	<!-- bt4 compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- jQuery snippet -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<!-- font awesome icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="home.php">Casino</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse">

			<ul class="navbar-nav">
				<li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='home.php') echo 'active';?>">
					<a class="nav-link" href="home.php">Home <span class="sr-only"></span></a>
				</li>

				<li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='play.php') echo 'active';?>">
					<a class="nav-link" href="play.php">Play</a>
				</li>

				<li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='request.php') echo 'active';?>" title="You have <?php echo $pendingUsers; ?> pending requests">
					<span class="badge badge-pill badge-primary" style="float:right;margin-bottom:-10px;">
						<?php echo $pendingUsers; ?>
					</span>
					<a class="nav-link" href="request.php">Requests<span class="sr-only">(current)</span></a>
				</li>

				<li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='settings.php') echo 'active';?>">
					<a class="nav-link" href="settings.php">Settings</a>
				</li>
			</ul>

		</div>
		<div class="collapse navbar-collapse navbar-fill justify-content-end" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						<?php echo $_SESSION['casino_admin']; ?> <span class="caret"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="process/logoutProcess.php">
						Logout <i class="fa fa-sign-out"></i>
						</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>