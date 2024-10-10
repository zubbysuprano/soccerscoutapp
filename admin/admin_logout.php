<?php
session_start();
require_once "classes/Admin.php";
$ad = new Admin;
$admin = $ad->admin_logout();
$_SESSION['good_msg'] = "You have successfully logged out";
header('location:admin_login.php');
exit();
?>