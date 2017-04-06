<?php 
	session_start(); 
	if($_POST['submit'] == "bar")
	{
		include "../dbcreds.php";  
		$i = 0;
		$query = "SELECT * FROM businesses WHERE state=? AND city=? ORDER BY business_name";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $query))
		{
	    	print "Failed to prepare statement\n";
		}
		else
		{
			$s_state = $_POST['state_input'];
			$s_city = $_POST['city_input'];
			mysqli_stmt_bind_param($stmt, "ss", htmlspecialchars($s_state), htmlspecialchars($s_city));
			$bar_final = array();
			$name_final = array();
			$address_final = array();
			$address2_final = array();
			$city_final = array();
			$state_final = array();
			$zip_final = array();
			mysqli_execute($stmt);
			mysqli_stmt_bind_result($stmt, $bar, $name, $address, $address2, $city, $state, $zip);
			//while(mysqli_stmt_fetch($stmt))
			{
			//	printf("hi: %s %s %s %s %s %s %s", $bar, $name, $address, $address2, $city, $state, $zip);
			//	i++;
			}


			while($result = mysqli_stmt_fetch($stmt))
			{
				$bar_final[] = $bar;
				$name_final[] = $name;
				$address_final[] = $address;
				$address2_final[] = $address2;
				$city_final[] = $city;
				$state_final[] = $state;
				$zip_final[] = $zip;
				$i++;
			}
			// mysqli_free_result($result);
			$_SESSION['bar_count'] = $i;
			$_SESSION['bars'] = $bar_final;
			$_SESSION['names'] = $name_final;
			$_SESSION['addresses'] = $address_final;
			$_SESSION['address2'] = $address2_final;
			$_SESSION['city'] = $city_final;
			$_SESSION['state'] = $state_final;
			$_SESSION['zip'] = $zip_final;		

			mysqli_stmt_close($stmt);
			header('Location: home.php');
			for($j=0; $j <= $i; $j++)
			{
				 echo $bar_final[$j];
			}


		}
	}
	else if($_POST['submit'] == "login")
	{
		setcookie('business_id', htmlspecialchars($_POST['selected_bar']), time() + 500, "/");
		header('Location: user-login.php');
	}
	else
	{
		echo "Error";
	}

?>