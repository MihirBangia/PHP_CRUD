<?php
    $servername = "127.0.0.1";
    $database = "mobileshop";
    $username = "root";
    $password = "root";
    
    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";

    ?>