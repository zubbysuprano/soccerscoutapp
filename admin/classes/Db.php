<?php 
require_once "config.php";
class Db
{
    private $dbname = DB_NAME;
    private $dbhost = DB_HOST; 
    private $dbuser = DB_USERNAME;
    private $dbpass = DB_PASSWORD;

    protected $conn;

    public function connect(){
        
         //connection code goes here
         $dsn = "mysql:host=$this->dbhost;dbname=$this->dbname;";
         $option = [
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
         ];
        
        try{
           //$therealconnection 
            $this->conn = new PDO($dsn,$this->dbuser,$this->dbpass,$option);
            return $this->conn;
            // $therealconnection;
        }catch(Exception $e){ //could also be any PDOexception at all
            //return $e->getMessage();
            return false;
        }
    }//end of the connection method

    //a method that inserts a customer into a customer table


}//end of Db class

//  $connection1 = new Db;
// var_dump($connection1->connect());

// $cust = new Db();
// $inserted = $cust->insert_customer("Omosare","Omogbagi", "1190-01-01", "234", "0812345678","united","Lagos");
// if($inserted){
//     echo "Customer Inserted successfully";
// }else{
//     echo "Unable to insert Customer";
// }
// ?>
