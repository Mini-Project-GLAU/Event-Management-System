<?php
session_start();
require 'db.php';

if(!isset($_SESSION['username']) || $_SESSION['role']!= "admin"){
    header("location:admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="author" content="Shani Kumar Gupta">
    <meta name="application-name" content="Event Management System">
    <meta name="description" content="This page is for admin to handle all the things">
    <meta name="keywords" content="event,management,system">
    <link rel="stylesheet" href="../CSS/admin.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link href="https://fonts.googleapis.com/css?family=Calistoga&display=swap" rel="stylesheet">
    <script src="../JAVASCRIPT/admin.js"></script>
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
        <h2 style="font-family: 'Calistoga', cursive;">Admin Panel</h2>
        <div class="toggle-btn" onclick="toggle()" style="cursor: pointer">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div id="side-bar">
        <ul>
            <li><a href="admin.php" style="font-family: 'Calistoga', cursive;text-decoration:none;">Dashboard</a>
            <li><a href="users.php" style="font-family: 'Calistoga', cursive;text-decoration:none;">User Records</a></li>
            <li><a href="users.php" style="font-family: 'Calistoga', cursive;text-decoration:none;">Contact</a>
        </ul>
        <div class="logout-btn" style="width: 100px;height: 40px;font-size: 15px;font-weight: bold;color: white;border: 2px solid white;background-color: #1296AC;margin: 40px; cursor: pointer;text-align:center;position: absolute;">
            <a href="logout.php" style="text-align: center;color: white;text-decoration-line: none;position: absolute;margin-top:5px;margin-left:-30px; ">LOGOUT</a>
        </div>
    </div>
    <div class="admin-info">
        <h3 style="text-align: center;color: white;font-family: 'Calistoga', cursive;"><?= $_SESSION['username'] ?></h3>
<!--        <h4 style="text-align: center; color: white;margin-top: -10px;font-family: 'Calistoga', cursive;"> ID : 171500308</h4>-->
        <h4 style="text-align: center;color: white;margin-top: -10px;font-family: 'Calistoga', cursive;"><?= $_SESSION['role'] ?></h4>
    </div>
    <div class="request" style="cursor: pointer;">
        <h3 style="text-align: center;margin-top: 10px;color: white;font-family: 'Calistoga', cursive;font-size:20px;">Registered Users Records</h3>
    </div>
    <table class="table table-striped table-hover " style="position:absolute;top:0;margin-top:340px;width:70%;margin-left:300px;">
        <thead>
            <tr>
                <th style="color:white">Sr.No.</th>
                <th style="color:white">User Name</th>
                <th style="color:white">User Type</th>
                <th style="color:white">Email</th>
                <th style="color:white">Department</th>
                <th style="color:white">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
    $i=1;
            $username = $_SESSION['username'];
            $query = "SELECT * FROM `users`";
            $res = mysqli_query($conn,$query);
            $count= mysqli_num_rows($res);

            if($count>0){
                while($row=mysqli_fetch_array($res))
                {
            ?>
            <tr>
                <td style="color:black"><?php echo $i;?></td>
                <td style="color:black"><?php echo $row['username']?></td>
                <td style="color:black"><?php echo $row['user_type']?></td>
                <td style="color:black"><?php echo $row['email']?></td>
                <td style="color:black"><?php echo $row['department']?>
                </td>
                <td style="color:black"><a href="edit-user.php?id=<?php echo $row['id'];?>">Edit</a> | <a href="delete-user.php?id=<?php echo $row['id'];?>">Delete</a></td>

            </tr>
            <?php $i++;}}else{
            }
            ?>
        </tbody>
    </table>
</body>

</html>
