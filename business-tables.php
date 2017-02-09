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
					<h1>Restautant Name</h1>
				</div>
			</div>
			<div class="col-xs-12">

                <!-- My code starts here. Delete this comment after styling. -->
                <div>
                    <form role='form' action='save-changes.php' method='POST'>
                        <?php
							//Start the session and include the database credentials
							session_start();
                            include '../dbcreds.php';
                            $row_query = "SELECT count(table_id) FROM tables WHERE business_id='".$_SESSION['business_id']."'";
                            $row_result = mysqli_query($conn, $row_query);
                            $row = mysqli_fetch_assoc($row_result);


                        ?>
                        <input class='btn btn-info btn-lg' type='submit' value='Save'>
                        <a class='btn btn-success btn-lg' href='business-home.php'>Cancel</a>
                    </form>
                </div>
                <!-- My code ends here. Delete this comment after styling. -->

			</div>
		</div>
	</body>
</html>
