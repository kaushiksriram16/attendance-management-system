<?php

    $server = "localhost";
    $username = "root";
    $password = "1234";
    $database = "attendance_management_system";

    $conn = mysqli_connect($server, $username, $password, $database);

    if (!$conn) {
        die("Error: ".$mysqli_connect_error());
    }

    
?>