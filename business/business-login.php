<!DOCTYPE html>
<!-- Login page for businesses -->
<html>
	<head>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Business Login</title>
		<link rel="stylesheet" href="../bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/business-login.css">
		<link rel="stylesheet" href="./css/background.css" type="text/css">
	</head>
	<body>
		<div class="container">
			<div class="col-xs-12 col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
				    	<h4 class="panel-title">Login with Business ID and Password</h4>
				 	</div>
				 	<div id="login-form" class="panel-body">
						<form method="POST"	action="login-controller.php">
							<div class="login-group">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Business ID" name="business_id">
								</div>
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Username" name="username">
								</div>
								<div class="form-group">
									<input class="form-control" type="password" placeholder="Password" name="password">
								</div>
								<div class="form-group">
									<button class="btn" type="submit" name="submit">Login</button>
									<a href="../customer/home.php" class="btn btn-danger">Cancel</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
