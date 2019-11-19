<?php
session_start();
require 'db.php';

if(!$conn){
    die("Database connection error");
}

//insert query for registration page
if(isset($_REQUEST['l_from'])){
    $l_from = $_POST['l_from'];
    $club = $_POST['club'];
    $evtname = $_POST['evtname'];
    $time_from = $_POST['time_from'];
    $time_to = $_POST['time_to'];
    $venue_select = $_POST['venue_select'];
    $apply_by = $_POST['username'];
    $status = "Pending";
}

$query = "INSERT INTO apply_event (`id`,`l_from`,`club`,`evtname`,`time_from`,`time_to`,`venue_select`,`apply_by`,`status`) VALUES ('','$l_from','$club','$evtname','$time_from','$time_to','$venue_select','$apply_by','$status')";

$res=mysqli_query($conn,$query);
if($res){
    $_SESSION['success']="Event Venue applied Successfully!!!";
    header('location:club.php');
}else{
    echo "Event venue not applied, Please try again!!";
}

?>
