 
     <?php
  
  require_once "Db.php";
   class Position extends Db
   {

      private $dbconn;

  public function __construct(){
      $this->dbconn = $this->connect();
  }

  public function fetch_all_positions(){
      $sql = "SELECT * FROM positions ";
      $prep = $this->dbconn->prepare($sql);
      $prep->execute();
      $positions = $prep->fetchAll(PDO::FETCH_ASSOC);
      return $positions;
     
  }


}