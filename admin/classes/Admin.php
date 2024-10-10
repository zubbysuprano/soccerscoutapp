 
     <?php
    
    require_once "Db.php";
     class Admin extends Db
     {

        private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }

    public function get_admin_byid($id){
        $sql = "SELECT * FROM admins WHERE admin_id = ?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function fetch_all_players(){
        $sql = "SELECT * FROM players";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function fetch_all_scouts(){
        $sql = "SELECT * FROM scouts";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

  
     public function admin_login($admin_username,$admin_password){
        $sql = "SELECT * FROM admins WHERE admin_username = ? LIMIT 1";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$admin_username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $username = $result['admin_username'];
        $pass = $result['admin_password'];
        
        if($username != $admin_username){
            $_SESSION['errormsg'] = "Invalid username";
        }
        elseif($pass != $admin_password){
            $_SESSION['errormsg'] = "Invalid password";
                
        }else{
                return $result['admin_id'];
             }
    
    
}

public function admin_logout(){
    unset($_SESSION['admin_id']);
    session_unset();
    session_unset();
}
     }
    ?>
