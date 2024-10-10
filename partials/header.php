<?php

// Check if a session is already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
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

    <title>SoccerScoutAfrica</title>
    <style type="text/css">
        div{
            border: 1px solid none;
            min-height: 100px;
            background-color: transparent;
        }
        .webname{
            text-align: center;
            padding-top: 30px;
            font-size: 70px;
            font-weight: ;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .webnamep{
            text-align: center;
            padding-top: 20px;
            font-size: 30px;
            color:white;
            font-weight: bold;
            font-style: italic;
        }
        #getstarted{
            padding-right: 0px 30px 0px 30px;
            margin-right: 40px;
        }
        
        .banner{
            position: relative;
            text-align: center;
            color: white;
            background-color: aliceblue;
            padding: 40px;
        
        }
      
      .bannerimage{
        height: 500px;
        width: 100%;
      }
        .banner2{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .contentbody{
        display: flex;
        justify-content: space-between;
        background-color: white;
        padding: 30px;
    }
    #contentbodyh1{
        padding: 20px;
    }
    #contentbodyp{
        padding: 20px;
    
    }
    .beforefooter1{
        display: flex;
        justify-content: space-between;
        background-color: white;
        padding: 30px;

    }
    .beforefooter2{
        display: flex;
        justify-content: center;
        background-color: white;
    }
    .getstarted{
        text-align: center;
        padding-top: 30px;
        background-color: white;
    }
    #knownfor{
        text-align: center;
        padding-top: 20px;
        color: green;
        background-color: white;
    }
    .card1{
        text-align: center;
        margin: 10px 0px 10px 10px;
        
    }
    .copyright{
        text-align: center;
        padding-top: 30px;
        /* background-color:lightgreen; */
        
    }
    .footer{
        display: flex;
        justify-content: space-between;
        background-color: white;
        padding: 30px;
    }
    .socials{
		display: flex;
		justify-content: space-around;
		padding: 5px;
		border-radius: 5px;
        margin-top: 30px;
	}
    .aboutfooter{
        margin: 30px 0px 0px 30px;
    }
    .helpfooter{
        margin: 30px 0px 0px 30px;
    }
    .newsletter{
       
        margin: 30px 0px 20px 30px;
    }
    .footer a{
        text-decoration: none;
        color: black;
      
    }
    .logoname{
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: 40px;
        font-weight: bold;

    }
    .navcolor{
        /* background-color: aliceblue; */
    }
   


        
    </style>
</head>
<body>
  <div class="container">
    <div class="row">
        <header class="navigation bg-success navcolor">
            <nav class="navbar navbar-expand-xl navbar-light text-center py-3">
                <div class="container">
                    <a class="navbar-brand logoname text-success" href="index.php">
                        SoccerScoutAfrica
                      
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mt-2 pt-5">
                            <li class="nav-item"> <a class="nav-link text-success" href="index.php">Home</a>
                            </li>
                            <li class="nav-item "> <a class="nav-link text-success" href="about.php">About</a>
                            </li>
                           
                          
                           
                            </li>
                            <li class="nav-item "> <a class="nav-link text-success" href="contact.php">Contact Us</a>
                            </li>

                            
                            </li>
                            <?php
    // Check if the player is not logged in
    if(!isset($_SESSION['player_id']) && !isset($_SESSION['scout_id'])){
        ?>
        <!-- Player Dropdown for registration/login -->
        <div class="dropdown ms-3">
            <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Player
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="player_signup.php">Register</a></li>
                <li><a class="dropdown-item" href="player_login.php">Login</a></li>
            </ul>
        </div>
        
        <!-- Scout Dropdown for registration/login -->
        <div class="dropdown ms-4">
            <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Scout
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="scout_signup.php">Register</a></li>
                <li><a class="dropdown-item" href="scout_login.php">Login</a></li>
            </ul>
        </div>
        <?php
    }
?>

<?php
    // Check if player is logged in
    if(isset($_SESSION['player_id'])){
        ?>
        <!-- Player Dashboard -->
        <div class="dropdown ms-3">
            <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Dashboard
            </a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="player_dashboard.php">Dashboard</a></li>
                <li><a class="dropdown-item" href="player_logout.php">Logout</a></li>
            </ul>
        </div>
        <?php
    }
?>

<?php
    // Check if scout is logged in
    if(isset($_SESSION['scout_id'])){
        ?>
        <!-- Scout Dashboard -->
        <div class="dropdown ms-4">
            <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dashboard
            </a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="scout_dashboard.php">Dashboard</a></li>
                <li><a class="dropdown-item" href="scout_logout.php">Logout</a></li>
            </ul>
        </div>
        <?php
    }
?>

                           </ul>
                        
                            
                </div>
            </nav>
        </header>
        </div>
      </nav>