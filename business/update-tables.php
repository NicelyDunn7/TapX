<?php
	include "../dbcreds.php";
	session_start();
	if(!isset($_SESSION['business_id']) || !isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])){
		header('Location: business-login.php');
	}

	if(htmlspecialchars($_POST['submit']) == "Update") //if update table password
	{
		$salt_query = "SELECT salt, table_pass FROM tables WHERE business_id='".$_SESSION['business_id']."' AND table_num = '".htmlspecialchars($_POST['table_number'])."'";
		$salt_result = mysqli_query($conn, $salt_query);
		$salt = mysqli_fetch_array($salt_result);
		$pass = htmlspecialchars($_POST['old_password']).$salt[0];
		$actualPass = $salt[1];
		$new_salted_pass = htmlspecialchars($_POST['new_password']).$salt[0];
		// echo $new_salted_pass."-----------        --------";

		if(password_verify($pass, $actualPass))
		{
			// echo "pass";
			if(htmlspecialchars($_POST['new_password']) == htmlspecialchars($_POST['new_password_2']))
			{
				$new_pass = password_hash($new_salted_pass, PASSWORD_BCRYPT);
				// echo $new_pass;
				$update_query = "UPDATE tables SET table_pass ='".$new_pass."' WHERE business_id ='".$_SESSION['business_id']."' AND table_num = '".htmlspecialchars($_POST['table_number'])."'";
				$update_result = mysqli_query($conn, $update_query);
			}
			else
				echo "Non Matching Passwords";
		}
		else
		{
			echo "Incorrect Password";
		}

	}
	else //if delete table
	{
		$salt_query = "SELECT salt, table_pass FROM tables WHERE business_id='".$_SESSION['business_id']."' AND table_num = '".htmlspecialchars($_POST['table_number'])."'";
		$salt_result = mysqli_query($conn, $salt_query);
		$salt = mysqli_fetch_array($salt_result);
		$pass = htmlspecialchars($_POST['old_password']).$salt[0];
		$actualPass = $salt[1];
		// echo $new_salted_pass."-----------        --------";

		if(password_verify($pass, $actualPass))
		{
			echo "pass";
			$DELETE_query = "DELETE FROM tables WHERE business_id ='".$_SESSION['business_id']."' AND table_num = '".htmlspecialchars($_POST['table_number'])."'";
			$DELETE_result = mysqli_query($conn, $DELETE_query);
		}
		else
			echo "Wrong Password";
	}
	mysqli_close($conn);
	header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
