<?php
require_once "classes/Position.php";



$pos = new Position;
$position = $pos->fetch_all_positions();

require_once "partials/header.php";
?>

<div class="col-md-6">
             <div class="row mt-5">
             <h1>Search Players by Position</h1>
             <!-- <label for="position">Select Position:</label> -->
             </div>
                <div class="row">
                    <form action="" id="search">
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
                    <button type="button" class="btn btn-success" >Search</button>
                    </div>
                    </div>
                    </form>
                  </div>

                  
</div>
<div class="row">
<div class="col-md-6" id="ajaxsearch">

</div>
</div>

         
<?php
  require_once "partials/footer.php";
    ?>
