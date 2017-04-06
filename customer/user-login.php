<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>User Login</title>
	  <link rel="stylesheet" href="../bootstrap.min.css">
	  <script src="../jquery.min.js"></script>
	  <script src="../bootstrap.min.js"></script>
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
			h1{
				text-align: center;
			}

			.login-group{
				width: 50%;
    			margin: 0 auto;
			}

			#lg_username, #lg_password{

			}
		</style>
	</head>
	<body>
		<div class="jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-lg-12">
						<h1>Customer Login Page</h1>
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
								<div class="form-group login-group-checkbox">
									<button type="submit" name="submit">Login</button>
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
