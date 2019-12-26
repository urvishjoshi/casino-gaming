<?php include 'layouts/header.php'; 

	$email = $_SESSION['casino_user'];
	$fire = mysqli_query($conn,"SELECT * FROM user_details WHERE email= '$email' AND active='0'")or die(mysqli_error($conn));

	if (mysqli_num_rows($fire)>=1) {  //if not active then not ABLE to bid
		?>  
		<script>
			$(function() {  //disables all inputs
				$("form *").attr("disabled", "disabled").off('click');
				$("form *").attr("title", "Sorry, You are not eligible to bid yet");
			})
		</script>
		<?php
	}

	$fire=mysqli_query($conn,"SELECT id,deposit FROM user_details WHERE email= '$email'")or die(mysqli_error($conn));
	$result = mysqli_fetch_array($fire);

	$totalBid = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(bid) FROM game_data WHERE user_id= '$result[0]'"));
?>

<section>
	<div class="container-fluid row mt-4">
		<div class="col-md-3">
		</div>
		<div class="col-md-6 mx-auto">
			<center><h2>Deposit in your account</h2></center>
			<HR width=85%>
			<div class="row justify-content-center">

				<form action="process/depositProcess.php" method="POST">
					<div class="form-group">
						<label for="deposit" class="form-label">Enter deposit value in <i class="fa fa-rupee"></i></label>
						<input type="text" name="deposit" id="deposit" class="form-control" value="<?php echo $totalBid['SUM(bid)']; ?>" placeholder="<?php if($totalBid['SUM(bid)']!=NULL) echo 'Add ₹ '.$totalBid['SUM(bid)'].'to your A/C'; else echo 'Wallet balance ₹'.$result[1]; ?>" required>
					</div>
					
					<div class="row justify-content-center">
						<button type="submit" name="depositBtn" id="depositBtn" class="btn btn-primary">Deposit</button>
					</div>
				</form>

			</div>
		</div>
		<div class="col-md-3 justify-content-center text-center pt-3 mt-5">
			<div class="col-md-auto border rounded py-2">
			<h5>Total of bids</h5>
			<HR class="dropdown-divider">
			<?php
				

				$fire = mysqli_query($conn,"SELECT * FROM game_data WHERE user_id= '$result[0]'")or die(mysqli_error($conn));

				if (mysqli_num_rows($fire)==0) {    //no bids found
					echo '<h6 class="text-secondary">No bigs yet,<br>your all bids are shown here..</h6>';
				}
				else{ 	//more than 1 bids found
					$deposit = mysqli_fetch_assoc(mysqli_query($conn,"SELECT deposit FROM user_details WHERE id= '$result[0]'"));
					
					if (($deposit['deposit'] >= 0) && (mysqli_num_rows($fire)==0)) {	//if deposit is not null and has no bids
						echo '<span class="text-success">Your all bids are recovered, you can make more bids...</span>';
					}
					else{	?>  <!-- has bids pending for payment -->
					
					Needs deposit of <span class='badge badge-info font-14'>₹<?php echo $totalBid['SUM(bid)']; ?></span> in your A/C<br>
					<?php 

					}
				}
			?>
			</div>
		</div>
	</div>
	
</section>

<div class="container-fluid row justify-content-center my-5" id="toast" style="display: none;">
	<div class="alert bg-dark text-white text-center" id="toast-body">
		<!-- bid notification text goes here... -->
	</div>
</div>

<?php
	
	if(isset($_SESSION['deposit_status']))	 //returned to page after bids placed
	{
		if($_SESSION['deposit_status']=='recovered'){
			?>

			<script>
				$('#toast-body').text('Deposit recovered by all bids...');
				$('#toast').show();
				setTimeout(function() {
	                        $('#toast').hide();
	                    }, 3000);
			</script>

			<?php
		}
		if($_SESSION['deposit_status']=='added'){
			?>

			<script>
				$('#toast-body').text('Deposit added to wallet');
				$('#toast').show();
				setTimeout(function() {
	                        $('#toast').hide();
	                    }, 3000);
			</script>

			<?php
		}

		unset($_SESSION['deposit_status']);
	}

include 'layouts/footer.php'; ?>