<?php
    session_start();

    //Check if the login form was complete, return if not, continue if completed
    if(empty($_POST['business_id']) == true || empty($_POST['username']) || empty($_POST['password'])){
        header('Location: business-login.php');
    } else if(isset($_POST['submit'])){
        //Include database login credentials and store entered business_id and username
        include '../dbcreds.php';
        $business_id = $_POST['business_id'];
        $username = $_POST['username'];

        //Select the admin credentials from database based on entered business_id and username
        if($stmt = $conn->prepare("SELECT * FROM business_admins WHERE business_id=? AND username=?")){
            $stmt->bind_param('is', htmlspecialchars($business_id), htmlspecialchars($username));
            $stmt->execute();
            $stmt->bind_result($business_id, $user_id, $username, $password, $salt);
            $stmt->fetch();
            $stmt->close();

            //Salt the entered password and verify it matches hashed password in database
            //Set the business_id session variable if matching, error if not
            $saltedpass = $_POST['password'].$salt;
            if(password_verify($saltedpass, $password)){
                $_SESSION['business_id'] = $business_id;
                mysqli_close($conn);
                header('Location: business-home.php');
            } else{
                echo "<h4>Authentication Failure</h4>";
                echo "<a href='business-login.php'>Return To Login</a>";
            }
        } else {
            mysqli_close($conn);
            echo "<h4>Database Error</h4>";
            echo "<a href='business-login.php'>Return To Login</a>";
        }
    }
 ?>
