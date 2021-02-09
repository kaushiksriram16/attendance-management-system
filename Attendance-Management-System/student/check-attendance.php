<?php
    include '..\partials\_dbconnect.php';
    include '..\partials\_navbar.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Attendance</title>
</head>
<body>
    <div class="header">
       <h1 class="text-center">Your Attendance will appear here</h1>
    </div>
</body>
</html>


<?php

    session_start();

    if(isset($_SESSION)){

        $id = $_SESSION['username'];

        $sql = " SELECT * FROM `daily_attendance` WHERE `sid`='$id' ";

        $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                echo "<table class='table table-light table-striped'><tr><th> Date</th> <th>Attendance</th></tr>";
        
                while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['date']."</td> <td>".$row['attendance']."</td></tr>";
            }
            } else {
            echo "<div class='alert alert-info' role='alert'>No entries</div>";
            }
    }
?>

<style>

    body{
    background-color: #ddd;
    }

    .header{
        margin:0;
        padding:100px;
        background-color:#212529;
        color:white;
        width:100%;
    }

    table{
        margin-top: 50px;
        text-align:center;
    }

</style>