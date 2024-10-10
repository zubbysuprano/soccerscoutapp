<?php
session_start();

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


<div class="container mb-5 mt-3">
        <div class="row w-75 mx-auto">
            <h4 class="text-success">Admin Log In</h4>

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
  
            <form action="process/admin_login_process.php" id="adminloginForm" method="post">
                <div class="mb-3">
                    <label for="username" class="col-form-label">Username</label>
                    <input type="text" class="form-control modalinput border-dark" id="username" name="username"  >
                </div>
                <div class="mb-3">
                    <label for="password" class="col-form-label">Password:</label>
                    <input type="password" class="form-control modalinput border-dark" id="pass" name="pass" placeholder="******">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="joinbutton btn btn-lg btn-success" name="adminbtnlogin">Login</button>
                  
                </div>
               

            </form>
            <div class="text-center">
                <p class="text-success mt-4 pointer" data-bs-toggle="modal" data-bs-target="#forgotModal">Forgot Password?</p>
            </div>
        </div>
    </div>
          
