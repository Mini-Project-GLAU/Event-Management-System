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

        function formvalidation() {
            var username=$('#username').val();
            var user_type=$('#user_type').val();
            var email=$('#email').val();
            var department=$('#department').val();
            if(username==''){
                alert('Please enter your name');
                return false;
            }

            if(user_type==''){
                alert('Please enter your user type');
                return false;
            }

            if(email==''){
                alert('Please enter your email');
                return false;
            }

            if(department==''){
                alert('Please enter your department');
                return false;
            }
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
            <li><a href="users.php" style="font-family: 'Calistoga', cursive;text-decoration:none;">User Info</a></li>
            <li><a href="users.php" style="font-family: 'Calistoga', cursive;text-decoration:none;">Contact</a>
        </ul>
        <div class="logout-btn" style="width: 100px;height: 40px;font-size: 15px;font-weight: bold;color: white;border: 2px solid white;background-color: #1296AC;margin: 40px; cursor: pointer;text-align:center;position: absolute;">
            <a href="logout.php" style="text-align: center;color: white;text-decoration-line: none;position: absolute;margin-top:5px;margin-left:-30px; ">LOGOUT</a>
        </div>
    </div>
    <div class="user-update" style="position:absolute;top:0;z-index:50; width:400px;height:470px;background-color:white;opacity:0.8;color:black;margin-left:500px;margin-top:120px;border-radius:10px;padding:10px;">
    <form class="form-horizontal" method="post" action="update-user.php" onsubmit="return formvalidation();">
            <fieldset>
                <legend style="font-family: 'Calistoga', cursive;">Edit User Details</legend>
                <?php
      if(isset($_SESSION['success']))
      {
          echo $_SESSION['success'];
          unset($_SESSION['success']);
      }
    ?>
                <?php
      $user_id=$_GET['id'];
      $query = "SELECT * FROM users where id='$user_id'";
      $res = mysqli_query($conn,$query);
      $data=mysqli_fetch_array($res);

    ?>
                <input type="hidden" name="id" value="<?php echo $user_id;?>">
                <div class="form-group">
                    <label for="username" class="col-lg-2 control-label">User Name</label>
                    <div class="col-lg-10">
                        <input type="text" name="username1" class="form-control" id="username" placeholder="Username" value="<?php echo $data['username'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_type" class="col-lg-2 control-label">User Type</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="user_type1" id="user_type" placeholder="UserType" value="<?php echo $data['user_type'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="email1" id="email" placeholder="Email" value="<?php echo $data['email'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="department" class="col-lg-2 control-label">Department</label>
                    <div class="col-lg-10">
                        <input type="text" name="department1" class="form-control" id="department" placeholder="Department" value="<?php echo $data['department'] ?>">
                    </div>
                </div>


                <div class="form-group" style="">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>

</html>
