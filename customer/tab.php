<?php
 	session_start();
 	include '../dbcreds.php';
 	include 'customer-order-controller.php';


 	$itemArray = array();
 	$priceArray = array();


 	echo "Items and their quantities: <br>";
 	if(isset($_COOKIE['Item'])){
 		foreach($_COOKIE['Item'] as $key => $value){
 			echo "$key : $value <br /> ";
 			array_push($itemArray, $key, $value);
 		}
 	}


 	echo "<br><br>Items and their Prices: <br>";
 	if(isset($_COOKIE['Price'])){
 		foreach($_COOKIE['Price'] as $key => $value){
 			echo "$key : $$value <br /> ";
 			array_push($priceArray, $key, $value);
 		}
 	}


 	echo "<br><br>Total Price = $" . $_COOKIE["TotalPrice"];
 //	$tmpTotal = $totalPrice;
 //	echo $tmpTotal;
 	echo "<br><br>";
 	print_r($_COOKIE['SumTotalPrice']);
 	echo "<br><br>";
 	echo "Your total is at $" . array_sum($_COOKIE['SumTotalPrice']);
 //	setcookie("SumTotalPrice", $_COOKIE["TotalPrice"], time() + 7200, "/");

 //	$tmp = $_COOKIE["TotalPrice"];
 //	echo $tmp;
 //	echo "<br>";
 //	echo $tmpTotal;
 //	$sumTotalPrice += $_COOKIE["TotalPrice"];

 	//echo "<br><br>Total Price = $" . $_COOKIE["SumTotalPrice"];


 	echo "<br><br><br>";
 	echo "<a class='btn btn-info btn-lg' href='cust-order-form.php'>Back to Order!</a>";
 ?>
