<?php 
session_start();
require_once "admin_guard.php";
require_once "classes/Admin.php";

$p = new Admin;
$all_players = $p->fetch_all_players();


// if(isset($_SESSION['admin_id'])){
//     $_SESSION['admin_id'];  
// }

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
            <a href="admin_login.php" class="nav-link link-body-emphasis">
                <i class="fa fa-power-off"></i>
              Logout
            </a>
          </li>
        </ul>
     
      </div>
    </div>
    
    <div class="col-md-9 mx-auto">
    
   
    
 
    




      <div class="row">
        <h1 class="text-center">List Of all Players</h1>
      </div>
   <div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Player_id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Date Of Birth</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Country_id</th>
                <th>Club Status</th>
                <th>Profile Pic Name</th>
                <th>Bio</th>
                <th>Position_id</th>
                <th>Date_registered</th>
            </tr>

        </thead>
        <tbody>
        <?php 
    foreach($all_players as $player){
    ?>
     <tr>
                <td><?php echo $player['player_id']; ?></td>
                <td><?php echo $player['player_firstname']; ?></td>
                <td><?php echo $player['player_lastname']; ?></td>
                <td><?php echo $player['player_dob']; ?></td>
                <td><?php echo $player['player_email']; ?></td>
                <td><?php echo $player['player_phone']; ?></td>
                <td><?php echo $player['player_password']; ?></td>
                <td><?php echo $player['player_gender']; ?></td>
                <td><?php echo $player['player_countryid']; ?></td>
                <td><?php echo $player['player_clubstatus']; ?></td>
                <td><?php echo $player['player_profilepic']; ?></td>
                <td><?php echo $player['players_bio']; ?></td>
                <td><?php echo $player['position_id']; ?></td>
                <td><?php echo $player['players_date_registered']; ?></td>
            </tr>

   

    <?php 
    }
    ?>

        </tbody>
    </table>
    
  






</div>

</div>

</div>
    
    </div>



