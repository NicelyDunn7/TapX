<?php
	//Include database credentials, start the session, check that logged in
	include "../dbcreds.php";
	session_start();
	if(!isset($_SESSION['business_id']) || !isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])){
		header('Location: business-login.php');
	}
	if(htmlspecialchars($_POST['submit']) == "Update")
	{
		//Put POST data into variables
		$info_query =  "SELECT business_name, address, address2, city, state, zip FROM business WHERE business_id='".$_SESSION['business_id']."'";
		$info_result = mysqli_query($conn, $info_query);
		$bar_info = mysqli_fetch_array($info_result);
		$barName = htmlspecialchars($_POST['business_name']);
		$address = htmlspecialchars($_POST['address1']);
		$addressTwo = htmlspecialchars($_POST['address2']);
		$city = htmlspecialchars($_POST['city']);
		$state = htmlspecialchars($_POST['state']);
		$zip = htmlspecialchars($_POST['zip']);

		//Run queries to update information
		$update_name_query = "UPDATE businesses SET business_name ='".$barName."' WHERE business_id ='".$_SESSION['business_id']."'";
		$name_result_query = mysqli_query($conn, $update_name_query);
		$update_address_query = "UPDATE businesses SET address ='".$address."' WHERE business_id ='".$_SESSION['business_id']."'";
		$address_result_query =  mysqli_query($conn, $update_address_query);
		if(!$addressTwo == ""){
			$update_address2_query = "UPDATE businesses SET address2 ='".$addressTwo."' WHERE business_id ='".$_SESSION['business_id']."'";
			$address_result_query =  mysqli_query($conn, $update_address2_query);
		}
		$update_city_query = "UPDATE businesses SET city ='".$city."' WHERE business_id ='".$_SESSION['business_id']."'";
		$city_result_query =  mysqli_query($conn, $update_city_query);
		$update_state_query = "UPDATE businesses SET state ='".$state."' WHERE business_id ='".$_SESSION['business_id']."'";
		$state_result_query =  mysqli_query($conn, $update_state_query);
		$update_zip_query = "UPDATE businesses SET ZIP ='".$zip."' WHERE business_id ='".$_SESSION['business_id']."'";
		$zip_result_query =  mysqli_query($conn, $update_zip_query);

	}
	//Close database connection and redirect to previous page
	mysqli_close($conn);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
