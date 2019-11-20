<?php
session_start();
require 'db.php';
$msg = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = sha1($password);
    $userType = $_POST['userType'];

    $sql = "select * FROM users WHERE username=? AND password=? AND user_type=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss",$username,$password,$userType);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();


    session_regenerate_id();
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['user_type'];
    session_write_close();

    if($result->num_rows==1 && $_SESSION['role']=="student"){
        header("location:student.php");
    }
    else if($result->num_rows==1 && $_SESSION['role']=="teacher"){
        header("location:club.php");
    }

    else if($result->num_rows==1 && $_SESSION['role']=="admin"){
        header("location:admin.php");
    }

    else{
        $msg = "Username or Password is Incorrect!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Shani Kumar Gupta">
    <meta name="description" content="Event Management System">
    <meta name="keywords" content="Event,Management,System">
    <title>Event Management System</title>
    <link rel="stylesheet" href="../CSS/home.css">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="icon" href="../IMAGES/logo.jpg" type="text/css">

</head>

<body>
    <div class="container">
        <div class="nav-bar">
            <h1>College Event Management System</h1>
        </div>
        <div class="left-section">
            <h2>We provide<br><span style="color: lightgreen">solution</span> <br> for your Event's!!!</h2>
        </div>
        <slider>
            <slide></slide>
            <slide></slide>
            <slide></slide>
            <slide></slide>
        </slider>
        <div class="overlay">
        </div>
        <div class="login-section">
        </div>
        <div id="login-under-section">
            <h3>LOGIN TO FIND OUT MORE!!</h3>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="userType" style="color:white;">I'm a:</label>
                <input type="radio" name="userType" value="student" style="color: white;" required><span style="color: white;">Student</span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="userType" value="teacher" required><span style="color: white;">Teacher</span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="userType" value="admin" required><span style="color: white;">Admin</span><br>


                <input type="text" placeholder="&nbsp;&nbsp;Username" name="username" style="width: 87%; height: 35px; border-radius: 5px; border: 1px solid black;font-family: 'Merriweather', serif;margin: 15px;" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <input type="password" placeholder="&nbsp;&nbsp;Password" name="password" style="width: 87%; height: 35px; border-radius: 5px; border: 1px solid black;font-family: 'Merriweather', serif;margin: 15px" required>

                <input type="submit" name="login" value="LOGIN" style="width: 120px;height: 40px;text-align: center;font-size: 20px; font-weight: bold;background-color:#1292AC;color: white;border: 1px solid white;margin-top: 25px; cursor: pointer">


                <br><br><br>

                <a href="#" style="color:white; font-size: 20px;">Forgot Password</a>
                <h5 style="width: 250px;height: 40px;color: white;margin-left:25px;text-align:center;margin-top:30px;font-size:18px;"><?= $msg; ?></h5>
            </form>
        </div>
        <div class="social-section">
            <a href="#"><i class="fa fa-facebook" style="font-size: 30px; color: white; margin-left: 14px;margin-top: 16px;"></i></a>

            <a href="#"><i class="fa fa-instagram" style="font-size: 30px; color: white; margin: 10px;margin-top: 18px;"></i></a>
        </div>

    </div>
</body>

</html>
