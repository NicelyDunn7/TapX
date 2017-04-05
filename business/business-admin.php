<!DOCTYPE html>
<?php 
	include "../dbcreds.php";
	session_start();
?>
<html>
	<head>
		<title>Business Home Page</title>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="./css/business-admin.css">
	</head>
	<body>
		<div class="col-md-12">
			<div id="barName">
  				<?php  
					$bar_query = "SELECT business_name FROM businesses WHERE business_id='".$_SESSION['business_id']."'";
					$bar_result = mysqli_query($conn, $bar_query);
					$bar = mysqli_fetch_array($bar_result);
					$_SESSION['business_name'] = $bar[0];
					echo "<h1>Welcome " .$_SESSION['business_name']. "<img src='../img/TapXLogo.png' alt='TapX' style='width:150px;height:120px;'></h1>";
				?>
			</div>
		</div>
		<div class="container">
			<div class="col-md-12" id="buttonGroups">
				<div id="addButtonGroup">
					<div class="row">
						<!-- <h2>Click here to modify your tables!</h2> -->
						<button class="btn-lg btn-info" data-toggle="modal" type="button" data-target="#addTableModal">Add A Table</button>
					</div>
					<div class="row">
						<!-- <h2>Click here to add your login information or update your login information!</h2> -->
						<button class="btn-lg btn-info" data-toggle="modal" type="button"  data-target="#addLoginModal">Add Admin Login</button>
					</div>
				</div>	
				<div id="modifyButtonGroup">
					<div class="row">
						<!-- <h2>Click here to add your information or update your information!</h2> -->
						<button class="btn-lg btn-info" data-toggle="modal" type="button" data-target="#infoModal">Modify Info</button>
					</div>
					<div class="row">
						<!-- <h2>Click here to add your login information or update your login information!</h2> -->
						<button class="btn-lg btn-info" data-toggle="modal" type="button"  data-target="#loginModal">Modify Admin Login</button>
					</div>
					<div class="row">
						<!-- <h2>Click here to modify your tables!</h2> -->
						<button class="btn-lg btn-info" data-toggle="modal" type="button" data-target="#modifyTableModal">Modify Tables</button>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div id="modifyTableModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
				    <!-- Modal content-->
				 		<div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h4 class="modal-title">Modify Tables</h4>
					      </div>
					      <div class="modal-body">
					      <form action="update-tables.php" method="POST">
					        <?php
					        	//pulled lukes code from the business-tables page to draw the tables.
								// $_SESSION['business_id'] = 1; //*********************** CHANGE THIS WHEN WE GET BAR LOGIN WORKING!!!! ****************************
								$bar_query = "SELECT business_name FROM businesses WHERE business_id='".$_SESSION['business_id']."'";
										$bar_result = mysqli_query($conn, $bar_query);
										$bar = mysqli_fetch_array($bar_result);

										//print the name of the bar at the top of the customer order page
										echo "<p>Tables for "; print_r($bar[0]); echo "!</p>";

									echo "<h1>".$_SESSION['business_name']."</h1>";
									$table_query =  "SELECT * FROM tables WHERE business_id='".$_SESSION['business_id']."'";
									$table_result = mysqli_query($conn, $table_query);
									echo "<select name='table_number'>";
									while($row = mysqli_fetch_array($table_result)){
										echo "<option id='". $row['table_num']."'>". $row['table_num']."</option>";
									}
									echo "</select>";
									mysqli_close($conn);
							?>
							<input type="password" name="old_password" placeholder="Old Password">
							<input type="password" name="new_password" placeholder="New Password">
							<input type="password" name="new_password_2" placeholder="Confirm New Password">
							<input type="submit" name="submit" value="X">
							<input type="submit" name="submit" value="Update">
						  </form>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
				    	</div>
				 	</div>
				</div>
				<div id="addTableModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
				    <!-- Modal content-->
				 		<div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h4 class="modal-title">Add a Table</h4>
					      </div>
					      <div class="modal-body">
					      <form action="add-table.php" method="POST">
					        <input type="number" name="table_number" placeholder="Table Number">
							<input type="password" name="new_password" placeholder="New Password">
							<input type="password" name="new_password_2" placeholder="Confirm New Password">
							<input type="submit" name="submit" value="Add Table">
						  </form>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
				    	</div>
				 	</div>
				</div>
				<div id="infoModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
				    <!-- Modal content-->
				 		<div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Modal Header</h4>
					      </div>
					      <div class="modal-body">
						      <form action="update-info.php" method="POST">
						        <?php
									include '../dbcreds.php';
								?>
								<input type="text" name="business_name" placeholder="Business">
								<input type="text" name="address1" placeholder="Address">
								<input type="text" name="address2" placeholder="Address Two (Leave Blank if N/A)">
								<input type="text" name="city" placeholder="City">
								<input type="text" name="state" placeholder="State">
								<input type="text" name="zip" placeholder="Zip Code">
								<input type="submit" name="submit" value="Update">
							  </form>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
				    	</div>
				 	</div>
				</div>
				<div id="loginModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
				    <!-- Modal content-->
				 		<div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Modal Header</h4>
					      </div>
					      <div class="modal-body">
						      <form action="update-login.php" method="POST">
								<input type="text" name="username" placeholder="Username">
								<input type="password" name="old_password" placeholder="Old Password">
								<input type="password" name="new_password" placeholder="New Password">
								<input type="password" name="new_password_2" placeholder="Confirm New Password">
								<input type="submit" name="submit" value="Update">
							  </form>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
				    	</div>
				 	</div>
				</div>
			</div>
			<div id="addLoginModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
				    <!-- Modal content-->
				 		<div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Add Admin</h4>
					      </div>
					      <div class="modal-body">
						      <form action="add-login.php" method="POST">
						        <input type="text" name="admin_username" placeholder="Admin Username">
								<input type="password" name="new_password_admin" placeholder="New Password">
								<input type="password" name="new_password_admin_2" placeholder="Confirm New Password">
								<input type="submit" name="submit" value="Add Admin">
							  </form>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
				    	</div>
				 	</div>
				</div>
			</div>
		</div>
	</body>
</html>	
