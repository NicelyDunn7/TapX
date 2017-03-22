<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Business Login</title>
		<link rel="stylesheet" href="../bootstrap.min.css">
		<style type="text/css">
			.jumbotron{
				height: 100vh;
			}

			.jumbotron .container {
 				max-width: 100%;
			}

			.row{
				margin: auto;
			}
		</style>
	</head>
	<body>
		<div class="jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<h1>Business Login Page</h1>
						<form method="POST"	action="login-controller.php">
							<div class="login-group">
								<input type="text" placeholder="Business ID" name="business_id">
								<input type="text" placeholder="Username" name="username">
								<input type="password" placeholder="Password" name="password">
								<button type="submit" name="submit">Login</button>
							</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
