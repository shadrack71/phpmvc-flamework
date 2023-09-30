<?php


namespace app\core;

class Model {

    private $host = 'localhost';
    private $user = 'root';
    private $db_name = 'phpmvcframework';
    private $pass = '';
    protected $table ;
    private $conn;

    // register properties 

    protected $userFname ;
    protected $userCompany;
    protected $userEmail;
    protected $userhashPassword;
    protected $userCreatedDate;


    public function __construct(){
        $this -> conn = $this -> connect();

    }

    private function connect(){

       $this-> conn = null;
        $dns = "mysql:host=".$this->host.";dbname=".$this->db_name;
        try{
            $pdo = new \PDO($dns, $this->user,$this ->pass);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            
        }catch(\PDOException $e){
            echo "Error connecting".$e -> getMessage();

        }
        
        return $pdo;



    }


    public function setUserAttribute($userName,$userCompnay,$userEmail,$hashedPassword,$userCreatedDate){
        $this ->userFname = $userName;
        $this ->userCompany = $userCompnay;
        $this ->userEmail = $userEmail;
        $this ->userhashPassword = $hashedPassword;
        $this ->userCreatedDate = $userCreatedDate;
        $this ->userFname = $userName;
   
    }




    




    




    




}