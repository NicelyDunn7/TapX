<?php
	include "../dbcreds.php";
	session_start();
	if(htmlspecialchars($_POST['submit']) == "Add Admin") //if update admin password
	{	
		$check_query = "SELECT count(*) FROM business_admins WHERE username='".$_POST['admin_username']."' AND business_id='".$_SESSION['business_id']."'";
		$check_result = mysqli_query($conn, $check_query);
		$check = mysqli_fetch_array($check_result);
		if($check[0] != 0)
		{
			echo "Error, admin ".htmlspecialchars($_POST['admin_username'])." already exists";
		}
		else
		{
			//echo "admin ".htmlspecialchars($_POST['admin_username'])." doesn't exist";
			
			if(htmlspecialchars($_POST['new_password_admin']) == htmlspecialchars($_POST['new_password_admin_2']))
			{
				//echo "<br> Passwords Match";
				$salt_prehash = rand();
				$salt = password_hash($salt_prehash, PASSWORD_BCRYPT);
				// echo "<br><br> Salt Prehash: ".$salt_prehash;
				// echo "<br> Salt: ".$salt;
				$pass_pre_hash = htmlspecialchars($_POST['new_password_admin']).$salt;
				$pass = password_hash($pass_pre_hash, PASSWORD_BCRYPT);
				//echo "<br><br> password Prehash: ".$pass_pre_hash;
				// echo "<br> Password hash: ".$pass;
				if(password_verify($pass_pre_hash, $pass))
				{
					//echo "<br> passed";
					$add_query = "INSERT INTO `business_admins` (`business_id`, `user_id`, `username`, `password`, `salt`) VALUES (".$_SESSION['business_id'].", DEFAULT, '".htmlspecialchars($_POST['admin_username'])."', '".$pass."', '".$salt."')";
					//echo "<br> ".$add_query." <br>";
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
	header('Location: ' . $_SERVER['HTTP_REFERER']);

?>