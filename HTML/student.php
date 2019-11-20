<?php
session_start();
require 'db.php';

if(!isset($_SESSION['username']) || $_SESSION['role']!= "student"){
    header("location:Home.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Panel - CEMS</title>
    <meta charset="utf-8">
    <meta name="author" content="Shani Kumar Gupta">
    <meta name="application-name" content="Event Management System">
    <meta name="description" content="This page is for admin to handle all the things">
    <meta name="keywords" content="event,management,system">
    <link rel="stylesheet" href="../CSS/student.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/css?family=Calistoga&display=swap" rel="stylesheet">
</head>

<body>
    <script>
        function toggle() {
            document.getElementById("side-bar").classList.toggle('active');
        }

    </script>
    <div class="admin-background"></div>
    <div class="overlay"></div>
    <div class="nav-bar">
        <h2 style="font-family: 'Calistoga', cursive;">Student Panel</h2>
        <div class="toggle-btn" onclick="toggle()" style="cursor: pointer">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div id="side-bar">
        <ul>
            <li>Home</li>
            <li>About Us</li>
            <li>Contact</li>
        </ul>



        <div class="logout-btn" style="width: 100px;height: 40px;font-size: 15px;font-weight: bold;color: white;border: 2px solid white;background-color: #1296AC;margin: 40px; cursor: pointer;text-align:center;position: absolute;">
            <a href="logout.php" style="text-align: center;color: white;text-decoration-line: none;position: absolute;margin-top:10px;margin-left:-30px; ">LOGOUT</a>
        </div>

    </div>
    <div class="admin-info">
        <h3 style="text-align: center;color: white;font-family: 'Calistoga', cursive;"><?= $_SESSION['username'] ?></h3>
        <h4 style="text-align: center;color: white;margin-top: -10px;font-family: 'Calistoga', cursive;"><?= $_SESSION['role'] ?></h4>
    </div>

     <table class="table table-striped table-hover " style="position:absolute;top:0;margin-top:340px;width:70%;margin-left:300px;">
        <thead>
            <tr>
                <th style="color:white">Sr.No.</th>
                <th style="color:white">Date</th>
                <th style="color:white">Club Name</th>
                <th style="color:white">Event Name</th>
                <th style="color:white">Time From</th>
                <th style="color:white">Time To</th>
                <th style="color:white">Venue</th>
                <th style="color:white">Apply</th>

            </tr>
        </thead>
        <tbody>
            <?php
    $i=1;
            $username = $_SESSION['username'];
            $query = "SELECT * FROM `apply_event` t1 join `users` t2 on t1.apply_by=t2.username";
            $res = mysqli_query($conn,$query);
            $count= mysqli_num_rows($res);

            if($count>0){
                while($row=mysqli_fetch_array($res))
                {
            ?>
            <tr>
                <td style="color:black"><?php echo $i;?></td>
                <td class="l_from" style="color:black"><?php echo $row['l_from']?></td>
                <td class="club" style="color:black"><?php echo $row['club']?></td>
                <td class="evtname" style="color:black"><?php echo $row['evtname']?></td>
                <td class="time_from" style="color:black"><?php echo $row['time_from']?>
                </td>
                <td class="time_to" style="color:black"><?php echo $row['time_to']?></td>
                <td class="venue_select" style="color:black"><?php echo $row['venue_select']?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        <button type="submit" name="apply" class="btn btn-primary">Apply</button>
                    </form>

                </td>
            </tr>
            <?php $i++;}}else{
            }
            ?>
        </tbody>
    </table>



</body>

</html>
