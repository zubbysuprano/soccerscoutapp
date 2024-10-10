<?php 
session_start();
require_once "../classes/Uploader.php";

$up = new Uploader();
if(isset($_POST["btnmyvid"])){



    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

  
    if( $_FILES["myvideos"]["error"]){
        $_SESSION['errormsg'] = "Please upload a video";
        header("location:../player_dashboard.php");
        exit();
        
    }else{
       $myvid_data = $up->validate_upload_video($_FILES);
        $_SESSION['good_msg'] = "Video Uploaded successfully";
        header("location:../player_dashboard.php");
        exit();
    }

   

    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";
    // die();
    
}else{
    $_SESSION['errormsg'] = "Pls choose a video file and click the 'upload video' button";
    header("location:../player_dashboard.php");
    exit();
}

?>