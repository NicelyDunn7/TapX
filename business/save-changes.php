<?php
    include '../dbcreds.php';

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
    echo $sql;
    //header('Location: edit-items.php');
 ?>
