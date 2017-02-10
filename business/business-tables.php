<?php
	include 'dbcreds.php';
	session_start();
	$_SESSION['business_id'] = 1;
						$bar_query =  "SELECT * FROM tables WHERE business_id='".$_SESSION['business_id']."'";
						$bar_result = mysqli_query($conn, $bar_query);
						$bar = mysqli_fetch_assoc($bar_result);
						//print the name of the bar at the top of the customer order page
					//	while($column = mysqli_fetch_array($bar_result)){
							echo "<div style='text-align:center'><h1>Welcome to "; print_r($bar); echo "!</h1></div><br><br>";
					//	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Restaurant Name</title>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<style type="text/css">
			.container{
				margin: 0 auto;
				max-width: 100%;
			}
			.row{
				padding: 5px;
				text-align:center;
			}
			#barName{
				text-align: center;
			}
			</style>

<?php
			//SELECT number of table_ids from tables where business_id = $_SESSION
			//$table_query = "SELECT count(table_id) FROM tables WHERE business_id='".$_SESSION['business_id']."'";
			//$table_result =  mysqli_query($conn, $table_query);
			//$table = mysqli_fetch_assoc($table_result);

			//print_r($table);

//			print_r($result);
			//Print number
			echo "<div style='text-align:center'><h1>table_ids: "; print_r($table[0]); echo "</h1></div><br><br>";

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
			while($row = mysqli_fetch_array($result)) {
    		if($row['Field'] != 'business_id'){
					echo "<div class='btn-group'>";
					echo $row['Field'];
					echo "</div>";
				}
			}
?>

		</head>
	<body>
		<div class="container">
			<div class="col-xs-12">
              <!-- My code starts here. Delete this comment after styling. -->
				<button name="tables" id='table_id'> </button>


			</div>
		</div>
	</body>
</html>
