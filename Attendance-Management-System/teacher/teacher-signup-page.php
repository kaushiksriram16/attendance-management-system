<?php
    
    include '..\partials\_navbar.php';

    $showAlert = false;
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){

    include '..\partials\_dbconnect.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $emailid = $_POST['emailid'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $success = false;

        if(($password == $cpassword)){

            $sql = "SELECT * from `teachers` where `email`='$emailid'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            if($num<=1){
                $showError = "<b>This entry already exists!!</b> ";
               
            } else{

                    $sql = "INSERT INTO `teachers` (`firstname`, `lastname`, `email`, `password`) 
                    VALUES ('$firstname', '$lastname', '$emailid', '$password')";
                    $result = mysqli_query($conn, $sql);
                    $success = true; 
          }
        }
        else{
            $showError = "<b>Passwords didn't match!!</b> ";
        }
    }
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

    <div class="container">

        <div class="signupform col-md-5">
        <legend><b>Signup</b></legend><br>  

    <?php

        $sec = 5;
    
        if(isset($success) && $success==true){
            echo "<div class='alert alert-success' role='alert'>
                 You have registered successfully! now you can Login</div><br>";

            header("Refresh: ".$sec);
        }
        if(isset($showError)){
            echo "<div class='alert alert-danger' role='alert'>"
                .$showError." Registration failed!!</div><br>";
                
            header("Refresh: ".$sec);
        }
    ?>
  

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <label for="firstname">Firstname:</label>
            <input type="text" name="firstname" class="form-control" required>

            <label for="lastname">Lastname:</label>
            <input type="text" name="lastname" class="form-control" required>

            <label for="emailid">Email id:</label>
            <input type="text" name="emailid" class="form-control" required>

            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required>

            <label for="cpassword">Confirm Password:</label>
            <input type="password" name="cpassword" class="form-control" required>

            <input type="submit" class="btn btn-primary" value="submit">
        </form>
    </div>
    
    </div>
    
</body>
</html>

<style>
    body{
    background-color: #ddd;
    }

    .container{
         font-family:initial;
    }

    .alert{
        margin:auto;
    }

    input[type=submit]{
    margin: 10px 0;
    }

</style>