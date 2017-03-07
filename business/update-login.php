<?php
	include "../dbcreds.php";
	session_start();
	if(htmlspecialchars($_POST['submit']) == "Update") //if update
	{	
		$salt_query = "SELECT salt, password FROM business_admins WHERE business_id='".$_SESSION['business_id']."' AND username = '".htmlspecialchars($_POST['username'])."'";
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
				$update_query = "UPDATE business_admins SET password ='".$new_pass."' WHERE business_id ='".$_SESSION['business_id']."' AND username = '".htmlspecialchars($_POST['username'])."'";
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
	header('Location: ' . $_SERVER['HTTP_REFERER']);

?>