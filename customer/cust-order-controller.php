<?php
	session_start();
	include '../dbcreds.php';
	echo "
		<script src='../jquery-3.1.1.js'></script>
		<script language='javascript' type='text/javascript'>
			$(document).ready(function(){
				//Create new websocket
				var addr = 'ws://ec2-35-167-112-130.us-west-2.compute.amazonaws.com:9998/TapX/websocket.php';
				var ws = new WebSocket(addr);
				var msg;
				ws.onopen = function(ev) { // connection is open

	";


	//query to find the right drinks for the current bar
	$row_query = "SELECT * FROM item_list WHERE business_id='".$_SESSION['business_id']."'";
	$row_result = mysqli_query($conn, $row_query);
	$row = mysqli_fetch_assoc($row_result);

	$item_list = array();
	$cookie_string = array();
	if(isset($_COOKIE['tab']))
	{
		foreach (json_decode($_COOKIE['tab']) as $key => $value) {
			$cookie_string[$key] += $value;
		}
	}
	foreach($_POST as $key => $value){
		if($value != ''  && $value != '0'){
			//echo "You have ordered ".$value. " ". $key . " at $".$row[$key]. " each";
			// $price = $row[$key] * $value;

			// if($price != 0){
			// 	$totalPrice += $price;
			// }

			$cookie_string[$key] += $value;



			//echo " bringing your total to: $";
			//echo $totalPrice;
			//echo "<br><br>";
			//array_push($item_list, array('item'=>$key, 'quantity'=>$value));
			echo "
			msg = {
				business_id: ".$_COOKIE['business_id'].",
				type: \"order\",
				table_id: ".$_COOKIE['table_id'].",
				quantity: ".$value.",
				item: \"".$key."\"
							};
						   ws.send(JSON.stringify(msg));
						   alert('Waitress notified...');
		";
		}
    }

    setcookie('tab', json_encode($cookie_string));
    header('Location: cust-order-form.php');
	//print_r($item_list);

	//echo "<br><br><br>";
	//echo "Your total is $";
	//echo $totalPrice;


echo "
				window.location = 'cust-order-form.php';
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
?>
