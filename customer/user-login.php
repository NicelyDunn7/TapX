<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>User Login</title>
	  <link rel="stylesheet" href="../bootstrap.min.css">
	  <link rel="stylesheet" href="./css/user-login.css">
	  <link rel="stylesheet" href="./css/background.css" type="text/css">
	  <script src="../jquery.min.js"></script>
	  <script src="../bootstrap.min.js"></script>

	</head>
	<?php 
		include 'header.html';
	?>
	<body>
		<div class="container">
			<div class="col-xs-12 col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
				    	<h4 class="panel-title">Login with Table ID and Password</h4>
				 	</div>
				 	<div id="login-form" class="panel-body">
						<form method="POST" action="login-controller.php">
							<div class="login-group">
								<input type="hidden" name="business_id" value="<?php echo $_COOKIE['business_id']; ?>">
								<div class="form-group">
									<label for="lg_name" class="sr-only">Name</label>
									<input type="text" class="form-control" id="lg_name" name="name" placeholder="Enter Your Name">
								</div>
								<div class="form-group">
									<label for="lg_tablenum" class="sr-only">Table Number</label>
									<input type="text" class="form-control" id="lg_tablenum" name="table_num" placeholder="Table Number">
								</div>
								<div class="form-group">
									<label for="lg_password" class="sr-only">Password</label>
									<input type="password" class="form-control" id="lg_password" name="password" placeholder="Password">
								</div>
								<div class="form-group" style="display: flex;">
									<button class="btn" type="submit" name="submit">Login</button>
									<a href="../customer/home.php" class="btn btn-danger">Cancel</a>
									<!-- <input type="checkbox" id="lg_remember" name="lg_remember">
									<label for="lg_remember">Remember Me</label>-->
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
