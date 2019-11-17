<?php
session_start();

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
        <h2>Admin Panel</h2>
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
        <h3 style="text-align: center;color: white;"><?= $_SESSION['username'] ?></h3>
        <h4 style="text-align: center; color: white;margin-top: -10px;"> ID : 171500308</h4>
        <h4 style="text-align: center;color: white;margin-top: -10px;"><?= $_SESSION['role'] ?></h4>
    </div>
    <div class="request" style="cursor: pointer;">
        <h3 style="text-align: center;margin-top: 10px;color: white;">Accept the Club Event Request</h3>
    </div>
</body>

</html>
