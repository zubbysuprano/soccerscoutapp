<?php 

require_once "Db.php";
class Player extends Db
{

    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }

    public function player_signup($firstname,$lastname,$dob,$email,$phone,$gender,$country,$pass1){
        $sql = "INSERT INTO players (player_firstname,player_lastname,player_dob,player_email,player_phone,player_gender,player_countryid,player_password) VALUES(?,?,?,?,?,?,?,?)";
        $stmt = $this->dbconn->prepare($sql);
        $hashed = password_hash($pass1,PASSWORD_DEFAULT);
        $stmt->execute([$firstname,$lastname,$dob,$email,$phone,$gender,$country,$hashed]);
        $id = $this->dbconn->lastInsertId();
        return $id;
        }

        public function get_player_byid($id){
            $sql = "SELECT * FROM players WHERE player_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        public function search_by_posid($position_search) {
            
                $sql = "SELECT * FROM players WHERE position_id = ?";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$position_search]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
           
        }
        
        

      

        
    public function check_email($player_email){
        $sql = "SELECT * FROM players WHERE player_email = ?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$player_email]);
        $result = $stmt->rowCount();
        return $result;

    }
    
     public function player_login($player_email,$player_password){
       
       try{
        $sql = "SELECT * FROM players WHERE player_email = ? LIMIT 1";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$player_email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
                $hashed_password = $result['player_password'];
                $check = password_verify($player_password,$hashed_password);
        
        if($check){
                    return $result['player_id'];
        }else{
                    $_SESSION['errormsg'] = "Invalid password";
                    return 0;  
        }
        }else{//the email does not exist
                $_SESSION['errormsg'] = "Invalid email";
                return 0;
        }
       }catch(PDOException $e){
        $_SESSION["errormsg"] = $e->getMessage();
        return 0;
        }catch(Exception $e){
        $_SESSION["errormsg"] = $e->getMessage();
        return 0;
         }
    }

    public function update_player($player_fname,$player_lname,$player_phone,$player_clubstatus,$player_profilepic,$player_bio,$player_position){

        if($player_profilepic['name'] !=''){
            
            $temp = $player_profilepic['tmp_name'];
            $type = $player_profilepic['type'];
            $size = $player_profilepic['size'];
            $allowed = ['png','jpg','jpeg'];
            $profilepic_name = $player_profilepic['name'];
            $to = "../uploads/$profilepic_name";

            $extension = explode('.',$profilepic_name);
            $extension = end($extension);
            //$newname = rand().time()."$extension

            if(!in_array($extension,$allowed)){
                $_SESSION['errormsg'] = "Please upload either of png,jpg,jpeg";
                return 0;
            }else{
                move_uploaded_file($temp,$to);
                $sql = "UPDATE players SET player_firstname=?,player_lastname=?,player_phone=?,	player_clubstatus=?,player_profilepic=?,players_bio=?,position_id=? WHERE player_id = ?";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$player_fname,$player_lname,$player_phone,$player_clubstatus,$profilepic_name,$player_bio,$player_position,$_SESSION['player_id']]);
                $_SESSION['good_msg'] = "File uploaded and records updated";
                return 1;
            }
            }else{
               $sql = "UPDATE players SET player_firstname=?,player_lastname=?,player_phone=?,	player_clubstatus=?,player_profilepic=?,players_bio=?,position_id=? WHERE player_id = ?";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$player_fname,$player_lname,$player_phone,$player_clubstatus,"",$player_bio,$player_position,$_SESSION['player_id']]);
                $_SESSION['good_msg'] = "File uploaded and records updated";
                return 1;

                
            }
    }

    public function player_logout(){
        unset($_SESSION['player_id']);
        session_unset();
        session_unset();
    }


   
}
?>