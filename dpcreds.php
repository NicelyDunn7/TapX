<?php

$servername = "54.174.137.173";
$username = "TapX";
$password = "buildingabetterbar";
$dbname = "tapX";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $conn->setAttrobute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXECPTION);
    echo "Connected successfully";
}
catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

?>