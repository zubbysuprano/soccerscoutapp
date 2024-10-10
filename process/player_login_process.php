<?php 

session_start();
error_reporting(E_ALL);
require_once "../classes/Player.php";
require_once "../classes/Utility_sanitizer.php";
 
$p = new Player();
if(isset($_POST['btnlogin'])){
    //retrival from player signup form elements
    $email = sanitizer($_POST['email']);
    $password = sanitizer($_POST['pass']);
    
    //validation
    
    if(empty($email) || empty($password)){
        $_SESSION['errormsg'] = "Please kindly fill in all the fields";
        header("location:../player_login.php");
        exit();
    }else{
        $player = $p->player_login($email,$password);
        if($player){
            $_SESSION['player_id'] = $player;
            header('location:../player_dashboard.php');
            exit();
        }else{
            header("location:../player_login.php");
            exit;
        }
        
    }

}else{
    $_SESSION['errormsg'] = "Please fill in the fields and submit the form";
    header("location:../player_login.php");
    exit();

}



?>

