<!DOCTYPE html>
<html>
	 <?php session_start()

	?> 
	<head>
		<title>Home Page</title>
		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css">
			.container{
				margin: 0 auto;
				max-width: 100%;
			}
			.row{
				padding: 5px;
				text-align:center;
			}
			.dropdown-container{
				text-align: center;
				padding: 5px;
				position: relative;
			}
			#barName{
				text-align: center;
			}
			.dropdown-menu {
			  left: 50%;
			  right: auto;
			  text-align: center;
			  width: 10px;
			  transform: translate(-50%, 0);
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
				<form action="./bar-controller.php" method="post" id="bar-controller" >
					<!-- these two inputs are here to serve as the post targets for this form -->
   					 <input class="span2" id="state_input" name="state_input" type="hidden"> 
   					 <input class="span2" id="city_input" name="city_input" type="hidden">
					<div class="dropdown-container">	
						<button type="button" class="btn btn-primary dropdown-toggle" id="stateMenu" data-toggle="dropdown">State<span class="caret"></span></button>
						<ul class="dropdown-menu" id="stateDropdown" role="menu">						
							<?php 
								include "./state-controller.php";
								// print_r($_SESSION['states']);
								// foreach ($_SESSION['states'] as $s => $v)
								for($i = 0; $i < $_SESSION['state_count']; $i++)
								{
								 	echo "<li onclick=\"$('#state_input').val('";
								 	echo $_SESSION['states'][$i];
								 	echo "'); \"><a href='#'>";
								 	echo $_SESSION['states'][$i];
								 	echo "</a></li>";
								}
											
							?>

						</ul>
					</div>
					<div class="dropdown-container">
						<button class="btn btn-primary dropdown-toggle" type="button" id="cityMenu" data-toggle="dropdown" >City<span class="caret"></span></button>
							<ul class="dropdown-menu" id="cityDropdown" role="menu">
							 <?php
								include './city-controller.php';
								for($i = 0; $i < $_SESSION['city_count']; $i++)
								{
								 	echo "<li onclick=\"$('#city_input').val('";
								 	echo $_SESSION['cities'][$i];
								 	echo "'); \"><a href='#'>";
								 	echo $_SESSION['cities'][$i];
								 	echo "</a></li>";
								}
							?> 
							
						</ul>					
					</div>
					<div class="row">
						<button class="btn btn-primary" type="submit" onclick="myFunction" id="barMenu">Bar</button>
					</div>
					<div class="row">
					    <select id="bars">
					    <?php
							for($k = 0; $k < $_SESSION['bar_count']; $k++)
							{
								// echo "<option value = ";
								
								// echo ">";
								echo "<option>";
								echo $_SESSION['names'][$k];
								//echo $_SESSION['bars'][$k];
								echo "</option>";
								// echo "<option value = ";
								// echo $_SESSION['addresses'][$k];
								// echo ">";
								// echo "<option value = ";
								// echo $_SESSION['address2'][$k];
								// echo ">";
								// echo "<option value = ";
								// echo $_SESSION['city'][$k];
								// echo ">";
								// echo "<option value = ";
								// echo $_SESSION['state'][$k];
								// echo ">";
								// echo "<option value = ";
								// echo $_SESSION['zip'][$k];
								// echo ">";
							}
						?>
						</select>
					</div> 
					<div class="row">
						<a class="btn btn-default" href="./user-login.php" id="go-to-login">Go to Login</a>
					</div>
				</form>
			</div>
		</div>
	</body>
	<script type="text/javascript">
		$(function(){
    		$("#stateDropdown li a").click(function(){
				// document.getElementById("cityMenu").disabled = false;
		    	$("#stateMenu").text($(this).text());
		    	var selected_state = $("#stateMenu").text();

		    	sessionStorage.setItem('selected_state', selected_state);
			});

		});
		$(function(){
    		$("#cityDropdown li a").click(function(){
				// document.getElementById("cityMenu").disabled = false;
		    	$("#cityMenu").text($(this).text());
		    	var selected_city = $("#cityMenu").text();

		    	sessionStorage.setItem('selected_city', selected_city);
			});

		});
		// $(function(){
		// 	$("#barMenu").click(function(){
		// 		document.getElementById("bars").disabled = "true";
		// 	});
		// });
	</script>
</html>	