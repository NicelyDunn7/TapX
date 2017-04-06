<?php
	session_start();
	include "../dbcreds.php";
	$i = 0;
	$query = "SELECT DISTINCT city FROM businesses ORDER BY city";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $query))
	{
    	print "Failed to prepare statement\n";
	}
	else
	{
		$city = array();
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while ($row = mysqli_fetch_array($result, MYSQLI_NUM))
		{
			foreach ($row as $r)
			{
				$city[] = $r;
				$i++;

			}
		}
		$_SESSION['city_count'] = $i;
		$_SESSION['cities'] = $city;
		mysqli_stmt_close($stmt);
		mysqli_close($conn);

		// header('Location: home.php');
	}
?>
