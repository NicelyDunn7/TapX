<?php
    session_start();

    //Check if the login form was complete, return if not, continue if completed
    if(empty($_POST['business_id']) == true || empty($_POST['name']) || empty($_POST['table_num']) || empty($_POST['password'])){
        header('Location: user-login.php');
    } else if(isset($_POST['submit'])){
        //Include database login credentials and store entered business_id and username
        include '../dbcreds.php';
        $business_id = $_POST['business_id'];
        $user_name = $_POST['name'];
        $table_num = $_POST['table_num'];
        echo "hi";
        //Select the admin credentials from database based on entered business_id and username
        if($stmt = $conn->prepare("SELECT business_id, table_id, table_num, table_pass, salt FROM tables WHERE business_id=? AND table_num=?")){
            $stmt->bind_param('is', htmlspecialchars($business_id), htmlspecialchars($table_num));
            $stmt->execute();
            $stmt->bind_result($business_id, $table_id, $table_num, $table_pass, $salt);
            $stmt->fetch();
            $stmt->close();

            //Salt the entered password and verify it matches hashed password in database
            //Set the business_id session variable if matching, error if not
            $saltedpass = $_POST['password'].$salt;
            if(password_verify($saltedpass, $table_pass)){
                setcookie('business_id', $business_id);
                setcookie('table_id', $table_id);
                setcookie('user_name', $user_name);
                mysqli_close($conn);
                header('Location: cust-order-form.php');
            } else{
                echo "<h4>Authentication Failure</h4>";
                echo "<a href='user-login.php'>Return To Login</a>";
            }
        } else {
            mysqli_close($conn);
            echo "<h4>Database Error</h4>";
            echo "<a href='user-login.php'>Return To Login</a>";
        }
    }
 ?>
