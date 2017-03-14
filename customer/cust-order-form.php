<!DOCTYPE html>
<html>
	 <?php session_start()

	?> 
	<head>
		<title>Home Page</title>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css">
			<!-- WHERE CSS STARTED -->	
		</style>
	</head>
	<body>
		<div class="container">
			<div class="col-xs-12">
				<div id="barName">
					<!-- <h1>Bar Name Here</h1> --> 
				</div>
			</div>
			<div class="col-xs-12">


				<!-- Start code for customer order form output -->
				<form action="cust-order-controller.php" method="post">
					<?php
			//echo "<form action='cust-order-controller.php' method='post'>";
						//start session and include database
						session_start();
						include '../dbcreds.php';
		//WORK ON!		include 'cust-order-controller';

						//find the current bar you have currently selected to output on customer order page
					/*	$_SESSION['business_id'] = 2;*/
						$bar_query = "SELECT business_name FROM businesses WHERE business_id='".$_COOKIE['business_id']."'";
						$bar_result = mysqli_query($conn, $bar_query);
						$bar = mysqli_fetch_array($bar_result);
						
						//print_r($_SESSION['business_id']);
						
						//print the name of the bar at the top of the customer order page
						echo "<div style='text-align:center'><h1>Welcome to "; print_r($bar['business_name']); echo "!</h1></div><br><br>";
						
						//query to find the right drinks for the current bar
						$row_query = "SELECT * FROM item_list WHERE business_id='".$_COOKIE['business_id']."'";
						$row_result = mysqli_query($conn, $row_query);
						$row = mysqli_fetch_assoc($row_result);
						
						$column_query = "SHOW COLUMNS FROM item_list";
						$result = mysqli_query($conn, $column_query);
						
						$drink_quantity = $_POST['drink_quantity'];
						
						echo "<table style='width:100%' border='5px' >";
						echo "<th> " . Drink ." </th>";
						echo "<th> " . Price ." </th>";
						echo "<th> " . Quantity ." </th>";
	
						while($column = mysqli_fetch_array($result)){
							if($column['Field'] != 'business_id'){
								if($row[$column['Field']] != ""){
									echo "<div class='form-group'>";
									//output a row here
										echo "<tr>";
											echo "<td width = '70%'> "; print_r($column['Field']); echo " </td>";
											echo "<td width = '20%'> "; echo "$"; print_r($row[$column['Field']]); echo "</td>";											
									//echo "<td width = '20%' name = '". $row[$column['Field']] ."'></td>";
											echo "<td width = '10%'><input class='form-control text-input' type='number' min =0 placeholder = '0' name = '" . $column['Field'] . "' value='". $row['drink_quantity'] . "'> </td>";
										
										echo "</tr>";
									echo "</div>";
								}
							}
						}
						mysqli_close($conn);
						echo "</table>";
						
						//echo "<input class='btn btn-info btn-lg' type='submit' value='Submit Order'>";
						//echo " <a class='btn btn-success btn-lg' href='home.php'>Cancel</a>	";
					?>	
					<input class='btn btn-info btn-lg' type='submit' value='Submit Order'>
                    <a class='btn btn-success btn-lg' href='home.php'>Cancel</a>	
				</form>
			</div>
		</div>
	</body>
</html>	
