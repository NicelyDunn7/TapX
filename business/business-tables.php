<!DOCTYPE html>
<html>
	<head>
		<title>Restaurant Name</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.mis.js"></script>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script>
			($function(){
				$('#tables-javascript').bootstrapTable({
					method: 'get',
					url: 'bootstrap_file.json',
					columns: [{
						field: 'table_id',
						title: 'table_id',
						align: 'center'
					},{
						field: 'table_num',
						title: 'table_num',
						align: 'center'
					}
					}]
				})
			}
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
		<div class="container">
			<div class="col-xs-12">
              <!-- My code starts here. Delete this comment after styling. -->
				<button id='tables-javascript'>button</button>

</script>

			</div>
		</div>
	</body>
</html>
