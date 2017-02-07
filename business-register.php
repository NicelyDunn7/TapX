<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Business Login</title>
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
		</style>	
	</head>
	<body>
		<div class="jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<h1>Business Register Page</h1>
						<form id='register' action='register.php' method='post'accept-charset='UTF-8'>
                            <fieldset >
                                <legend>Register</legend>
                                <input type='hidden' name='submitted' id='submitted' value='1'/>
                                <label for='name' >Your Full Name*: </label>
                                <input type='text' name='name' id='name' maxlength="50" />
                                <label for='email' >Email Address*:</label>
                                <input type='text' name='email' id='email' maxlength="50" />
 
                                <label for='username' >UserName*:</label>
                                <input type='text' name='username' id='username' maxlength="50" />
 
                                <label for='password' >Password*:</label>
                                <input type='password' name='password' id='password' maxlength="50" />
                                <input type='submit' name='Submit' value='Submit' />
 
                            </fieldset>
                        </form>
					</div>  	
				</div>  
			</div>	
		</div>
	</body>
</html>
