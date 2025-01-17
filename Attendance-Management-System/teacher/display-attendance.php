<?php
    include '..\partials\_dbconnect.php';
    include '..\partials\_export-to-excel.php';

    session_start();
    if(isset($_SESSION["username"])){
        $email = $_SESSION["username"];
    }else{
        //header("Location: index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Attendence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Attendance Management System</a>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                jump to
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="display-attendance.php">Display attendance</a>
                <a class="dropdown-item" href="#">Create Batches</a>
                <a class="dropdown-item" href="_logout.php">Logout</a>
            </div>
        </div>
    </div>   
    </nav>

    <div class="header">
       <h1 style="font-family:initial" class="text-center">Display Attendance</h1>
    </div>    

    <div class="displayattendence">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-control ">

        <div>
            <label for="Attendancedate">Enter the Date: </label>
            <input class="form-control" placeholder="yyyy-mm-dd" type="text" name="Attendancedate" id="">
            <input type="submit" value="submit" name="submitdate" class="btn btn-primary " >
        </div>
        </form>

        <?php

            if($_SERVER["REQUEST_METHOD"]=="POST"){

             $date = $_POST['Attendancedate'];   

            $sql = "SELECT `sid`,`name`,`attendance` from daily_attendance,students where `date`='$date' AND `sid`=`id`";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                echo "<table class='table table-light table-striped'><tr><th> ID</th><th>Student Name</th><th>Attendance</th></tr>";
        
                while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['sid']."</td><td>".$row['name']."</td><td>".$row['attendance']."</td></tr>";
             }
                echo "</table>";
            echo "<button class='btn btn-success' >Generate Excel sheet</button><br>";
            } else {
            echo "<div class='alert alert-danger' role='alert'>Invalid Entry!!</div>";
            }
    }

        
    ?>

    </div>

    
</body>
</html>

<style>

    .displayattendence{
        /* text-align:center; */
    }


    h1{
        font-family:initial;
    }

    .header{
        margin:0;
        padding:100px;
        background-color:#212529;
        color:white;
        width:100%;
    }

    .navbar{
        padding:20px 0;
    }

    .dropdown{
        display:inline;
    }

    h1{
        padding:10px;
    }

    body{
    background-color: #ddd;
    }

    .container{
         font-family:initial;
    }

    input[type=submit]{
    margin: 10px 0;
    }

    input[type=text],[type=date]{
        width:60%;
    }

    .takeAttendance{
        width:100%;
        background-color:white;
        padding:10px;
        margin:15px 0;
    }

    .table{
        font-size:20px;
        text-align:center;
        margin:10px 0;
    }

    .btn{
        margin:5px 2px;
    }

    .displayattendence{
        width:100%;
    }

    
</style>