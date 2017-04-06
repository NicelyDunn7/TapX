<?php
	if(!isset($_COOKIE['business_id']) || !isset($_COOKIE['table_id']) || !isset($_COOKIE['user_name'])){
		header('Location: home.php');
	}
	include '../dbcreds.php';
	echo "
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
		<script language='javascript' type='text/javascript'>
			$(document).ready(function(){
				//Create new websocket
				var addr = 'ws://ec2-52-87-94-24.compute-1.amazonaws.com:9998/TapX/websocket.php';
				var ws = new WebSocket(addr);
				//Open connection, send message to notify server a customer has connected
				ws.onopen = function(ev) { // connection is open
					var close = {  
						business_id: " . $_COOKIE['business_id'] . ",
						type: \"close\",
						name: \"" . $_COOKIE['user_name'] . "\",
						table_id: " .  $_COOKIE['table_id'] . ",
						quantity: \"NULL\",
						item: \"NULL\"
					};
					ws.send(JSON.stringify(close));
					if(window.console) console.log('Connected to Server.');
				}
	    </script>

	";
	
	
	if (isset($_COOKIE['business_id'])) {
		setcookie('business_id', "", time()-3600);
		setcookie('table_id', "", time()-3600);
		setcookie('tab', "", time()-3600, '/');
		setcookie('tab_price', "", time()-3600, '/');
		setcookie('user_name', "", time()-3600);
	}
	
	header('Location: cust-order-form.php');
 ?>
