<?php
	include '../dbcreds.php';
	if(!isset($_COOKIE['business_id']) || !isset($_COOKIE['table_id']) || !isset($_COOKIE['user_name'])){
		header('Location: home.php');
	}
//	"{\"Bud_Light_Draft_16oz\":3,\"Bud_Light_Bottle\":1,\"Jack_and_Coke_Single_Well\":2}"
//			$quantity_string[$name] += $quantity;
//			$price_string[$name] += $row[$name] * $quantity;
//    setcookie('tab', json_encode($quantity_string));
//	  setcookie('tab_price', json_encode($price_string));
/*	$tabPriceCount = 0;
	$tabArray = array(json_decode($_COOKIE['tab']));
	$tabCount = sizeof($tabArray);
	print_r($tabArray[0]);
	echo "<br>";
	print_r($tabCount);*/

	echo "Current Tab<br><br>";

	//	echo "You have ordered " . $quantity . " " . $name . " at ". $price;
	/*
	if(isset($_COOKIE['tab']))	{
		if(isset($_COOKIE['tab_price'])){
			foreach(json_decode($_COOKIE['tab']) as $name => $quantity) {
				foreach(json_decode($_COOKIE['tab_price']) as $name => $price) {
					echo "Quantity = " . $quantity;

				}
			}
//			foreach(json_decode($_COOKIE['tab_price']) as $name => $price) {
//				$price = htmlspecialchars($price);
//			}
		*/
/*			foreach($name as $quantity){
				echo "Drink item = " . $name;
				echo "<br>";
				echo "Quantity = " . $quantity;
				echo "<br>";
				echo "Price = $". $price;
				echo "<br>";
			}	*/
/*
			$totalPrice += $price;
		}
	}*/
	/*		foreach(json_decode($_COOKIE['tab']) as $name => $quantity) {
				foreach(json_decode($_COOKIE['tab_price']) as $name => $price) {

					echo "Drink item = " . $name;
					echo "<br>";
					echo "Quantity = " . $quantity;
					echo "<br>";
					echo "Price = $". $price;
					echo "<br>";
				}
				$totalPrice += $price;
			}
		}
	}*/

	if(isset($_COOKIE['tab']))	///TAB IS LINKED TO QUANTITY OF DRINK
	{
		foreach (json_decode($_COOKIE['tab']) as $name => $quantity) {
			echo $name . " at quantity of " . $quantity;
			echo "<br>";
			//echo $price;
			//echo "<br>";
			$tabCount++;
		}
	}
	echo "<br><br>";
	if(isset($_COOKIE['tab_price'])) 	///TAB PRICE IS PRICE OF QUANTITY OF DRINKS
	{
		foreach (json_decode($_COOKIE['tab_price']) as $name => $price) {
			//echo $_COOKIE['tab_price'];
			echo $name . " is a total of $" . $price;
			echo "<br>";
			$totalPrice += $price;
			$tabPriceCount++;
		}
	}
	echo "<br><br>";
	/*
	foreach(json_decode($_COOKIE['tab']) as $name => $quantity){
		echo "You ordered " . $quantity . " " . $name . " for a total of $" . json_decode($_COOKIE['tab_price[$price]']);
		echo "<br>";
	}*/


	echo "<br><br><br>";
	echo "Total Price for your tab = $" . number_format($totalPrice, 2);


	echo "<br><br><br><br><br><br>";
	echo "<a class='btn btn-success btn-lg' href='cust-order-form.php'>Return To Order!</a>";
?>
