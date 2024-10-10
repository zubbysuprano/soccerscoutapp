<?php
session_start();
require_once "classes/Player.php";
$pl = new Player;
$player = $pl->player_logout();
$_SESSION['good_msg'] = "You have successfully logged out";
header('location:player_login.php');
exit();
?>