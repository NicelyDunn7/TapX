<!DOCTYPE html>
<html>
	<head>
		<title>Table Page</title>
		<!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.mis.js"></script-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script>
		/*	$(document).ready(function(createTable){
				$('.business-tables').click(function(event){
					$.ajax({
						type: 'get',
						url: 'business-db.php',
						data: $(this).val('id'),
						success: function(data){
							var data = $.parseJSON(data);
							$.each(data, function(index, element) {
            		$('body').append($('<button>', {
									text: element.table_num
            		}));
        			});
								console.log(data);
								alert(data);
							//createTable(data);
						},
						error: function(){
								console.log("error");
										alert("Error");
						}
						});
					});

			});*/
		</script>

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
		<?php
			include '../dbcreds.php';
			session_start();
			$_SESSION['business_id'] = 1;
			$bar_query = "SELECT business_name FROM businesses WHERE business_id='".$_SESSION['business_id']."'";
					$bar_result = mysqli_query($conn, $bar_query);
					$bar = mysqli_fetch_array($bar_result);

					//print the name of the bar at the top of the customer order page
					echo "<div style='text-align:center'><h1>Welcome to "; print_r($bar[0]); echo "!</h1></div><br><br>";

				echo "<h1>".$_SESSION['business_name']."</h1>";
				$table_query =  "SELECT * FROM tables WHERE business_id='".$_SESSION['business_id']."'";
				$table_result = mysqli_query($conn, $table_query);

				while($row = mysqli_fetch_array($table_result)){
					echo "<button id='". $row['table_id']."'>". $row['table_num']."</button>";
				}
				mysqli_close($conn);
		?>
		<div class="container">
			<div class="col-xs-12">
              <!-- My code starts here. Delete this comment after styling. -->


</script>

			</div>
		</div>
	</body>
</html>
