<!-- <meta http-equiv="Content-Security-Policy" content="default-src * 'self' ec2-35-167-112-130.us-west-2.compute.amazonaws.com 'unsafe-inline' wss: ws:; connect-src * ec2-35-167-112-130.us-west-2.compute.amazonaws.com wss: ws:; style-src * 'self'; script-src * 'self' 'unsafe-inline'; "/> -->
<!-- <meta http-equiv="Content-Security-Policy" content="img-src *
'unsafe-eval' 'unsafe-inline' data:; default-src * ws://* 'unsafe-inline' 'unsafe-eval';
 connect-src * ws://ec2-35-167-112-130.us-west-2.compute.amazonaws.com 'unsafe-eval'
'unsafe-inline' 'self' "> -->
<!-- <meta http-equiv="Content-Security-Policy" content="default-src * gap: file: data: blob: 'unsafe-inline' 'unsafe-eval' ws: wss:;"> -->
<!-- <meta
    http-equiv="Content-Security-Policy"
    content="default-src 'self' 'unsafe-inline' 'unsafe-eval' https://tapx.duckdns.org ws://tapx.duckdns.org:9998/websocket.php"
  > -->
<!-- <meta default-src * 'self' 'unsafe-inline' 'unsafe-eval' 127.0.0.1:* http://35.167.112.130:* wss://35.167.112.130:* ws://35.167.112.130:* https://*.duckdns.org wss://*.duckdns.org:* ws://*.duckdns.org:*;> -->
<meta http-equiv="Content-Security-Policy" content="default-src * data: blob: 'unsafe-inline' 'unsafe-eval' ws: wss:;">

<?php
	if(!isset($_COOKIE['business_id']) || !isset($_COOKIE['table_id']) || !isset($_COOKIE['user_name'])){
		header('Location: home.php');
	}
	include '../dbcreds.php';
	echo "
		<script src='../jquery-3.1.1.js'></script>
		<script language='javascript' type='text/javascript'>
			$(document).ready(function(){
				//Create new websocket
				alert('In Document Ready');
				var msg;
				var addr = 'ws://35.167.112.130:9998/websocket.php';
				var ws = new WebSocket(addr);
				ws.onopen = function(ev) { // connection is open
				alert('In On Open Function');
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
			//echo "You have ordered ".$value. " ". $key . " at $".$row[$key]. " each";
			// $price = $row[$key] * $value;

			// if($price != 0){
			// 	$totalPrice += $price;
			// }

			$quantity_string[$name] += $quantity;
			$price_string[$name] += $row[$name] * $quantity;


			//echo " bringing your total to: $";
			//echo $totalPrice;
			//echo "<br><br>";
			//array_push($item_list, array('item'=>$key, 'quantity'=>$value));
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

    setcookie('tab', json_encode($quantity_string));
	setcookie('tab_price', json_encode($price_string));
    //header('Location: cust-order-form.php');
	//print_r($item_list);

	//echo "<br><br><br>";
	//echo "Your total is $";
	//echo $totalPrice;


echo "
				setTimeout(function(){
					window.location.assign('cust-order-form.php');
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
<!-- <a href="cust-order-form.php">Link</a> -->
