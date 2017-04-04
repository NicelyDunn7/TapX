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
			.sidenav {
			    height: 100%; /* 100% Full-height */
			    width: 0; /* 0 width - change this with JavaScript */
			    position: fixed; /* Stay in place */
			    z-index: 1; /* Stay on top */
			    top: 0;
			    left: 0;
			    background-color: #111; /* Black*/
			    overflow-x: hidden; /* Disable horizontal scroll */
			    padding-top: 60px; /* Place content 60px from the top */
			    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
			}
			.sidenav a {
			    padding: 8px 8px 8px 32px;
			    text-decoration: none;
			    font-size: 25px;
			    color: #818181;
			    display: block;
			    transition: 0.3s
			}

			.sidenav .closebtn{
			    position: absolute;
			    top: 0;
			    right: 25px;
			    font-size: 36px;
			    margin-left: 50px;
			}
			.container {
			    transition: margin-left .5s;
			    padding: 20px;
			}
			span{
				padding-top: 5px;
				padding-left: 5px;
				font-size: 25px;
			}
			@media screen and (max-height: 450px) {
			    .sidenav {padding-top: 15px;}
			    .sidenav a {font-size: 18px;}
			}
		</style>
	</head>
	<body>
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		  <a href="#" class="glyphicon glyphicon-info-sign"></a>
		  <a href="#" class="glyphicon glyphicon-exclamation-sign"></a>
		  <a href="#" class="glyphicon glyphicon-glass"></a>
		  <a href="#" class="glyphicon glyphicon-home"></a>
		</div>
		<span id="openbtn" class="glyphicon glyphicon-menu-hamburger" onclick="openNav()"></span>
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
						<button class="btn btn-primary dropdown-toggle" type="button" id="cityMenu" data-toggle="dropdown" >City<span class="caret"></span></button>
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
						<button class="btn btn-primary" type="submit" onclick="myFunction" name="submit" value="bar" id="barMenu">Bar</button>
					</div>
					<div class="row">
					    <select id="bars" name="selected_bar">
					    <?php
							for($k = 0; $k < $_SESSION['bar_count']; $k++)
							{
								// echo "<option value = ";

								// echo ">";

								echo "<option value=\"".$_SESSION['bars'][$k]."\">". $_SESSION['names'][$k] . "</option>";
								// echo ;
								//echo $_SESSION['bars'][$k];
								// echo ;
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
						<button class="btn btn-default" type="submit" name="submit" value="login" id="go-to-login">Go to Login</button>
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
		function openNav() {
		    document.getElementById("mySidenav").style.width = "100px";
		}

		/* Set the width of the side navigation to 0 */
		function closeNav() {
		    document.getElementById("mySidenav").style.width = "0";
		}
		// $(document).ready(function(){
		    // var dropdown = document.getElementById("bars");
		    // var current_value = dropdown.options[dropdown.selectedIndex].value;

		    // if (current_value == null) {
		    //     document.getElementById("bars").style.display = "none";
		    // }
		    // else{
		    //     //document.getElementById("bars").style.display = "none";
		    // }
		// });
	</script>
</html>
