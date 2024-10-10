<?php 
session_start();
require_once "admin_guard.php";
require_once "classes/Admin.php";

$admin = new Admin;
$admin_data = $admin->get_admin_byid($_SESSION['admin_id']);
// echo "<pre>";
// print_r($player_data);
// echo "<pre>";

if(isset($_SESSION['admin_id'])){
    $_SESSION['admin_id'];  
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.png">


<?php 
  if(isset($_SESSION['errormsg'])){
    echo "<div class='alert alert-danger'>".$_SESSION['errormsg']."</div>";
    unset($_SESSION['errormsg']);
  }
  if(isset($_SESSION['good_msg'])){
    echo "<div class='alert alert-success'>".$_SESSION['good_msg']."</div>";
    unset($_SESSION['good_msg']);
  }
  ?>
      
   <div class="row d-flex justify-content-between">
    

<div class="col-md-3 ">
      
<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-success" style="width: 280px; min-height: 400px;">
    <ul class="nav nav-pills flex-column mb-auto">
      
      <li>
        <a href="admin_dashboard.php" class="nav-link link-body-emphasis bg-success active">
            <i class="fa fa-dashboard"></i>
          Admin Dashboard
        </a>
      </li>
      <li>
        <a href="view_all_players.php" class="nav-link link-body-emphasis">
            <i class="fa fa-edit"></i>
          View Players
        </a>
      </li>
      <li>
        <a href="view_all_scouts.php" class="nav-link link-body-emphasis">
         <i class="fa fa-users"></i>
        View Scouts
        </a>
      </li>
      
    <li>
        <a href="admin_logout.php" class="nav-link link-body-emphasis">
            <i class="fa fa-power-off"></i>
          Logout
        </a>
      </li>
    </ul>
 
  </div>
</div>

<div class="col-md-3 mx-auto">

<div><p class="shadow mt-o bg-body rounded ">   <h4 class="text-center text-success">Welcome to your dashboard <br><?php echo $admin_data['admin_firstname'];  ?> </h4></p></div>



</div>

</div>

