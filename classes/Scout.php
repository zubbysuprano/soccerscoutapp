<?php 
require_once "Db.php";
class Scout extends Db
{

    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }

    public function scout_signup($firstname,$lastname,$dob,$email,$phone,$pass1){
        $sql = "INSERT INTO scouts (scout_firstname,scout_lastname,scout_dob,scout_email,scout_phone,scout_password) VALUES(?,?,?,?,?,?)";
        $stmt = $this->dbconn->prepare($sql);
        $hashed = password_hash($pass1,PASSWORD_DEFAULT);
        $stmt->execute([$firstname,$lastname,$dob,$email,$phone,$hashed]);
        $id = $this->dbconn->lastInsertId();
        return $id;
        }


        public function get_scout_byid($id){
            $sql = "SELECT * FROM scouts WHERE scout_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }


        
    public function check_email($scout_email){
        $sql = "SELECT * FROM scouts WHERE scout_email = ?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$scout_email]);
        $result = $stmt->rowCount();
        return $result;

    }
    
     public function scout_login($scout_email,$scout_password){
       try{
        $sql = "SELECT * FROM scouts WHERE scout_email = ? LIMIT 1";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$scout_email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
                $hashed_password = $result['scout_password'];
                $check = password_verify($scout_password,$hashed_password);
        
        if($check){
                    return $result['scout_id'];
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

    public function scout_logout(){
        unset($_SESSION['scout_id']);
        session_unset();
        session_unset();
    }

   
}
?>