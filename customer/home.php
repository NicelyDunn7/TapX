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
		<link rel="stylesheet" href="./css/home.css" type="text/css">
		<link rel="stylesheet" href="./css/background.css" type="text/css">
	</head>
	<?php
		include 'header.html'; 
	?>
	<body>
		<div class="container">
			<div id="form" class="col-xs-12">
				<form action="./bar-controller.php" method="post" id="bar-controller" >
					<!-- these two inputs are here to serve as the post targets for this form -->
   					 <input class="span2" id="state_input" name="state_input" type="hidden">
   					 <input class="span2" id="city_input" name="city_input" type="hidden">
					<div class="dropdown-container">
						<button type="button" class="btn dropdown-toggle" id="stateMenu" data-toggle="dropdown">State<span class="caret"></span></button>
						<ul class="dropdown-menu" id="stateDropdown" role="menu">
							<?php
								include "./state-controller.php";
								// print_r($_SESSION['states']);
								// foreach ($_SESSION['states'] as $s => $v)
								for($i = 0; $i < $_SESSION['state_count']; $i++)
								{
								 	echo "<li onclick=\"$('#state_input').val('" . $_SESSION['states'][$i] . "'); \"><a href='#'>" . $_SESSION['states'][$i] . "</a></li>";
								 	// echo ;
								 	// echo ;
								 	// echo ;
								 	// echo ;
								}

							?>

						</ul>
					</div>
					<div class="dropdown-container">
						<button class="btn dropdown-toggle" type="button" id="cityMenu" data-toggle="dropdown" >City<span class="caret"></span></button>
							<ul class="dropdown-menu" id="cityDropdown" role="menu">
							 <?php
								include './city-controller.php';
								for($i = 0; $i < $_SESSION['city_count']; $i++)
								{
								 	echo "<li onclick=\"$('#city_input').val('" . $_SESSION['cities'][$i] . "'); \"><a href='#'>" . $_SESSION['cities'][$i] . "</a></li>";
								}
							?>

						</ul>
					</div>
					<div class="row">
						<button class="btn" type="submit" onclick="myFunction" name="submit" value="bar" id="barMenu">Find a Bar</button>
					</div>
					<div class="row">
					    <select id="bars" name="selected_bar">
					    <option disabled selected value>-Select an Option-</option>
					    <?php
							for($k = 0; $k < $_SESSION['bar_count']; $k++)
							{
								// echo "<option value = ";

								// echo ">";

								echo "<option value=\"".$_SESSION['bars'][$k]."\">". $_SESSION['names'][$k] . "</option>";
							}
						?>
						</select>
					</div>
					<div class="row">
						<button class="btn btn-default" id="goToLogin" type="submit" name="submit" value="login" id="go-to-login">Go to Login</button>
					</div>
				</form>
			</div>
			<div class="footer">
		        <a href="https://github.com/dpdunn10/TapX">GitHub |</a>
		        <a href="../business/business-login.php">Businesses Login Here</a>
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
		// $( document ).ready(function() {
		//      if ($("#bars option:selected").text() == "-Select an Option-"){
		//      	$("form").submit(function(e){
		// 	        e.preventDefault();
		// 	        alert("Please Select a Bar in the Dropdown");
		// 	        $("#bars").attr('style','border:1px solid red');
		// 	    });
		//      }
		// });
	</script>
</html>
