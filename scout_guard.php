<?php 
if(!isset($_SESSION['scout_id'])){
    $_SESSION['errormsg'] = "You must be logged in to access the page";
    header("location:player_login.php");
    exit();
}

?>