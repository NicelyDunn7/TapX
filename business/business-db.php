<?php
	include '../dbcreds.php';
	session_start();
	$_SESSION['business_id'] = 1;

		$table_query =  "SELECT * FROM tables WHERE business_id='".$_SESSION['business_id']."'";
		$table_result = mysqli_query($conn, $table_query);

    $i = 0;
		while($row = mysqli_fetch_array($table_result)){
			$response[$i]['table_id'] = $row['table_id'];
      $response[$i]['table_num'] = $row['table_num'];
      $data['posts'][$i] = $response[$i]
      $i=$i+1;
		}
		$json_string =json_encode($data['posts']);
    $file = 'bootstrap_file.json';
    $file_put_contents($file, $json_string);
    @header('Location: business-tables.php');

		mysqli_close($conn);
?>
