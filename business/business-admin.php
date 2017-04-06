<!DOCTYPE html>
<?php
	include "../dbcreds.php";
	session_start();
	if(!isset($_SESSION['business_id']) || !isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])){
		header('Location: business-login.php');
	}
?>
<html>
	<head>
		<title>Business Home Page</title>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="./css/business-admin.css">
		<script src="../jquery.min.js"></script>
		<script src="../bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
	</head>
	<body>
		<div class="container">
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
			<div class="col-md-12" id="buttonGroup">
				<div class="row">
					<a href="business-tables.php" class="btn-lg btn-info" type="button">Tables Page</a>
				</div>
				<div class="row">
					<!-- <h2>Click here to modify your tables!</h2> -->
					<button class="btn-lg btn-info" data-toggle="modal" type="button" data-target="#modifyTableModal">Modify Tables</button>
				</div>
				<div class="row">
					<!-- <h2>Click here to modify your tables!</h2> -->
					<button class="btn-lg btn-info" data-toggle="modal" type="button" data-target="#addTableModal">Add A Table</button>
				</div>
				<div class="row">
					<!-- <h2>Click here to add your information or update your information!</h2> -->
					<button class="btn-lg btn-info" data-toggle="modal" type="button" data-target="#infoModal">Modify Info</button>
				</div>
				<div class="row">
					<!-- <h2>Click here to add your login information or update your login information!</h2> -->
					<button class="btn-lg btn-info" data-toggle="modal" type="button"  data-target="#loginModal">Modify Admin Login</button>
				</div>
				<div class="row">
					<!-- <h2>Click here to add your login information or update your login information!</h2> -->
					<button class="btn-lg btn-info" data-toggle="modal" type="button"  data-target="#addLoginModal">Add Admin Login</button>
				</div>
				<div class="row">
					<button class="btn-lg btn-info" data-toggle="modal" type="button"  data-target="#modifyItemsModal">Modify Items</button>
				</div>
				<div class="row">
					<button class="btn-lg btn-info" data-toggle="modal" type="button" data-target="#uploadMenuModal">Upload PDF Menu</button>
				</div>
				<?php
					$path = '../menus/' . $_SESSION['business_id'] . '.pdf';
					if(file_exists($path)){
						echo "
							<div class='row'>
								<a href='" . $path . "' class='btn-lg btn-info' type='button'>View PDF Menu</a>
							</div>
						";
					}
				 ?>
				 <div class="row">
					 <a href="logout-controller.php" class="btn-lg btn-info" type="button">Logout</a>
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
			<div id="modifyItemsModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
				    <!-- Modal content-->
				 		<div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Modify Items</h4>
					      </div>
					      <div class="modal-body">
							  <form role='form' action='save-changes.php' method='POST'>
	  	                        <?php
	  								//Start the session and include the database credentials
	  	                            include '../dbcreds.php';

	  								//Select all the item information for the business based on the session variable of
	  								//the business_id and store them in an associate array
	  	                            $row_query = "SELECT * FROM item_list WHERE business_id='".$_SESSION['business_id']."'";
	  	                            $row_result = mysqli_query($conn, $row_query);
	  	                            $row = mysqli_fetch_assoc($row_result);

	  								//Query the column names for the item_list table
	  	                            $column_query = "SHOW COLUMNS FROM item_list";
	  	                            $result = mysqli_query($conn, $column_query);

	  								//Use the column names to print the item name and find the corresponding price
	  								//in the associate array of item prices for that business
	  	                            while($column = mysqli_fetch_array($result)){
	  	                                if($column['Field'] != 'business_id'){
	  	                                    echo "<div class='form-group'>";
	  	                                    echo "<label class='inputdefault'>";
	  	                                    echo $column['Field'];
	  	                                    echo "</label>";
	  	                                    echo "<input class='form-control text-input' type='number' step='0.01' name='".$column['Field']."' value='".$row[$column['Field']]."'>";
	  	                                    echo "</div>";
	  	                                }
	  	                            }
	  								mysqli_close($conn);
	  	                        ?>
	  	                        <input class='btn btn-info btn-lg' type='submit' value='Save'>
	  	                    </form>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
				    	</div>
				 	</div>
				</div>
				<div id="uploadMenuModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Upload PDF Menu</h4>
							</div>
							<div class="modal-body">
								<form action="upload-menu.php" method="POST" enctype="multipart/form-data">
									Select a PDF file to upload:
									<input type="file" name="pdf" id="pdf" accept="application/pdf">
									<input type="submit" value="Upload Menu" name="submit">
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
