<?php
session_start();
require 'db.php';



if(isset($_REQUEST['id']))
{
    $user_id=$_POST['id'];
    $username=$_POST['username1'];
    $user_type=$_POST['user_type1'];
    $email = $_POST['email1'];
    $department = $_POST['department1'];

    $query = "UPDATE `users` SET `username`='$username',`user_type`='$user_type',`email`='$email',`department`='$department' where `id`='$user_id'";

    $res=mysqli_query($conn,$query);
    if($res){
        $_SESSION['success'] = "Data Updated successfully";
        header('location:users.php');
    }else{
        echo "Data not updated, Please try again";
    }
}
?>
