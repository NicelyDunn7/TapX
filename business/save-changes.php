<?php
    //Start the session and include the database login credentials
    session_start();
    include '../dbcreds.php';
    if(!isset($_SESSION['business_id']) || !isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])){
        header('Location: business-login.php');
    }

    //Dynamically construct the SQL statement from the POST data
    $sql = "Update item_list SET ";
    foreach($_POST as $key => $value){
        if($value == ''){
            $sql .= $key."=NULL, ";
        } else {
            $sql .= $key."='".htmlspecialchars($value)."', ";
        }
    }
    $sql = substr($sql, 0, -2);
    $sql .= " WHERE business_id='".$_SESSION['business_id']."'";

    //Execute the query. Return to edit-items if successful, error if not
    if(mysqli_query($conn, $sql)){
        mysqli_close($conn);
        header('Location: business-admin.php');
    } else{
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
 ?>
