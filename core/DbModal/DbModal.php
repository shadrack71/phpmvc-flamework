<?php 


namespace app\core\DbModal;

use app\core\Application;
use \app\core\DbModal\DataBind;



abstract class DbModal extends DataBind  {
    

    abstract public function getTableName (): string;
    abstract public function getAttribute (): array;

public function save()  {

    $tableName = $this->getTableName();
    $attributes = $this->getAttribute();
    $params = array_map(fn($attr)=> ":$attr", $attributes);
    $sqlScript =  "INSERT INTO $tableName (".implode(',',$attributes).") 
        VALUES (". implode(',',$params).")";
    $stmt = self::prepare($sqlScript);
    foreach($attributes as $attr){
        $stmt -> bindValue(":$attr", $this ->{$attr});

    }

    if($stmt -> execute()){
        return true;
    }

    

    
    


    
}


public static  function prepare($sqlStmt){

    return Application::$app->DB->pdo->prepare($sqlStmt);





}





}