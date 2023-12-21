<?php
    $servername = "localhost";
    $username = "";
    $password = "";
    $database = "kho";

    // Create connection 
    $conn = @mysqli_connect($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
     }
       echo "Connected successfully";
?>