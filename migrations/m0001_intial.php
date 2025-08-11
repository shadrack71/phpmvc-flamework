<?php

use app\core\Application;

class m0001_intial{

    public function up(){
        $DB= Application::$app->DB;
        $sql = "CREATE TABLE users(
                id INT AUTO_INCREMENT  PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                status TINYINT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )ENGINE = InnoDB;";

        $DB ->pdo->exec($sql
            );

    }


     public function down(){


         $DB= Application::$app->DB;
        $sql = "CREATE TABLE users";

        $DB ->pdo->exec($sql
            );

        
    }





}
