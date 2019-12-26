<?php include 'layouts/header.php'; include 'layouts/sessionRedirect.php';  //include header ?>
	<section>
		
		<div class="container mt-4">
			<div class="container col-auto">
				<div>

					<form action="home.php" method="post" id="form" class="row justify-content-center">

					<div class="col-md-auto" id="dayDiv" style="display: <?php if (isset($_POST['selectDisplay']) && $_POST['selectDisplay']== '1') echo 'block'; else echo 'none'; ?> ;">
						<input type="date" id="date" name="date">
					</div>
					<div class="col-md-auto" id="monthDiv" style="display: <?php if (isset($_POST['selectDisplay']) && $_POST['selectDisplay']== '2') echo 'block'; else echo 'none'; ?> ;">
						<select class="custom-select" id="selectMonth" name="selectMonth">
							<option disabled>Select month</option>
								<option <?php if (isset($_POST['selectMonth']) && $_POST['selectMonth']== '1') { echo 'selected'; }; ?> value="1">
									January
								</option>
								<option <?php if (isset($_POST['selectMonth']) && $_POST['selectMonth']== '2') { echo 'selected'; }; ?> value="2">
									February
								</option>
								<option <?php if (isset($_POST['selectMonth']) && $_POST['selectMonth']== '3') { echo 'selected'; }; ?> value="3">
									March
								</option>
								<option <?php if (isset($_POST['selectMonth']) && $_POST['selectMonth']== '4') { echo 'selected'; }; ?> value="4">
									April
								</option>
								<option <?php if (isset($_POST['selectMonth']) && $_POST['selectMonth']== '5') { echo 'selected'; }; ?> value="5">
									May
								</option>
								<option <?php if (isset($_POST['selectMonth']) && $_POST['selectMonth']== '6') { echo 'selected'; }; ?> value="6">
									June
								</option>
								<option <?php if (isset($_POST['selectMonth']) && $_POST['selectMonth']== '7') { echo 'selected'; }; ?> value="7">
									July
								</option>
								<option <?php if (isset($_POST['selectMonth']) && $_POST['selectMonth']== '8') { echo 'selected'; }; ?> value="8">
									August
								</option>
								<option <?php if (isset($_POST['selectMonth']) && $_POST['selectMonth']== '9') { echo 'selected'; }; ?> value="9">
									September
								</option>
								<option <?php if (isset($_POST['selectMonth']) && $_POST['selectMonth']== '10') { echo 'selected'; }; ?> value="10">
									October
								</option>
								<option <?php if (isset($_POST['selectMonth']) && $_POST['selectMonth']== '11') { echo 'selected'; }; ?> value="11">
									November
								</option>
								<option <?php if (isset($_POST['selectMonth']) && $_POST['selectMonth']== '12') { echo 'selected'; }; ?> value="12">
									December
								</option>
						</select>
					</div>
					<div class="col-md-auto" id="displayDiv">
						<select class="custom-select" id="selectDisplay" name="selectDisplay">
							<option disabled>Display by</option>
								<option <?php if (isset($_POST['selectDisplay']) && $_POST['selectDisplay']== '0') { echo 'selected'; }; ?> value="0">
								Player
								</option>
								<option <?php if (isset($_POST['selectDisplay']) && $_POST['selectDisplay']== '1') { echo 'selected'; }; ?> value="1">
								Day
								</option>
								<option <?php if (isset($_POST['selectDisplay']) && $_POST['selectDisplay']== '2') { echo 'selected'; }; ?> value="2">
								Month
								</option>
						</select>
					</div>
					<div class="col-md-auto" id="playerDiv" style="display: <?php if (isset($_POST['selectDisplay']) || $_POST['selectDisplay']== '0' || $_POST['selectDisplay']== '2') echo 'block'; else echo 'none'; ?> ;">
						<select class="custom-select" id="selectPlayer" name="selectPlayer">
							<option disabled>Select user</option>
							<?php 	$query = "SELECT * FROM `user_details`";
									$results = mysqli_query($conn,$query);
							while($users = mysqli_fetch_assoc($results)) {
								echo '<option value="'.$users['id'].'" id="'.$users['name'].'" name="'.$users['name'].'">'.$users['name'].'</option>';
							} ?>
						</select>
					</div>
					<div class="col-md-auto">
						<button class="btn btn-primary" value="getRecord" name="getRecord" type="submit">Get Record</button>
					</div>
					</form>

				</div>
			</div>
		</div>
	</section>
<HR>
	<section>
	<?php   //-- form submitted with display by PLAYER
	
    if( isset($_POST['getRecord']) && ($_POST['selectDisplay']=='0') ) { ?>
		<div class="container justify-content-center" id="displayPlayerTable">
			<table class="table table-striped table-block">
			    <thead>
			    <tr>
			      <th scope="col">Id</th>
			      <th scope="col">Name</th>
			      <th scope="col">Games bid</th>
			      <th scope="col">Money Paid</th>
			    </tr>
			    </thead>
			    <tbody>
				<?php
			    	$player = $_POST['selectPlayer'];

				  	$query = "SELECT * FROM user_details LEFT JOIN game_data ON user_details.id=game_data.user_id where id='$player'";
				  	$results = mysqli_query($conn,$query) or die(mysqli_error($conn));

				  	if (mysqli_num_rows($results)<=0) {    //if no Records found
				  		echo '<tr><td colspan="4"><center><h4>No records found</h4></center></td></tr>';
				  	}

				  	while($users = mysqli_fetch_assoc($results))
				  	{ ?>
					    <tr>
							<th scope="row"><?php echo $users['id']; ?></th>
							<td title="<?php echo $users['email']; ?>"><?php echo $users['name']; ?></td>
							<td><?php echo $users['bid'] ?></td>
							<td><?php if($users['deposit']==null) echo 'No deposit yet'; else if($users['deposit']>=0) echo 'Paid...'; else echo $users['deposit']; ?>
							</td>
					    </tr>
				  		<?php
				    } ?>
			    </tbody>
			</table>
		</div>
		<?php 
	}

	//form submitted with display by DAY
	if( (isset($_POST['getRecord'])) && ($_POST['selectDisplay']=='1') ) { ?>
		<div class="container justify-content-center" id="displayDayTable">
			<table class="table table-striped table-block">
			    <thead>
			    <tr>
			      <th scope="col">Id</th>
			      <th scope="col">Name</th>
			      <th scope="col">Games bid</th>
			      <th scope="col">Money Paid</th>
			    </tr>
			    </thead>
			    <tbody>
				<?php
			    	$player = $_POST['selectPlayer'];
			    	$day = $_POST['date'];
			    	
				  	$query = "SELECT * FROM user_details LEFT JOIN game_data ON user_details.id=game_data.user_id where game_data.created_at='$day'";
				  	$results = mysqli_query($conn,$query) or die(mysqli_error($conn));

				  	if (mysqli_num_rows($results)<=0) {    //if no Records found
				  		echo '<tr><td colspan="4"><center><h4>No records found</h4></center></td></tr>';
				  	}

				  	while($users = mysqli_fetch_assoc($results))
				  	{ ?>
					    <tr>
							<th scope="row"><?php echo $users['id']; ?></th>
							<td title="<?php echo $users['email']; ?>"><?php echo $users['name']; ?></td>
							<td><?php echo $users['bid'] ?></td>
							<td><?php if($users['deposit']==null) echo 'No deposit yet'; else if($users['deposit']>=0) echo 'Paid...'; else echo $users['deposit']; ?>
							</td>
					    </tr>
				  		<?php
				    } ?>
			    </tbody>
			</table>
		</div>
		<?php 
	}

    //-- form submitted with display by MONTH
    if( (isset($_POST['getRecord'])) && ($_POST['selectDisplay']=='2') ) { ?>
		<div class="container justify-content-center" id="displayMonthTable">
			<table class="table table-striped table-block">
			    <thead>
			    <tr>
			      <th scope="col">Id</th>
			      <th scope="col">Name</th>
			      <th scope="col">Games bid</th>
			      <th scope="col">Money Paid</th>
			    </tr>
			    </thead>
			    <tbody>
				<?php
					$player = $_POST['selectPlayer'];
					$month = $_POST['selectMonth'];

				  	$query = "SELECT * FROM game_data LEFT JOIN user_details ON game_data.user_id=user_details.id WHERE MONTH(game_data.created_at) = '$month' AND game_data.user_id='$player'";
				  	$results = mysqli_query($conn,$query) or die(mysqli_error($conn));

				  	if (mysqli_num_rows($results)<=0) {    //if no Records found
				  		echo '<tr><td colspan="4"><center><h4>No records found</h4></center></td></tr>';
				  	}

				  	while($users = mysqli_fetch_assoc($results))
				  	{ ?>
					    <tr>
							<th scope="row"><?php echo $users['id']; ?></th>
							<td title="<?php echo $users['email']; ?>"><?php echo $users['name']; ?></td>
							<td><?php echo $users['bid'] ?></td>
							<td>
								<?php if($users['deposit']==null) echo 'No deposit yet'; else if($users['deposit']>=0) echo 'Paid...'; else echo $users['deposit']; ?>
							</td>
					    </tr>
				  		<?php
				    } ?>

			    </tbody>
			</table>
		</div>
		<?php 
	} ?>
	</section>

<?php include 'layouts/footer.php'; ?>

<script>
	$(function(){

		var selectedVal = $('#selectDisplay option:selected').val();
		if (selectedVal==1) {
			$('#playerDiv').css('display','none');
		}

		$('#selectDisplay').change(function(){
			var selectedVal = $('#selectDisplay option:selected').val();

			switch(selectedVal) {
				case '0':  			//for display only by Player
					$('#playerDiv').css('display','block');
					$('#dayDiv').css('display','none');
					$('#monthDiv').css('display','none');
					break;
				case '1':  			//for display only by Day
					$('#dayDiv').css('display','block');
					$('#monthDiv').css('display','none');
					$('#playerDiv').css('display','none');
					break;
				case '2':  			//for display only by Month
					$('#playerDiv').css('display','block');
					$('#monthDiv').css('display','block');
					$('#dayDiv').css('display','none');
					break;
			}
		})
	});
</script>
