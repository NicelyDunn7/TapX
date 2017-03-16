<?php
    include '../dbcreds.php';

    $query = "SELECT * FROM businesses WHERE business_id=?";
    if($stmt = $conn->prepare($query)){
        $stmt->bind_param('i', htmlspecialchars($_COOKIE['business_id']));
        $stmt->execute();
        $stmt->bind_result($business_id, $business_name, $address, $address2, $city, $state, $zip);
        $stmt->fetch();
        $stmt->close();

        echo "<h1>Business Name: " . $business_name . "</h1>";
        echo "<h3>Address: ".$address." ".$address2."<br>".$city.", ".$state." ".$zip."</h3>";
        $path = '../menus/'.$_COOKIE['business_id'].'.pdf';
        if(file_exists($path)){
            echo "<a href='../menus/".$_COOKIE['business_id'].".pdf'>View PDF Menu</a>";
        } else {
            echo "<h4>Encourage your establishment to upload a PDF menu!</h4>";
        }

        mysqli_close($conn);
    } else {
        echo "<h4>Database Error!</h4>";
        echo "<a href='cust-order-form.php'>Return To Order Page</a>";
        mysqli_close($conn);
    }
 ?>
