<!DOCTYPE html>
<html>
	<head>
		<title>Modify Items</title>
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
	</head>
	<body>
		<div class="container">
			<div class="col-xs-12">
				<div id="title">
					<h1>Modify Items</h1>
				</div>
			</div>
			<div class="col-xs-12">

                <table>
                    <?php
                        include '../dbcreds.php';
                    //Fetch all from item table for establishment
                        $row_query = "SELECT * FROM item_list WHERE business_id='1'";
                        $row_result = mysqli_query($conn, $row_query);
                        $row = mysqli_fetch_assoc($row_result);
                    //Fetch columns from item table
                        $column_query = "SHOW COLUMNS FROM item_list";
                    //For each column, print column title and corresponding price
                        $result = mysqli_query($conn, $column_query);
                        while($column = mysqli_fetch_array($result)){
                            echo '<tr>';
                            echo '<td>';
                            echo $column['Field'];
                            echo '</td>';
                            echo '<td>';
                            echo $row[$column['Field']];
                            echo '</td>';
                            echo '</tr>';
                        }
                    ?>
                </table>

				<div class="row">
					<button class="btn" type="button">Save</button>
                    <button class="btn" type="button">Cancel</button>
				</div>
			</div>
		</div>
	</body>
</html>
