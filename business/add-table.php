<?php
	include "../dbcreds.php";
	session_start();
	if(!isset($_SESSION['business_id']) || !isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])){
		header('Location: business-login.php');
	}

	if(!isset($_POST['table_number']) || !isset($_POST['new_password']) || !isset($_POST['new_password_2'])){
		header('Location: business-admin.php');
	} else if(htmlspecialchars($_POST['submit']) == "Add Table") //if update table password
	{
		$check_query = "SELECT count(*) FROM tables WHERE business_id='".$_SESSION['business_id']."' AND table_num = '".htmlspecialchars($_POST['table_number'])."'";
		$check_result = mysqli_query($conn, $check_query);
		$check = mysqli_fetch_array($check_result);
		if($check[0] != 0)
		{
			echo "Error, table ".htmlspecialchars($_POST['table_number'])." already exists";
		}
		else
		{
			echo "table ".htmlspecialchars($_POST['table_number'])." doesn't exist";

			if(htmlspecialchars($_POST['new_password']) == htmlspecialchars($_POST['new_password_2']))
			{
				echo "<br> Passwords Match";
				$salt_prehash = rand();
				$salt = password_hash($salt_prehash, PASSWORD_BCRYPT);
				$pass_pre_hash = htmlspecialchars($_POST['new_password']).$salt;
				$pass = password_hash($pass_pre_hash, PASSWORD_BCRYPT);
				if(password_verify($pass_pre_hash, $pass))
				{
					$add_query = "INSERT INTO `tables` (`business_id`, `table_id`, `table_num`, `table_pass`, `salt`) VALUES (".$_SESSION['business_id'].", DEFAULT, ".htmlspecialchars($_POST['table_number']).", '".$pass."', '".$salt."')";
					echo "<br> ".$add_query." <br>";
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
