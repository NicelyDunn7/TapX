<!DOCTYPE html>
<html>
	 <?php
	 	if(!isset($_COOKIE['business_id']) || !isset($_COOKIE['table_id']) || !isset($_COOKIE['user_name'])){
			header('Location: home.php');
		}
	?>
	<head>
		<title>Order Your Drinks!</title>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="./css/navbar.css" type="text/css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link rel="stylesheet" href="./css/cust-order-form.css" type="text/css">
	  <link rel="stylesheet" href="./css/background.css" type="text/css">
	  <link rel="stylesheet" href="./css/cust-order-form.css" type="text/css">
	  <script src="../jquery.min.js"></script>
	  <script src="../bootstrap.min.js"></script>
		<script>
			function clickedCloseTab()
			{
				var user_choice = window.confirm('Are you sure you want to close your tab?');
				if(user_choice==true) {
					document.location.href = "close-tab.php"; 
				} else {
					return false;
				}
			}
		</script>
		
	</head>
	<body>
		<?php 
			include 'navbar.php';
		?>
		<div class="container" id="content">
			<!-- Start code for customer order form output -->
			<form action="cust-order-controller.php" method="post">
				<div class="flex-form">
					<?php
			//echo "<form action='cust-order-controller.php' method='post'>";
						//start session and include database
						include '../dbcreds.php';
		//WORK ON!		include 'cust-order-controller';

						//find the current bar you have currently selected to output on customer order page
						$bar_query = "SELECT business_name FROM businesses WHERE business_id='".$_COOKIE['business_id']."'";
						$bar_result = mysqli_query($conn, $bar_query);
						$bar = mysqli_fetch_array($bar_result);

						//print_r($_SESSION['business_id']);

						//print the name of the bar at the top of the customer order page
						//echo "<div style='text-align:center'><h1>Welcome to "; print_r($bar['business_name']); echo "!</h1></div>";

						//query to find the right drinks for the current bar
						$row_query = "SELECT * FROM item_list WHERE business_id='".$_COOKIE['business_id']."'";
						$row_result = mysqli_query($conn, $row_query);
						$row = mysqli_fetch_assoc($row_result);

						$column_query = "SHOW COLUMNS FROM item_list";
						$result = mysqli_query($conn, $column_query);

						$drink_quantity = $_POST['drink_quantity'];
						echo "<div>";
						echo "<table class='table table-striped'>";
						echo "<th> " . Drink ." </th>";
						echo "<th> " . Price ." </th>";
						echo "<th> " . Quantity ." </th>";

						while($column = mysqli_fetch_array($result)){
							if($column['Field'] != 'business_id'){
								if($row[$column['Field']] != ""){
									echo "<div class='form-group'>";
									//output a row here
										echo "<tr>";
											echo "<td class='item' width = '70%'> "; print_r($column['Field']); echo " </td>";
											echo "<td width = '20%'> "; echo "$"; print_r($row[$column['Field']]); echo "</td>";
											echo "<td width = '10%'><input class='form-control text-input' type='number' min =0 placeholder = '0' name = '" . $column['Field'] . "' value='". $row['drink_quantity'] . "'> </td>";
										echo "</tr>";
									echo "</div>";
								}
							}
						}
						mysqli_close($conn);
						echo "</table>";
						echo "</div>"

					?>
					<div class="button-flex">
						<input class='btn btn-default btn-lg' type='submit' value='Submit Order'>
						<!-- <a class='btn btn-danger btn-lg' onclick='return clickedCloseTab();' value='Close Tab' id="close-btn" >Close Tab </a> -->
						<!-- <a class='btn btn-info btn-lg' href='tab.php'>View Tab</a> -->
	                    <a class='btn btn-danger btn-lg' type="button" href='home.php'>Cancel</a>
					</div>
				</div>
			</form>
		</div>
		<script>
			function openNav() {
			    document.getElementById("mySidenav").style.width = "150px";
			}

			/* Set the width of the side navigation to 0 */
			function closeNav() {
			    document.getElementById("mySidenav").style.width = "0";
			}
			$( document ).ready(function() {
			    $(".item").each(function () {
			    	var item = $(this).text();
			    	var replacedItem = item.replace(/_/g, ' ');
			    	$(this).text(replacedItem);
				});
			});	
		</script>
	</body>
</html>
