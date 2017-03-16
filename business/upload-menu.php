<?php
    session_start();

    //Construct filepath
    $dir = "../menus/";
    $filepath = $dir . $_SESSION['business_id'] . ".pdf";
    $go_ahead = 1;

    //Check that the file is actually a pdf
    if($_FILES['pdf']['type'] != 'application/pdf'){
        echo "Your File Type: " . $_FILES['pdf']['type'];
        echo "File type error. Please upload a legitimate PDF file. ";
        $go_ahead = 0;
    }

    //Check that the file is 10 MegaBytes or less
    if($_FILES['pdf']['size'] > 10485760){
        echo "File too large. Exceeds 10MB limit. ";
        $go_ahead = 0;
    }

    //If all previous conditions are met, attempt to move the file to the new path
    if($go_ahead == 1){
        if (move_uploaded_file($_FILES['pdf']['tmp_name'], $filepath)) {
            header('Location: business-admin.php');
        } else {
            echo "Unable to move file! ";
        }
    } else {
        echo "Unable to upload file. Please try again. ";
    }
 ?>
