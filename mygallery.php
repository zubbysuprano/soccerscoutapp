<?php 
session_start();
require_once "player_guard.php";
require_once "classes/Uploader.php";

$up = new Uploader;
$mypic_data = $up->fetch_all_pictures_byid($_SESSION['player_id']);
$myvid_data = $up->fetch_all_videos_byid($_SESSION['player_id']);
// echo "<pre>";
// print_r($mypic_data);
// echo "</pre>";
// die();

if(isset($_SESSION['player_id'])){
    $_SESSION['player_id'];  
}

require_once "partials/header.php";
?> 


      
   <div class="row d-flex justify-content-between">
    
   <?php 
    foreach($mypic_data as $value){
    ?>

    <div class="col-md-3 mx-auto">
    <div class="shadow p-1 mb-5 mt-3 bg-body rounded">
     <img src="uploads/mypictures/<?php echo $value['picture_file'];?>" alt="profile" width="300" height="200"> 
    </div>
    <div><p class="text-center"><?php echo $value['picture_desc'];?></p></div>
    </div>

    <?php 
   
    }
    ?>
    
    <?php 
foreach($myvid_data as $vid){
?>

<!-- <div class="col-md-3 mx-auto">
    <div class="shadow p-1 mb-5 mt-3 bg-body rounded">
        <video width="300" height="200" controls autoplay>
            <source src="uploads/myvideos/<?php// echo htmlspecialchars($vid['video_file']); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div> -->
<div class="col-md-3 mx-auto">
    <div class="shadow p-1 mb-5 mt-3 bg-body rounded">
        <video width="300" height="200" controls autoplay muted aria-label="Video description">
            <source src="uploads/myvideos/<?php echo htmlspecialchars($vid['video_file']); ?>" type="video/mp4">
            Your browser does not support the video tag. Please use a modern browser.
        </video>
    </div>
</div>


<?php 
}
?>

    </div>

</div>

<?php
  require_once "partials/footer.php";
    ?>
    

