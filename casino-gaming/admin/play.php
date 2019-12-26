<?php include 'layouts/header.php'; ?>

<section>
	<div class="container-fluid row mt-4">
		<div class="col-md-3"></div>
		<div class="col-md-6 mx-auto">
			<center><h1>Play a Game</h1></center>
			<HR>
			<div class="row justify-content-center">

				<form action="process/playProcess.php" method="POST">
					<div class="form-group">
						<label for="name" class="form-label">Username</label>
						<input type="text" name="name" id="name" value="<?php echo $_SESSION['casino_admin']; ?>" class="form-control" title="You are logged in as <?php echo $_SESSION['casino_admin']; ?>" disabled>
					</div>
					<div class="form-group">
						<label for="bid" class="form-label">Bid in <i class="fa fa-rupee"></i></label>
						<input type="text" name="bid" id="bid" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="tableNo" class="form-label">Table No.</label>
						<input type="text" name="tableNo" id="tableNo" class="form-control" required>
					</div>
					<div class="row justify-content-center">
						<button type="submit" name="bidBtn" id="bidBtn" class="btn btn-primary">Place Bid</button>
					</div>
				</form>

			</div>
		</div>
		<div class="col-md-3 justify-content-center text-center pt-3 mt-5">
			<div class="col-md-12 border rounded mx-auto py-2">
			<h5>Bid history</h5>
			<HR class="dropdown-divider">
			<?php
				$email = $_SESSION['casino_admin'];

				$fire=mysqli_query($conn,"SELECT id FROM admin_logins WHERE username= '$email'")or die(mysqli_error($conn));
				$id = mysqli_fetch_array($fire);

				$fire = mysqli_query($conn,"SELECT * FROM game_data WHERE admin_id= '$id[0]'")or die(mysqli_error($conn));

				if (mysqli_num_rows($fire)==0) {    //no bids done
					echo '<h6 class="text-secondary">No bigs yet,<br>your all bids are shown here..</h6>';
				}
				else{    //more than 1 bids found

					$deposit =mysqli_fetch_assoc(mysqli_query($conn,"SELECT deposit FROM admin_logins WHERE id= '$id[0]'"));

					if (($deposit['deposit'] >= 0) && (mysqli_num_rows($fire)==0)) {	//if deposit is not null and has no bids
						echo '<span class="text-success">Your all bids are recovered, you can make more bids...</span>';
					}
					else{  //has bids pending for payment
					
					while ($results = mysqli_fetch_assoc($fire)) { ?>
						- Bid of <span class='badge badge-success'>₹<?php echo $results['bid']; ?></span> on <?php echo date("d-m-Y", strtotime($results['created_at']) ); ?><br>
					<?php
					}

					$totalBid = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(bid) FROM game_data WHERE admin_id= '$id[0]'"));

					?>
					<div class="dropdown-divider"></div>
					A total Bid of <span class='badge badge-info font-14'>₹<?php echo $totalBid['SUM(bid)']; ?></span> till now<br>
					
					<?php 
					}
				}
			?>
			</div>
		</div>
	</div>
	
</section>

<div class="container-fluid row justify-content-center my-4" id="toast" style="display: none;">
	<div class="alert bg-dark text-white text-center" id="toast-body">
		<!-- bid notification text goes here... -->
	</div>
</div>

<?php
	
	if(isset($_SESSION['bidStatus']))	 //returned to page after bids placed
	{
		if($_SESSION['bidStatus']=='recovered'){
			?>

			<script>
				$('#toast-body').text('Your bid was recovered!');
				$('#toast').show();
				setTimeout(function() {
	                        $('#toast').hide();
	                    }, 3000);
			</script>

			<?php
		}
		if($_SESSION['bidStatus']=='done'){
			?>

			<script>
				$('#toast-body').text('Your bid was placed');
				$('#toast').show();
				setTimeout(function() {
	                        $('#toast').hide();
	                    }, 3000);
			</script>

			<?php
		}

		unset($_SESSION['bidStatus']);
	}

include 'layouts/footer.php'; ?>