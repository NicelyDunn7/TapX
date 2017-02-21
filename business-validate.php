<?php
    if(isset($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember = $_POST['lg_remember'];
    }else{
        header("location: business-login.php")
    }
?>