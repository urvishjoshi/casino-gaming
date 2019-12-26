<?php include 'layouts/header.php';
	if ($_GET['status']==1) 
		$fire = mysqli_query($conn,"SELECT * FROM user_details WHERE active='1'");
	if ($_GET['status']==-1)
		$fire = mysqli_query($conn,"SELECT * FROM user_details WHERE active='-1'");
?>

<section>

	<div class="container mt-3">
		<div class="row">
			<div class="col-md-1 d-flex align-items-start flex-column" title="Active users">
				<a href="request.php" class="fas fa-arrow-left pt-3" style="font-size: 30px;text-decoration:none; "></a>
			</div>
			<div class="col-md text-center">
				<h2><?php echo ($_GET['status']==1) ? 'Active users' : 'Denied users'; ?></h2>
			</div>
			<div class="col-md-1"></div>
		</div>

		<HR width=20%>
			<div class="container justify-content-center pt-3" id="requestTable">
				<table class="table table-hover">
				    <thead>
				    <tr class="thead-light">
				      <th scope="col" center>Id</th>
				      <th scope="col">Username</th>
				      <th scope="col">Name</th>
				      <th scope="col" width="15%">Registered on</th>
				      <th scope="col" width="20%">Action</th>
				    </tr>
				    </thead>
				    <tbody>
					<?php
						if (mysqli_num_rows($fire)<=0) {    //if no Records found
					  		echo '<tr><td colspan="5"><center><h4>No records found</h4></center></td></tr>';
					  	}

					  	while($users = mysqli_fetch_assoc($fire))
					  	{ ?>
						    <tr>
								<th scope="row"><?php echo $users['id']; ?></th>
								<td><?php echo $users['email']; ?></td>
								<td><?php echo $users['name']; ?></td>
								<td><?php echo date("d-m-Y", strtotime($users['created_at']) ); ?></td>
								<td>
									<form action="process/processUser.php" method="POST">
									<?php if($_GET['status']==1) 
											echo '<button class="btn btn-warning" name="denyBtn" type="submit" value="'.$users['id'].'">Deactive</button>';
										else 
											echo '<button class="btn btn-success" name="approveBtn" type="submit" value="'.$users['id'].'">Allow</button>'; ?> &nbsp;&nbsp;
									<button class="btn btn-danger" name="deleteBtn" type="submit" value="<?php echo $users['id']; ?>">Delete</button>
									</form>
								</td>
						    </tr>
					  		<?php
					    } ?>
				    </tbody>
				</table>
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
	                    }, 2500);
			</script>

			<?php
		}
		if($_SESSION['request_status']=='denied'){
			?>

			<script>
				$('#toast-body').text('User Deactivated !');
				$('#toast').show();
				setTimeout(function() {
	                        $('#toast').hide();
	                    }, 2500);
			</script>

			<?php
		}
		if($_SESSION['request_status']=='deleted'){
			?>

			<script>
				$('#toast-body').text('User DELETED !');
				$('#toast').show();
				setTimeout(function() {
	                        $('#toast').hide();
	                    }, 2500);
			</script>

			<?php
		}

		unset($_SESSION['request_status']);
	}

include 'layouts/footer.php'; ?>