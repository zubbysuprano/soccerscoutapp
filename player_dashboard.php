<?php 
session_start();
require_once "player_guard.php";
require_once "player_guard.php";
require_once "classes/Player.php";


$player = new Player;
$player_data = $player->get_player_byid($_SESSION['player_id']);
// echo "<pre>";
// print_r($player_data);
// echo "<pre>";

if(isset($_SESSION['player_id'])){
    $_SESSION['player_id'];  
}

require_once "partials/header.php";
?> 


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

<div class="col-md-3 mx-auto">
<div class="shadow p-3 mb-5 mt-3 bg-body rounded"> <img src="<?php echo 'uploads/'.$player_data['player_profilepic'];  ?>" alt="profile" width="300" height="200"> </div>
<div><p class="shadow mt-o bg-body rounded ">   <h4 class="text-center text-success">Welcome <?php echo $player_data['player_firstname'];  ?> </h4></p></div>

<div class="row">
  <div class="col md-1.2 mb-5">
    <form action="process/mypictures_process.php" method="post" enctype="multipart/form-data">
    <input type="file" name="mypictures" class="form-select border-success" id="mypictures"><br>
    <button type="submit" class="btn  btn-success" name="btnmypic">Upload Pictures</button>
    </form>
  </div>
  <div class="col md-1.2 mb-5">
  <form action="process/myvideos_process.php" method="post" enctype="multipart/form-data">
    <input type="file" name="myvideos" class="form-select border-success" id="myvideos"><br>
    <button type="submit" class="btn btn-success" name="btnmyvid">Upload Videos</button>
    </form>
</div>
</div>

</div>

</div>

<?php
  require_once "partials/footer.php";
    ?>
    

