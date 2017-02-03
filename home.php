<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
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
					<h1>Banner Text Here</h1>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="row">
					<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">State<span class="caret"></span></button>
					<ul class="dropdown-menu" role="menu">
						<?php  
							
						?>
					</ul>
				</div>
				<div class="row">
					<button class="btn btn-default dropdown-toggle" type="button" id="menu2" data-toggle="dropdown">City<span class="caret"></span></button>
					<ul class="dropdown-menu" role="menu">
					
					</ul>					
				</div>
				<div class="row">
					<ul class="dropdown-menu" role="menu">
					</ul>				
					<button class="btn btn-default dropdown-toggle" type="button" id="menu3" data-toggle="dropdown">Bar<span class="caret"></span></button>
				</div>
			</div>
		</div>
	</body>
</html>	