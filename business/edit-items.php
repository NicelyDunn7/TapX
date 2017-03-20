<!DOCTYPE html>
<html>
	<?php
		session_start();
		if(!isset($_SESSION['business_id']) || !isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])){
			header('Location: business-login.php');
		}
	 ?>
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
                <div>
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
                        <a class='btn btn-success btn-lg' href='business-home.php'>Cancel</a>
                    </form>
                </div>
			</div>
		</div>
	</body>
</html>
