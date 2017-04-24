<?php
	//Include database credentials and start session
	include "../dbcreds.php";
	session_start();
	//Check if user is logged in and filled out form inputs
	if(!isset($_SESSION['business_id']) || !isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])){
		header('Location: business-login.php');
	}
	if(!isset($_POST['admin_username']) || !isset($_POST['new_password_admin']) || !isset($_POST['new_password_admin_2'])){
		header('Location: business-admin.php');
	} else if (htmlspecialchars($_POST['submit']) == "Add Admin") //if update admin password
	{
		//Query database to get admin logins for particular business
		$check_query = "SELECT count(*) FROM business_admins WHERE username='".$_POST['admin_username']."' AND business_id='".$_SESSION['business_id']."'";
		$check_result = mysqli_query($conn, $check_query);
		$check = mysqli_fetch_array($check_result);
		if($check[0] != 0)
		{
			echo "Error, admin ".htmlspecialchars($_POST['admin_username'])." already exists";
		}
		else
		{
			//If passwords match, insert the new password into the database
			if(htmlspecialchars($_POST['new_password_admin']) == htmlspecialchars($_POST['new_password_admin_2']))
			{
				$salt_prehash = rand();
				$salt = password_hash($salt_prehash, PASSWORD_BCRYPT);
				$pass_pre_hash = htmlspecialchars($_POST['new_password_admin']).$salt;
				$pass = password_hash($pass_pre_hash, PASSWORD_BCRYPT);
				if(password_verify($pass_pre_hash, $pass))
				{
					$add_query = "INSERT INTO `business_admins` (`business_id`, `user_id`, `username`, `password`, `salt`) VALUES (".$_SESSION['business_id'].", DEFAULT, '".htmlspecialchars($_POST['admin_username'])."', '".$pass."', '".$salt."')";
					$add_result = mysqli_query($conn, $add_query);
					$add = mysqli_fetch_array($add_result);

				}
				else
					echo "<br> Password Hash Error.";
			}
			else
			{
				echo "<br> Passwords didn't match";
			}

		}

	}
	mysqli_close($conn);
	header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
