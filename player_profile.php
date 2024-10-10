<?php
session_start();
require_once "player_guard.php";
require_once "classes/Player.php";
require_once "classes/Position.php";

$player = new Player;
$player_data = $player->get_player_byid($_SESSION['player_id']);

$pos = new Position;
$position = $pos->fetch_all_positions();
// echo "<pre>";
// print_r($position);
// echo "<pre>";

if(isset($_SESSION['player_id'])){
    $_SESSION['player_id'];  
}


require_once "partials/header.php";
?>



      <div class="container mb-5 mt-3">
        <div class="row  d-flex justify-content-between">


        <div class="col-md-3 ">
      
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-success" style="width: 280px; min-height: 400px;">
          <ul class="nav nav-pills flex-column mb-auto">
            
            <li>
              <a href="player_dashboard.php" class="nav-link link-body-emphasis bg-success active">
                  <i class="fa fa-dashboard"></i>
                Dashboard
              </a>
            </li>
            <li>
              <a href="player_profile.php" class="nav-link link-body-emphasis">
                  <i class="fa fa-edit"></i>
                Profile
              </a>
            </li>
            <li>
              <a href="mygallery.php" class="nav-link link-body-emphasis">
               <i class="fa fa-users"></i>
              Gallery
              </a>
            </li>
            <li>
              <a href="player_logout.php" class="nav-link link-body-emphasis">
                  <i class="fa fa-power-off"></i>
                Logout
              </a>
            </li>
          </ul>
       
        </div>
      </div>
      
            <div class="col-md-9">

            <h4 class="text-success">Profile Update </h4>

            <?php 
  if(isset($_SESSION['errormsg'])){
    echo "<div class='alert alert-danger'>".$_SESSION['errormsg']."</div>";
    unset($_SESSION['errormsg']);
  }
  
  ?>
            <form action="process/player_profile_update_process.php"  method="post" enctype="multipart/form-data" id="playerprofile">
                <fieldset>
                    <legend>Personal Information:</legend>
                    <div class="mb-3">
                        <label for="firstname" class="col-form-label">First Name:</label>
                        <input type="text" class="form-control modalinput border-success" id="firstname" name="fname" value="<?php echo $player_data['player_firstname'];  ?>">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="col-form-label">Last Name:</label>
                        <input type="text" class="form-control modalinput border-success" id="lastname" name="lname" value="<?php echo $player_data['player_lastname'];  ?>">
                    </div>
         
                    
                  

                <div class="mb-3">
                    <label for="phone" class="col-form-label">Phone Number:</label>
                    <input type="text" class="form-control modalinput border-success" id="phone" name="phone" value="<?php echo $player_data['player_phone'];  ?>"> 
                </div>
                <div class="mb-3">
                    <label for="profile_pic" class="col-form-label">Profile Picture:</label>
                    <input type="file" class="form-control modalinput border-success" id="profile_pic" name="profile_pic">
                </div>
                <div class="mb-3">
                    <label for="position" class="col-form-label">What positions do you play?:</label>
                    <select class="form-select border-success" name="position" id="position">
                        <option value="">Please select your position</option>
                        <?php 
                        foreach($position as $pos){
                        ?>
                            <option value="<?php echo $pos['position_id']?>"><?php echo $pos['position_name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                  
                </div>
              
                <div class="mb-3">
                    <label for="status" class="col-form-label">Club status:</label>
                    <select class="form-select border-success" name="status" id="status">
                        <option value="">Please select </option>
                        <option value="1">Active </option>
                        <option value="0">Inactive </option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="bio" class="col-form-label">Bio:</label>
                    <textarea class="form-control border-success"  name="bio" id="bio" name="bio"><?php echo $player_data['players_bio'];  ?></textarea>
                   
                </div>
              
                <div class="modal-footer">
                    <button type="submit" class="joinbutton btn btn-lg btn-success" name="btnplayerupdate">Update Profile</button>
                   
                </div>
                <hr>
                


            </form>
        </div>
        </div>
    </div>

      
    
          
    <?php
  require_once "partials/footer.php";
    ?>
    