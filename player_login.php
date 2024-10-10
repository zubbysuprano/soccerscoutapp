<?php
session_start();


require_once "partials/header.php";
?>

      
    
    <div class="container mb-5 mt-3">
        <div class="row w-75 mx-auto">
            <h4 class="text-success">Player Log In</h4>

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
            <form action="process/player_login_process.php"  method="post" id="playerloginForm" >
                <div class="mb-3">
                    <label for="email" class="col-form-label">Email Address:</label>
                    <input type="email" class="form-control modalinput border-dark" id="email" name="email" placeholder="youremail@example.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="col-form-label">Password:</label>
                    <input type="password" class="form-control modalinput border-dark" id="pass" name="pass" placeholder="******">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="joinbutton btn btn-lg btn-success" name="btnlogin">Login</button>
                    <img src="icons/loader.gif" alt="" class="img-fluid" id="loading" style="display: none;">
                </div>
                <hr>
                <div class="text-center">
                    <p class="text-success">Do not have a player account?</p> <a href="player_signup.php" class="btn btn-success">Sign Up</a>
                </div>


            </form>
            <div class="text-center">
                <p class="text-success mt-4 pointer" data-bs-toggle="modal" data-bs-target="#forgotModal">Forgot Password?</p>
            </div>
        </div>
    </div>
          
    <?php
  require_once "partials/footer.php";
    ?>
    