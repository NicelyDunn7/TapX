<?php
	if(!isset($_COOKIE['business_id']) || !isset($_COOKIE['table_id']) || !isset($_COOKIE['user_name'])){
		header('Location: home.php');
	}
	include '../dbcreds.php';
	
	
	
	echo "gadafahihihihihih";
	
	if (isset($_COOKIE['business_id'])) {
		setcookie('business_id', "", time()-3600);
		setcookie('table_id', "", time()-3600);
		setcookie('tab', "", time()-3600, '/');
		setcookie('tab_price', "", time()-3600, '/');
		setcookie('user_name', "", time()-3600);
	}
/*	
	if(isset($_COOKIE['tab'])) {	///TAB IS LINKED TO QUANTITY OF DRINK
		foreach (json_decode($_COOKIE['tab']) as $name => $quantity) {
			setcookie('tab', "", time()-3600);
		}
	}
	if(isset($_COOKIE['tab_price'])) {	///TAB PRICE IS PRICE OF QUANTITY OF DRINKS
		foreach (json_decode($_COOKIE['tab_price']) as $name => $price) {
			setcookie('tab_price', "", time()-3600, '/');
		}
	}
*/	
	header('Location: cust-order-form.php');
 ?>
