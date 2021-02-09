<?php
    include '..\partials\_dbconnect.php';

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css\styles.css">
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
                <a class="dropdown-item" href="create-batches.php">Create Batches</a>
                <a class="dropdown-item" href="_logout.php">Logout</a>
            </div>
        </div>
    </div>   
    </nav>

    <div class="header">
       <h1 class="text-center">Take down Attendance here</h1>
    </div>    
    
<div class="container">

    <div class="takeAttendance col-md-5">

        <?php
            $today_date = date('Y-m-d', time());
            echo"<b><h1 class='text-center'>".$today_date."</h1></b>";
        ?>
            
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <?php
                $sql = "SELECT * from `daily_attendance` WHERE `date`= '$today_date'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if($num>=1){
                    echo "<div class='alert alert-info' role='alert'>You already took today's attendance!!</div>";

                }else{
                    echo "<table class='table table-dark table-striped'>
                        <th>Sno.</th><th>Name</th><th>College id</th><th>Attendance</th>";
                        $sno = 1;
                        $sql = "SELECT * FROM students";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                             $arrOfId = array($row["id"]);
                             echo "<tr><td>".$sno."<td>". $row["name"]."</td>"."<td>" . $row["id"]. "</td>" ."<td><label class='btn btn-success' for='present$sno'>Present:</label><input type='radio' name=".$row["id"]." value='present' id='present$sno'> <label class='btn btn-danger' for='absent$sno'>Absent: </label><input type='radio' name=".$row["id"]." value='absent' id='absent$sno'></td></tr>". "<br>";
                             $sno++;
                            }
                        } else {
                            echo "0 results";
                        }
                        echo"</table>";
                        echo"<input type='submit' value='save' class='btn btn-primary btn-lg'>";
                    }
                ?>

        </form>    

        <?php
            
            if($_SERVER["REQUEST_METHOD"]=="POST"){

                    foreach ($_POST as $id => $attendance) {

                            $sql = "INSERT INTO `daily_attendance` (`date`, `sid`, `attendance`)
                                    VALUES ('$today_date', '$id', '$attendance')";

                            $result = mysqli_query($conn, $sql);
                            $_POST = array();
                        }
                        
                        echo "<div class='alert alert-success' role='alert'>You have successfully taken today's attendance!</div>";
                        header("Refresh: 5;URL=display-attendance.php");


                }else{
                    echo"";
                } 
        
        ?>
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

    .dropdown{
        display:inline;
    }

    h1{
        padding:10px;
        font-family:initial;
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
        margin:0 2px;
    }

    input[type=radio]{
        margin-right:10px;
    }

    .displayattendence{
        width:100%;
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

