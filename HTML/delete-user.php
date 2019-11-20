<?php
session_start();
require 'db.php';

if(!$conn){
    die("Database connection error");
}

$user_id=$_GET['id'];


    $query = "delete from `users` where `id`='$user_id'";

    $res=mysqli_query($conn,$query);
    if($res){
        $_SESSION['success'] = "Delete successfully";
        header('location:users.php');
    }else{
        echo "Data not updated, Please try again";
    }

?>
