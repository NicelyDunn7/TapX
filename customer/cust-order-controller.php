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
				var msg;
				var addr = 'ws://ec2-52-87-94-24.compute-1.amazonaws.com:9998/TapX/websocket.php';
				var ws = new WebSocket(addr);
				ws.onopen = function(ev) { // connection is open

	";


	//query to find the right drinks for the current bar
	$row_query = "SELECT * FROM item_list WHERE business_id='".$_COOKIE['business_id']."'";
	$row_result = mysqli_query($conn, $row_query);
	$row = mysqli_fetch_assoc($row_result);

	$item_list = array();
	$price_string = array();
	$quanity_string = array();
	if(isset($_COOKIE['tab']))
	{
		foreach (json_decode($_COOKIE['tab']) as $name => $quantity) {
			$quantity_string[$name] += $quantity;
		}
	}
	if(isset($_COOKIE['tab_price']))
	{
		foreach (json_decode($_COOKIE['tab_price']) as $name => $price) {
			$price_string[$name] += $price;
		}
	}
	foreach($_POST as $name => $quantity){
		if($quantity != ''  && $quantity > 0){

			$quantity_string[$name] += $quantity;
			$price_string[$name] += $row[$name] * $quantity;

			echo "
			msg = {
				business_id: ".$_COOKIE['business_id'].",
				type: \"order\",
				table_id: ".$_COOKIE['table_id'].",
				quantity: ".$quantity.",
				item: \"".$name."\"
							};
				   ws.send(JSON.stringify(msg));
				";
		}
    }

    setcookie('tab', json_encode($quantity_string), time() + 36000, '/');	// '/' means cookie is available on entire site
	setcookie('tab_price', json_encode($price_string), time() + 36000, '/');


echo "
				setTimeout(function(){
					window.location = 'cust-order-form.php';
				}, 2000);
				}
				ws.onerror	= function(ev){
					if(window.console) console.log('Error Occured: ' + ev.data);
				};
				ws.onclose 	= function(ev){
					if(window.console) console.log('Disconnected from Server.');
				};

			});
		</script>
	";
	mysqli_close($conn);
?>