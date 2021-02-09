<?php
    include 'partials\_dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Attendance Management System</a>
      <a class="navbar-item btn btn-primary" href="student\student-signup-page.php">Sign up as Student</a>
      <a class="navbar-item btn btn-primary" href="teacher/teacher-signup-page.php">Sign up as Teacher</a>
    </div>   
    </nav>


    <div class="container">

        <div class="loginform col-md-5">
        <legend><b>User Login</b></legend><br>
        <form action="" method="post">

            <label for="designation">You are: </label>
            <select name="designation" class="form-control">
                <option value="none" selected disabled hidden> Select from here </option>
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
            </select>

            <label for="email">email id/student id:</label>
            <input type="text" name="username" class="form-control">

            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control">

            <input type="submit" class="btn btn-primary" value="submit">
        </form>
    </div>

    <?php

        session_start();

        if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['designation'])){        
        
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];

        $username = $_POST['username'];
        $password = $_POST['password'];
        $designation = $_POST['designation'];

        if($designation=="teacher"){
            $sql = "SELECT * FROM `teachers` WHERE `email`='$username' AND `password`='$password' ";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            if ($num>=1) {
            header("Location: teacher/take-attendance.php");
             }else{
            echo"<div class='alert alert-danger' role='alert'>
                  <b> You have entered wrong credentials please check <br>
                  if you have not registered register by clicking on teacher signup 
              </b></div><br>";
              header("Refresh: 5");
          }
        }
        else{
            $sql = "SELECT * FROM `students` WHERE `id`='$username' AND `password`='$password' ";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            if($num>=1){
                header("Location: student\check-attendance.php");
            }else{
                echo"<div class='alert alert-danger' role='alert'>
                    <b>You have entered wrong credentials please check <br>
                    if you have not registered register by clicking on student signup
                </b></div><br>";
                header("Refresh: 5");
            }

        }

    }
?>

    
</div>

</body>
</html>

<style>
    body{
    background-color: #ddd;
    }

    .container{
        padding:20px;
        font-family:initial;
    }

    a{
       text-decoration:none; 
       color:white;
       padding:20px 5px;
    }

    .navbar{
        padding:20px 0;
    }


    .btn{
        margin:0 5px;
    }
</style>