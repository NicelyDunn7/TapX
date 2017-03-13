<?php
	session_start();
	include '../dbcreds.php';
	echo "
		<script src='../jquery-3.1.1.js'></script>
		<script language='javascript' type='text/javascript'>
			$(document).ready(function(){
				//Create new websocket
				var addr = 'ws://ec2-54-202-88-8.us-west-2.compute.amazonaws.com:9998/websocket.php';
				var ws = new WebSocket(addr);
				var msg;
				var tab = {"orderItems": []};
				var temp;

				//Open connection, send message to notify server a customer has connected
				ws.onopen = function(ev) { // connection is open
				//	msg = {
				//		business_id:  ".$_COOKIE['business_id'].",
				//		type: \"customer\",
				//		table_id:  ".$_COOKIE['table_id'].",
				//		items: \"NULL\"
				//	}
				//	ws.send(JSON.stringify(msg));
				//	if(window.console) console.log('Connected to Server.');
				//}
	";


	//query to find the right drinks for the current bar
	$row_query = "SELECT * FROM item_list WHERE business_id='".$_SESSION['business_id']."'";
	$row_result = mysqli_query($conn, $row_query);
	$row = mysqli_fetch_assoc($row_result);

	$item_list = array();

	function modifyItem(deviceId, Qty)
	{
	    var cart_items = $.cookie('devicelist').cartItems;

	    $(cart_items).each( function(i, v) {
	      if (v && v.deviceId == deviceId) {
	      cart_items[i].quantity = Qty;
	      }
	    });
	    var obj = { "cartItems": cart_items };
	    $.cookie('devicelist', obj);
	}

	function deleteItem(deviceId)
	{
	    var cart_items = $.cookie('devicelist').cartItems;

	    $(cart_items).each( function(i, v) {
	      if (v && v.deviceId == deviceId) {
	      cart_items.splice(i, 1);
	      }
	    });
	    var obj = { "cartItems": cart_items };
	    $.cookie('devicelist', obj);
	}

	foreach($_POST as $key => $value){
		if($value != ''  && $value != '0'){
			//echo "You have ordered ".$value. " ". $key . " at $".$row[$key]. " each";
			$price = $row[$key] * $value;

			if($price != 0){
				$totalPrice += $price;
			}


			//echo " bringing your total to: $";
			//echo $totalPrice;
			//echo "<br><br>";
			//array_push($item_list, array('item'=>$key, 'quantity'=>$value));
			echo "msg = {
				business_id: ".$_COOKIE['business_id'].",
				type: \"order\",
				table_id: ".$_COOKIE['table_id'].",
				quantity: ".$value.",
				item: \"".$key."\"
							};
			";
			foreach(var i=0; i<msg.length; i++){
				var temp = msg.length;
				alert('temp');
			}


			echo "
							ws.send(JSON.stringify(msg));
						   	alert('Waitress notified...');
		";
		}
    }

	//print_r($item_list);

	//echo "<br><br><br>";
	//echo "Your total is $";
	//echo $totalPrice;


echo "
				window.location = 'cust-order-form.php'
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
