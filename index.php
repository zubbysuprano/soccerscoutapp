<?php 
session_start();

// require_once "classes/Player.php";
require_once "classes/Position.php";

// $player = new Player;
// $player_data = $player->get_player_byid($_SESSION['player_id']);

$pos = new Position;
$position = $pos->fetch_all_positions();

require_once "partials/header.php";
?>
      <!-- end of navbar -->
    <div class="row">
        <div class="col-md-12 banner" >
          <div>
          
        
            <div class="banner1">
                <img src="assets/images/banner2.jpg" alt="banner" class="img-fluid bg-success bg-gradient bannerimage" >
            </div>
            <div class="banner2">
            <h1 class="webname text-light">SoccerScoutAfrica</h1>
            <p class="webnamep">Living The dream</p>
            </div>
        </div>
    </div>
    <div class="row contentbody">
       
        <div class="col-md-6">
            <div class="row">
            <h1 id="contentbodyh1" class="text-success">Bridging The Gap Between Just Having The Talent And Going Pro:</h1>
            <p id="contentbodyp">We give platform to the enormous talents in Africa who want to get into the big clubs and leagues,but do not know how. We give visibility to every talented ahlete out there through our scouting community.</p>
        </div>
      
        </div>
        <div class="col-md-6">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="assets/images/carouse1.jpg" class="d-block w-100" alt="carouse1">
                  </div>
                  <div class="carousel-item">
                    <img src="assets/images/carouse3.jpg" class="d-block w-100" alt="carouse3">
                  </div>
                  <div class="carousel-item">
                    <img src="assets/images/carouse4.jpg" class="d-block w-100" alt="carouse4">
                  </div>
                  
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
    </div>
    <div class="row">  
        <div class="col-md-12  getstarted">
     <form action="playerlogin.html" method="get">
        <button type="button" class="btn btn-success">GET STARTED</button>
     </form>
    </div>
</div>
    
        <div class="row">
            <h1 id="knownfor">  HOW IT WORKS HERE</h1>
        </div>
        <div class="row beforefooter1">
        <div class="col-md-4 card1">
            <div class="card border-success mb-3" style="max-width: 18rem;">
            <div class="card-header bg-transparent border-success text-success">CREATE YOUR PROFILE</div>
            <div class="card-body text-success">
              <h5 class="card-title">SELL YOUR POTENTIALS</h5>
              <p class="card-text">You create your profile,uplading your well created and clear videos and picture,and other other neccessary document and CV which could help build your profile and spark interest from scouts.</p>
            </div>
            <div class="card-footer bg-transparent border-success">This is the part where you sell yourself to your potential employers</div>
          </div>
        </div>
        <div class="col-md-4 card1 ">
            <div class="card border-success mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent border-success text-success">DISCOVER AND CONNECT</div>
                <div class="card-body text-success">
                  <h5 class="card-title">SCOUTING</h5>
                  <p class="card-text">This is where scouts search for and connect with players whose profile has been appealing to them. SCouts can get through to players who they think they woild like to work with.</p>
                </div>
                <div class="card-footer bg-transparent border-success">This is the beginning of your journey to greatness.</div>
              </div>
        </div>
    </div>
    <div class="row beforefooter2">
        <div class="col-md-4 card1">
            <div class="card border-success mb-3" style="max-width: 18rem;">
            <div class="card-header bg-transparent border-success text-success">EEMPOWERMENT AND ELEVATION</div>
            <div class="card-body text-success">
              <h5 class="card-title">THE BRIDGE BUILDER</h5>
              <p class="card-text">Here at SoccerScoutAfrica,we are majorly focused on using our platformto empower grassroot talents and get them across to the global sporting market where their careers will change for better.</p>
            </div>
            <div class="card-footer bg-transparent border-success">We bring hope to the common man.</div>
          </div>
        </div>
        <div class="col-md-4 card1">
            <div class="card border-success mb-3" style="max-width: 18rem;">
            <div class="card-header bg-transparent border-success text-success">PROVIDING EMPLOYMENT</div>
            <div class="card-body text-success">
              <h5 class="card-title">THE MAIN GOAL</h5>
              <p class="card-text">At the end of the day our system basically works to provide employment to millions of talented footballers in the Africa .</p>
            </div>
            <div class="card-footer bg-transparent border-success">Through our well built platform,we achieve our utmost goal which is providing employment opportunities to millions of talents out there.</div>
          </div>
        </div>
    </div>

    <?php
  require_once "partials/footer.php";
    ?>
    