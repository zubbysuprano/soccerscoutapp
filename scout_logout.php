<?php
session_start();
require_once "classes/Scout.php";
$sc = new Scout;
$scout = $sc->scout_logout();
$_SESSION['good_msg'] = "You have successfully logged out";
header('location:scout_login.php');
exit();
?>