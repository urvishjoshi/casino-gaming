<?php include 'layouts/header.php'; 
$deniedUsers = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user_details WHERE active='-1'"));
$activeUsers = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user_details WHERE active='1'"));
?>

<section>

	<div class="container mt-3">
		<div class="container col-md-auto">
		<div class="row">
			<div class="col-md-auto d-flex align-items-end flex-column ml-3" title="Active users">
				<a class="badge badge-pill badge-success font-14" href="usersInfo.php?status=1" style="float:right;margin: 0px -5px -10px 0px;padding: 2.6px 5px!important;z-index: 1;">
					<?php echo $activeUsers; ?>
				</a>
				<a href="usersInfo.php?status=1" class="fas fa-user-check" style="font-size: 34px;color: black;text-decoration:none; "></a>
			</div>
			<div class="col-md text-center">
				<h2>Pending approval requests</h2>
			</div>
			<div class="col-md-auto d-flex align-items-end flex-column mr-3" title="Denied users">
				<a class="badge badge-pill badge-warning font-14" href="usersInfo.php?status=-1" style="float:right;margin: 0px -5px -10px 0px;padding: 2.6px 5px!important;z-index: 1;">
					<?php echo $deniedUsers; ?>
				</a>
				<a href="usersInfo.php?status=-1" class="fas fa-user-times" style="font-size: 36px;color: black;text-decoration:none; "></a>
			</div>
		</div>

		<HR width=40%>
			<div class="container justify-content-center pt-3" id="requestTable">
				<table class="table table-hover">
				    <thead>
				    <tr class="thead-light">
				      <th scope="col" center>Id</th>
				      <th scope="col">Username</th>
				      <th scope="col">Name</th>
				      <th scope="col" width="20%">Registered on</th>
				      <th scope="col" width="20%">Action</th>
				    </tr>
				    </thead>
				    <tbody>
					<?php
					  	$query = "SELECT * FROM user_details WHERE active='0'";
					  	$results = mysqli_query($conn,$query) or die(mysqli_error($conn));

					  	if (mysqli_num_rows($results)<=0) {    //if no Records found
					  		echo '<tr><td colspan="5"><center><h4>No records found</h4></center></td></tr>';
					  	}

					  	while($users = mysqli_fetch_assoc($results))
					  	{ ?>
						    <tr>
								<th scope="row"><?php echo $users['id']; ?></th>
								<td><?php echo $users['email']; ?></td>
								<td><?php echo $users['name']; ?></td>
								<td><?php echo date("d-m-Y", strtotime($users['created_at']) ); ?></td>
								<td>
									<form action="process/processUser.php" method="POST">
									<button class="btn btn-success" name="approveBtn" type="submit" value="<?php echo $users['id']; ?>">Approve</button> &nbsp;&nbsp;
									<button class="btn btn-danger" name="denyBtn" type="submit" value="<?php echo $users['id']; ?>">Deny</button>
									</form>
								</td>
						    </tr>
					  		<?php
					    } ?>
				    </tbody>
				</table>
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
	
	if(isset($_SESSION['request_status']))	 //returned to page after bids placed
	{
		if($_SESSION['request_status']=='approved'){
			?>

			<script>
				$('#toast-body').text('User Approved...');
				$('#toast').show();
				setTimeout(function() {
	                        $('#toast').hide();
	                    }, 3000);
			</script>

			<?php
		}
		if($_SESSION['request_status']=='denied'){
			?>

			<script>
				$('#toast-body').text('User Denied !');
				$('#toast').show();
				setTimeout(function() {
	                        $('#toast').hide();
	                    }, 3000);
			</script>

			<?php
		}

		unset($_SESSION['request_status']);
	}

include 'layouts/footer.php'; ?>