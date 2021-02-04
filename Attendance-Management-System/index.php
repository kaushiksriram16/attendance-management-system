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

        <div class="loginform col-md-5">
        <legend><b>Login</b></legend><br>
        <form action="" method="post">

            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control">

            <label for="password">Password:</label>
            <input type="text" name="password" class="form-control">

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