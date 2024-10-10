<?php 
session_start();
require_once "../classes/Uploader.php";

$up = new Uploader();
if(isset($_POST["btnmypic"])){



    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

  
    if( $_FILES["mypictures"]["error"]){
        $_SESSION['errormsg'] = "Please upload a picture";
        header("location:../player_dashboard.php");
        exit();
        
    }else{
       $mypic_data = $up->validate_upload_picture($_FILES);
        $_SESSION['good_msg'] = "Picture Uploaded successfully";
        header("location:../player_dashboard.php");
        exit();
    }

   

    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";
    // die();
    
}else{
    $_SESSION['errormsg'] = "Pls choose a picture file and click the 'upload picture' button";
    header("location:../player_dashboard.php");
    exit();
}

?>