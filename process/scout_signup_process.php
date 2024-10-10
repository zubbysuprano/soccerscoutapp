<?php
session_start();
error_reporting(E_ALL);
require_once "../classes/Scout.php";
require_once "../classes/Utility_sanitizer.php";
 
$s = new Scout();
if(isset($_POST['btnscoutsign'])){
    //retrieval from player signup form
    $firstname = sanitizer($_POST['firstname']);
    $lastname = sanitizer($_POST['lastname']);
    $dob = sanitizer($_POST['dob']);
    $email = sanitizer($_POST['email']);
    $phone = sanitizer($_POST['phone']);
    $pass1 = sanitizer($_POST['pass1']);
    $pass2 = sanitizer($_POST['pass2']);

   
    $email_available = $s->check_email($email);

    //validation
    if(($pass1 != $pass2) || (empty($pass1) || empty($pass2))){
        $_SESSION['errormsg'] = "The two passwords must match and must not be blank";
        header('location:../scout_signup.php');
        exit();
    }elseif($email_available){
        $_SESSION['errormsg'] = "The email is taken";
        header('location:../scout_signup.php');
        exit();
    }elseif(empty($firstname) || empty($lastname) || empty($dob) || empty($email) || empty($phone)){
        $_SESSION['errormsg'] = "Please kindly fill in all the fields";
        header("location:../scout_signup.php");
        exit();
    }else{
        $scout = $s->scout_signup($firstname,$lastname,$dob,$email,$phone,$pass1);
        $_SESSION['good_msg'] = "Signup successful,login here";
        header("location:../scout_login.php");
        exit();
        
      
    }

}else{
    $_SESSION['errormsg'] = "Please fill in the fields and submit the form";
    header("location:../scout_signup.php");
    exit();

}



?>