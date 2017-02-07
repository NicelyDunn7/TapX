<?php
	session_start();
	include "../dbcreds.php";  
	$i = 0;
	$query = "SELECT DISTINCT state FROM businesses ORDER BY state";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $query))
	{
    	print "Failed to prepare statement\n";
	}
	else
	{
		$state = array();
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
		{
			foreach ($row as $r) 
			{
				$state[] = $r;
				$i++;
			
			}
		}
		$_SESSION['state_count'] = $i;
		$_SESSION['states'] = $state;
		mysqli_stmt_close($stmt);
		// header('Location: home.php');
	}
?>