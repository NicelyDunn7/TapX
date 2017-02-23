<!DOCTYPE html>
<html>
	<head>
		<title>Business Home Page</title>
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
				<div id="barName">
					<h1>Welcome Bar Name</h1>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="row">
					<button class="btn" data-toggle="modal" type="button" data-target="#myModal">Modify Drinks</button>
				</div>
				<div class="row">
					<button class="btn" type="button">Modify Info</button>
				</div>
				<div class="row">
					<button class="btn" type="button">Modify Login</button>
				</div>
			</div>
			<div class="col-xs-12">
				<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
				    <!-- Modal content-->
				 		<div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Modal Header</h4>
					      </div>
					      <div class="modal-body">
					        <p>Some text in the modal.</p>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
				    	</div>
				 	</div>
				</div>
			</div>
		</div>
		<script>
		</script>
	</body>
</html>	
