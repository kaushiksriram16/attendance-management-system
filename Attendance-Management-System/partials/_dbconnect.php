<?php

    $server = "localhost";
    $username = "root";
    $password = "1234";
    // $database = "attendance_management";
    $database = "test";

    $conn = mysqli_connect($server, $username, $password, $database);

    if ($conn) {
        // echo "success";
    }
    else{
        die("Error: ".$mysqli_connect_error());
    }

    // $sql = "SELECT * FROM students";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    // // output data of each row
    // while($row = $result->fetch_assoc()) {
    //     // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
    //     echo"<pre>";
    //     print_r($row);
    //     echo"</pre>";
    // }
    // } else {
    // echo "0 results";
    // }
    // $conn->close();


?>