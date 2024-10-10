<?php
require_once "classes/Position.php";



$pos = new Position;
$position = $pos->fetch_all_positions();

require_once "partials/header.php";
?>
<div class="container-fluid">

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
      <!-- <li>
        <a href="view_all_players.php" class="nav-link link-body-emphasis">
            <i class="fa fa-edit"></i>
          View Players
        </a> -->
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

<div class="col-md-6">
             <div class="row mt-5">
             <h1>Search Players by Position</h1>
             <!-- <label for="position">Select Position:</label> -->
             </div>
                <div class="row d-flex">
                    <form id="search_position" >
                <div class="col-md-6">
                  <select class="form-select border-success" name="position" id="position">
                        <option value="">Select position </option>
                        <?php 
                        foreach($position as $pos){
                        ?>
                            <option value="<?php echo $pos['position_id']?>"><?php echo $pos['position_name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                  </div>
                    <div class="col-md-3">
                    <button type="submit" class="btn btn-success" >Search</button>
                    </div>
                    
                    </form>
                    </div>
                  </div>

                  
</div>

<div class="col-md-12" id="ajaxsearch">

</div>
</div>
                    </div>


         
<?php
  require_once "partials/footer.php";
    ?>
