 
     <?php
  
    require_once "Db.php";
     class Country extends Db
     {

        private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }

    public function fetch_all_country(){
        $sql = "SELECT * FROM country ";
        $prep = $this->dbconn->prepare($sql);
        $prep->execute();
        $country = $prep->fetchAll(PDO::FETCH_ASSOC);
        return $country;
       
    }

  
}

// $c = new Country;
// $country = $c->fetch_all_country();
// echo "<pre>";
// print_r($country);
// echo "</pre>";
    ?>
