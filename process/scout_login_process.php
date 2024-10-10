<?php 

session_start();
error_reporting(E_ALL);
require_once "../classes/Scout.php";
require_once "../classes/Utility_sanitizer.php";
 
$s = new Scout();
if(isset($_POST['btnscoutlogin'])){
    //retrival from player signup form elements
    $email = sanitizer($_POST['email']);
    $password = sanitizer($_POST['pass']);
    
    //validation
    
    if(empty($email) || empty($password)){
        $_SESSION['errormsg'] = "Please kindly fill in all the fields";
        header("location:../scout_login.php");
        exit();
    }else{
        $scout = $s->scout_login($email,$password);
        if($scout){
            $_SESSION['scout_id'] = $scout;
            header('location:../scout_dashboard.php');
            exit();
        }else{
            header("location:../scout_login.php");
            exit;
        }
        
    }

}else{
    $_SESSION['errormsg'] = "Please fill in the fields and submit the form";
    header("location:../scout_login.php");
    exit();

}



?>

