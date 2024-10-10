<?php
session_start();
error_reporting(E_ALL);
require_once "../classes/Player.php";
require_once "../classes/Utility_sanitizer.php";
 
$p = new Player();
if(isset($_POST['btnplayerreg'])){
    //retrival from player signup form
    $fname = sanitizer($_POST['fname']);
    $lname = sanitizer($_POST['lname']);
    $dob = sanitizer($_POST['dob']);
    $email = sanitizer($_POST['email']);
    $phone = sanitizer($_POST['phone']);
    $gender = isset($_POST['gender']) ? $_POST['gender']: "";
    $country =  $_POST['country'];
    // $country = isset($_POST['country']) ? $_POST['country']: '';
    $pass1 = sanitizer($_POST['pass1']);
    $pass2 = sanitizer($_POST['pass2']);

   
    $email_available = $p->check_email($email);

    //validation
    if(($pass1 != $pass2) || (empty($pass1) || empty($pass2))){
        $_SESSION['errormsg'] = "The two passwords must match and must not be blank";
        header('location:../player_signup.php');
        exit();
    }elseif($email_available){
        $_SESSION['errormsg'] = "The email is taken";
        header('location:../player_signup.php');
        exit();
        //empty($country)
    }elseif(empty($fname) || empty($lname) || empty($dob) || empty($email) || empty($phone) || empty($gender) || empty($country)  ){
        $_SESSION['errormsg'] = "Please kindly fill in all the fields";
        header("location:../player_signup.php");
        exit();
    }else{
        $player = $p->player_signup($fname,$lname,$dob,$email,$phone,$gender,$country,$pass1);
        $_SESSION['good_msg'] = "Signup successful,login here";
        header("location:../player_login.php");
        exit();
        
      
    }

}else{
    $_SESSION['errormsg'] = "Please fill in the fields and submit the form";
    header("location:../player_signup.php");
    exit();

}



?>