<?php
    //Destroy session variables and redirect to the login page
    session_start();
    session_unset();
    session_destroy();
    header('Location: business-login.php');
 ?>
