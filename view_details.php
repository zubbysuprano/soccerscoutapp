<?php
require_once "classes/Player.php";
require_once "partials/header.php";

$pl = new Player();
$player_data = $pl->search_by_posid(1);
// echo "<pre>";
// print_r($player_data);
// echo "</pre>";
// exit;

?>

<div class="row d-flex justify-content-between">
    
<div class="col-md-3 ">
      
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-success" style="width: 280px; min-height: 400px;">
          <ul class="nav nav-pills flex-column mb-auto">
            
            <li>
              <a href="scout_dashboard.php" class="nav-link link-body-emphasis bg-success active">
                  <i class="fa fa-dashboard"></i>
                Scout Dashboard
              </a>
            </li>
          
            </li>
            <li>
              <a href="search.php" class="nav-link link-body-emphasis">
               <i class="fa fa-users"></i>
            Search Players
              </a>
            </li>
            
          <li>
              <a href="scout_logout.php" class="nav-link link-body-emphasis">
                  <i class="fa fa-power-off"></i>
                Logout
              </a>
            </li>
          </ul>
       
        </div>
      </div>

      <div class="col-md-9">
      
      <div class="row">
        <h1 class="text-center">List Of all Players</h1>
      </div>
   <div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
                
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Date Of Birth</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Bio</th>
                
               
            </tr>

        </thead>
        <tbody>
        <?php 
    foreach($player_data as $player){
    ?>
     <tr>
              
                <td><?php echo $player['player_firstname']; ?></td>
                <td><?php echo $player['player_lastname']; ?></td>
                <td><?php echo $player['player_dob']; ?></td>
                <td><?php echo $player['player_email']; ?></td>
                <td><?php echo $player['player_phone']; ?></td>
                <td><?php echo $player['player_gender']; ?></td>
                <td><?php echo $player['players_bio']; ?></td>
              
               
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
    
    </div>

</div>
<?php
  require_once "partials/footer.php";
    ?>