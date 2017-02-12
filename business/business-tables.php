<?php
	include '../dbcreds.php';
	session_start();
	$_SESSION['business_id'] = 1;

		$table_query =  "SELECT * FROM tables WHERE business_id='".$_SESSION['business_id']."'";
		while ($row = mysql_fetch_object($table_query)) {
    echo $row->table_id;
    echo $row->table_num;
}




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
			<script>
			</script>

		</head>
	<body>
		<div class="container">
			<div class="col-xs-12">
              <!-- My code starts here. Delete this comment after styling. -->
				<button name="tables" id='tables' onclick="numTables()">button</button>


			</div>
		</div>
	</body>
</html>
