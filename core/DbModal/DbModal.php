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



  public function userLogin(){

    $UserEmail = $this-> email;
    $UserPassword = $this-> password;
    $user = $this->findOne($this -> email);
    $userDbEmail =  $user["email"];
    $EmailVerifyResp = $this-> VerifyEmail($userDbEmail,$UserEmail);
    if($EmailVerifyResp){
        $userId =  $user["id"];
        $userName =  $user["firstname"];
        $userDbHashPass =  $user["password"];
        $passVerifyResp = $this-> PassVerify($UserPassword,$userDbHashPass);
            if($passVerifyResp){
                Application::$app->session->setSession($userId, $userDbEmail,$userName);
                
                 return [
                    "status"=> "success"
                ];

             }else{
                return [
                    "status"=> "error",
                    "msg"=> " Incorrent  email/ password try again "
                ];

                
             }

            }else{

                return [
                    "status"=> "error",
                    "msg"=> " The email provided doesnt exist in the system"



                ];



            }
    


   
    



    }


    private function PassVerify($userPass, $userHashPass):bool {

        if(password_verify($userPass,$userHashPass)){
            return true;

        }else{
            return false;


        }



    }

    private function VerifyEmail($userEmail, $userDbEmail):bool {

        if ($userEmail === $userDbEmail){
            return true;

        }else{


            return false;
        }



    }


public static  function prepare($sqlStmt){

    return Application::$app->DB->pdo->prepare($sqlStmt);

}



public function findOne($email){
    $tableName = $this->getTableName();

    $sql = "SELECT * FROM $tableName WHERE  email = :email";
    $stmt = self::prepare($sql);
    $stmt->bindValue(":email", $email);


    if( $stmt -> execute()){
        
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }else{
        return "no-user-found";



    }


    

    
}





}