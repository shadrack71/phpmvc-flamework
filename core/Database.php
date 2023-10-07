<?php 
namespace app\core;

class Database{ 

    public \PDO $pdo;


    public function __construct(array $config){
        $dns = $config['dsn'];
        $user = $config['user'];
        $password = $config['password'];
       

        try {

            $this-> pdo = new \PDO ($dns,$user,$password);

            $this-> pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            
        }catch(\PDOException $e){
            echo "Error connecting".$e -> getMessage();

        }


    }

    public function applyMigrationS(){
        
        $this->createMigrationTable();
        $appliedMigrations =  $this -> getAppliedMigrations();
        $newMigration = [];

        $files = scandir(Application::$ROOT_DIR.'/migrations') ;
        $toApplyMigrations = array_diff($files,  $appliedMigrations);
        foreach ($toApplyMigrations as $migration){
            if($migration =='.' || $migration == '..'){
                continue;

            }

            require_once Application::$ROOT_DIR.'/migrations/'.$migration;
            $classname = pathinfo($migration , PATHINFO_FILENAME);
            $migration_instance =   new $classname;
            $migration_instance -> up();
            $newMigration = $migration;
          
            
            // var_dump($classname);


        }
        
    }


     public function createMigrationTable(){

        $this -> pdo -> exec("
        CREATE TABLE IF NOT EXISTS  migrations(
            id INT AUTO_INCREMENT PRIMARY KEY ,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )ENGINE= InnoDB;
          
        ");

    }
    public function getAppliedMigrations(){

       $stmt =  $this->pdo->prepare("SELECT migration FROM migrations");
       $stmt->execute();
      return  $stmt ->fetchAll(\PDO::FETCH_COLUMN);


    }




}