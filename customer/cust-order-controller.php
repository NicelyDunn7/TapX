<?php 
	session_start(); 
	include "../dbcreds.php";  
	//include "customer_order_form_test.php";
	
	//$drink_quantity = $_POST['drink_quantity'];
	
	
	//query to find the right drinks for the current bar
	$row_query = "SELECT * FROM item_list WHERE business_id='".$_SESSION['business_id']."'";
	$row_result = mysqli_query($conn, $row_query);
	$row = mysqli_fetch_assoc($row_result);
	

	
	foreach($_POST as $key => $value){		
		if($value != ''  && $value != '0'){
			echo "You have ordered ".$value. " ". $key . " at $".$row[$key]. " each";
			$price = $row[$key] * $value;

			if($price != 0){
				$totalPrice += $price;
			}
			echo " bringing your total to: $";		
			echo $totalPrice;
			echo "<br><br>";
		}
    }
	
	echo "<br><br><br>";
	echo "Your total is $";
	echo $totalPrice;


	
	
	//Execute the query. Return to edit-items if successful, error if not
/*    if(mysqli_query($conn, $sql)){
        mysqli_close($conn);
        header('Location: edit-items.php');
    } else{
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
*/	
	
?>
