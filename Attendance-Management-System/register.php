<?php
    include 'partials\_navbar.php';
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
    
    <div class="alert alert-success" role="alert">
     You have registered successfully! now you can Login
    </div>

    <div class="alert alert-danger" role="alert">
    Something's wrong! registration failed!!
    </div>

        <form action="" method="post">
            <label for="firstname">Firstname:</label>
            <input type="text" name="firstname" class="form-control">

            <label for="lastname">Lastname:</label>
            <input type="text" name="lastname" class="form-control">

            <label for="designation">You are :</label>
            <select style="width:50%" name="designation" class="form-control">
                <option value="none" selected disabled hidden> select an option </option> 
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
            </select>

            <label for="emailid">Email id:</label>
            <input type="text" name="emailid" class="form-control">

            <label for="password">Password:</label>
            <input type="text" name="pasword" class="form-control">

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
</style>