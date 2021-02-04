<?php
    include '..\partials\_dbconnect.php';
    include '..\partials\_navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css\styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>

    <div class="header">
       <h1 class="text-center">Teacher's Dashboard</h1>
    </div>    
    
<div class="container">

    <div class="takeAttendance col-md-5">
        <h1 class="text-center">Take Attendance</h1><br>
        <?php
            echo"<h1 class='text-center'>".date('m/d/Y', time())."</h1>";
        ?>

            <label for="batch-name">Select batch:</label>
            <select style="width:60%" name="designation" class="form-control">
                <option value="none" selected disabled hidden> Select from here </option> 
                <option value="teacher">Batches will appear here..</option>
            </select>

            <table class="table table-light table-striped">
                <th>Sno.</th><th>Name</th><th>Id</th><th>Attendance</th>
            </table>

            <input type="submit" value="save" class="btn btn-primary">
    </div>    

    <div class="displayattendence">
        <form method="post" class="form-control ">
        <h1 class="text-center">Display Attendance</h1>
        <div>
            <label for="Attendancedate">Enter the Date: </label>
            <input class="form-control" type="date"  min='2020-09-01' max= <?php echo "'".date('Y-m-d', time())."'"?> name="Attendancedate" id="">
            <input type="submit" value="submit" name="submitdate" class="btn btn-primary" >
        </div>
        </form>
    
    </div>

    <div class="addordelete">
        <form method="post" class="form-control">
         <h1 class="text-center">Add/Delete Students</h1>

            <label for="batch-name">Select batch:</label>
            <select style="width:60%" name="designation" class="form-control">
                <option value="none" selected disabled hidden> Select from here </option> 
                <option value="teacher">Batches will appear here..</option>
            </select>

            <label for="student-id">Enter Student id:</label>
            <input type="text" class="form-control" name="student-id" id="sid">

            <input type="submit" value ="add" id="add" class="btn btn-primary">
            <input type="submit" value ="delete" id="delete" class="btn btn-danger">
         </form>
    </div>

</div>


</body>
</html>

<style>

    .header{
        margin:0;
        padding:100px;
        background-color:#212529;
        color:white;
        width:100%;
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
        margin:20px 0;
    }

    .displayattendence{
        width:100%;
    }

    .addordelete{
        
        width:100%;
    }

    
</style>