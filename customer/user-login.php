<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>User Login</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
						<div class="login-group">
							<div class="form-group">
								<label for="lg_username" class="sr-only">Username</label>
								<input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="lg_password" class="sr-only">Password</label>
								<input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="Password">
							</div>
							<div class="form-group login-group-checkbox">
								<input type="checkbox" id="lg_remember" name="lg_remember">
								<label for="lg_remember">Remember Me</label>
							</div>
						</div>
					</div>  	
				</div>  
			</div>	
		</div>
	</body>
</html>
