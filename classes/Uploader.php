<?php 
error_reporting(E_ALL);
require_once "Db.php";

class Uploader extends Db
{
    private $dbconn;

    public function __construct(){
        $this->dbconn=$this->connect();
    }

    public function validate_upload_picture(){
        $file_name = $_FILES["mypictures"]["name"]; 
        $file_type = $_FILES["mypictures"]["type"]; 
        $file_tmp = $_FILES["mypictures"]["tmp_name"];
        $file_error = $_FILES["mypictures"]["error"]; 
        $file_size = $_FILES["mypictures"]["size"]; 
    
        // Validate file size is too big
        $max_size_allowed = 5 * 1024 * 1024;
        if($file_size > $max_size_allowed){
            return "Your file size is too large. The max is 5MB";
        }
    
        // Validate file format
        $allowed_files_format = ["jpg", "png", "jpeg"];
        $their_own_extention = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        if(!in_array($their_own_extention, $allowed_files_format)){
            return "Please upload image of PNG, JPEG, or JPG format";
        }
        
        // Generate a unique file name
        $unique_file_name = uniqid() . "_" . time() . "." . $their_own_extention;
        
        $final_destination = "../uploads/mypictures/$unique_file_name";
        $final_upload = move_uploaded_file($file_tmp, $final_destination);
    
        // Upload the file and call the method to store in database
        if($final_upload){
            $result = $this->insert_pictures_to_db($unique_file_name, $_SESSION['player_id']);
            if($result){
                return "File uploaded successfully";
            }else{
                unlink($final_destination);
                return "Failed to insert the picture data into the database";
            }
        }else{
            return "Unable to upload picture";
        }
    }
    
    public function validate_upload_video(){
        $file_name = $_FILES["myvideos"]["name"]; 
        $file_type = $_FILES["myvideos"]["type"]; 
        $file_tmp = $_FILES["myvideos"]["tmp_name"];
        $file_error = $_FILES["myvideos"]["error"]; 
        $file_size = $_FILES["myvideos"]["size"]; 
    
        // Validate file size
        $max_size_allowed = 300 * 1024 * 1024;
        if($file_size > $max_size_allowed){
            return "Your file size is too large. The max is 314MB";
        }
    
        // Validate file format
        $allowed_files_format = ["mp4"];
        $their_own_extention = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        if(!in_array($their_own_extention, $allowed_files_format)){
            return "Please upload a video in MP4 format";
        }
        
        // Generate a unique file name
        $unique_file_name = uniqid() . "_" . time() . "." . $their_own_extention;
        
        $final_destination = "../uploads/myvideos/$unique_file_name";
        $final_upload = move_uploaded_file($file_tmp, $final_destination);
    
        // Upload the file and store in the database
        if($final_upload){
            $result = $this->insert_videos_to_db($unique_file_name, $_SESSION['player_id']);
            if($result){
                return "File uploaded successfully";
            }else{
                unlink($final_destination);
                return "Failed to insert video data into the database";
            }
        }else{
            return "Unable to upload video";
        }
    }
    

    // public function validate_upload_picture(){
    //     $file_name = $_FILES["mypictures"]["name"]; 
    //     $file_type = $_FILES["mypictures"]["type"]; 
    //     $file_tmp = $_FILES["mypictures"]["tmp_name"];
    //     $file_error = $_FILES["mypictures"]["error"]; 
    //     $file_size = $_FILES["mypictures"]["size"]; 


     
        
    //     //validate file size is too big
    //     $max_size_allowed = 5 * 1024 * 1024;
    //     if($file_size > $max_size_allowed){
    //         return "Your file size is too large. The max is 5mb";
    //         exit;
    //     }
    
    //     //validate for wrong file format
    //     $allowed_files_format = ["jpg", "png", "jpeg"];
    //     $their_own_extention = pathinfo($file_name, PATHINFO_EXTENSION);
    
    //     if(!in_array($their_own_extention,$allowed_files_format)){
    //         return "Please upload image of png,jpeg or jpg format";
    //         exit;
    //     }
    //     $unique_file_name = $file_name.uniqid().time().".".$their_own_extention;
    //    // echo $unique_file_name;
    
    //     $final_destination = "../uploads/mypictures/$unique_file_name";
    //     $final_upload = move_uploaded_file($file_tmp,$final_destination);

    //     //upload the file and call the method that will take the unique and store in database
       
    //     if($final_upload){
    //        $result = $this->insert_pictures_to_db($unique_file_name,$_SESSION['player_id']);
    //     if($result){
    //         return "File uploaded successfully";
    //        }else{
    //         $res = unlink("../uploads/mypictures/$unique_file_name");
    //         return $res;
    //        }
    //     }else{
    //         return "Unable to upload picture";
    //     }

    // }

    public function insert_pictures_to_db($file_name,$id){
        $sql = "INSERT INTO player_picture (picture_file,player_id) VALUES(?,?)";
        $prep = $this->dbconn->prepare($sql);
        $response = $prep->execute([$file_name,$id]);
        return $response;
    }

    public function fetch_all_pictures_byid($id){
        $sql = "SELECT * FROM player_picture WHERE player_id = ?";
        $prep = $this->dbconn->prepare($sql);
        $prep->execute([$id]);
        $mypictures = $prep->fetchAll(PDO::FETCH_ASSOC);
        return $mypictures;
    }

    
    public function insert_videos_to_db($file_name,$id){
        $sql = "INSERT INTO player_video (video_file,player_id) VALUES(?,?)";
        $prep = $this->dbconn->prepare($sql);
        $response = $prep->execute([$file_name,$id]);
        return $response;
    }

    public function fetch_all_videos_byid($id){
        $sql = "SELECT * FROM player_video WHERE player_id = ?";
        $prep = $this->dbconn->prepare($sql);
        $prep->execute([$id]);
        $mypictures = $prep->fetchAll(PDO::FETCH_ASSOC);
        return $mypictures;
    }

    
    // public function validate_upload_video(){
    //     $file_name = $_FILES["myvideos"]["name"]; 
    //     $file_type = $_FILES["myvideos"]["type"]; 
    //     $file_tmp = $_FILES["myvideos"]["tmp_name"];
    //     $file_error = $_FILES["myvideos"]["error"]; 
    //     $file_size = $_FILES["myvideos"]["size"]; 


     
        
    //     //validate file size is too big
    //     $max_size_allowed = 300 * 1024 * 1024;
    //     if($file_size > $max_size_allowed){
    //         return "Your file size is too large. The max is 314mb";
    //         exit;
    //     }
    
    //     //validate for wrong file format
    //     $allowed_files_format = ["mp4"];
    //     $their_own_extention = pathinfo($file_name, PATHINFO_EXTENSION);
    
    //     if(!in_array($their_own_extention,$allowed_files_format)){
    //         return "Please upload video of mp4 format";
    //         exit;
    //     }
    //     $unique_file_name = $file_name.uniqid().time().".".$their_own_extention;
    //    // echo $unique_file_name;
    
    //     $final_destination = "../uploads/myvideos/$unique_file_name";
    //     $final_upload = move_uploaded_file($file_tmp,$final_destination);

    //     //upload the file and call the method that will take the unique and store in database
       
    //     if($final_upload){
    //        $result = $this->insert_videos_to_db($unique_file_name,$_SESSION['player_id']);
    //     if($result){
    //         return "File uploaded successfully";
    //        }else{
    //         $res = unlink("../uploads/myvideos/$unique_file_name");
    //         return $res;
    //        }
    //     }else{
    //         return "Unable to upload video";
    //     }

    // }

}



?> 