<?php

session_start();
error_reporting(E_ALL);
require_once "../classes/Admin.php";
require_once "../classes/Utility_sanitizer.php";
 
$ad = new Admin();
if(isset($_POST['adminbtnlogin'])){
    //retrival from player signup form elements
    $username = sanitizer($_POST['username']);
    $password = sanitizer($_POST['pass']);
    
    //validation
    
    if(empty($username) || empty($password)){
        $_SESSION['errormsg'] = "Please kindly fill in all the fields";
        header("location:../admin_login.php");
        exit();}
    else{
        $admin = $ad->admin_login($username,$password);
        if($admin){
            $_SESSION['admin_id'] = $admin;
            header('location:../admin_dashboard.php');
            exit();
        }else{
            header("location:../admin_login.php");
            exit;
        }
        
    }

}else{
    $_SESSION['errormsg'] = "Please fill in the fields and submit the form";
    header("location:../admin_login.php");
    exit();

}



?>
