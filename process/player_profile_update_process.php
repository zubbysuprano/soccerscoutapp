<?php 
session_start();
require_once "../classes/Player.php";
require_once "../classes/Utility_sanitizer.php";

$p = new Player;

if(isset($_POST['btnplayerupdate'])){
    $fname = sanitizer($_POST['fname']);
    $lname = sanitizer($_POST['lname']);
    
    $player_phone = sanitizer($_POST['phone']);
    $player_clubstatus = $_POST['status'];
   
    $profilepic_name = $_FILES['profile_pic'];
    $player_bio = sanitizer($_POST['bio']);
    // $player_position = isset($_POST['position']) ? $_POST['position']: "";
    $player_position = $_POST['position'];





    // || empty($player_country) || empty($player_position) 
    if(!isset($player_clubstatus)){
        $_SESSION['errormsg'] = "Please fill in the required fields";
        header("location:../player_profile.php");
        exit();
    }else{
        $check = $p -> update_player($fname,$lname,$player_phone,$player_clubstatus,$profilepic_name,$player_bio,$player_position);
        header("location:../player_profile.php");
        exit();
    }
}
else{
    $_SESSION['errormsg'] = "Pls fill in the fields and click the update button";
    header("location:../player_profile.php");
    exit();
}

?>