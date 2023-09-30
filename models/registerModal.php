<?php 



namespace app\models;

use app\core\Model;

class RegisterModal extends Model {

    

    public function __construct(){
        new Model();
 
    }


    public function storeData(array $validateData){
        $userName = $validateData['body']['name'];
        $userCompnay = $validateData['body']['company'];
        $userEmail = $validateData['body']['email'];
        $userPassword = $validateData['body']['password'];
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
        $userCreatedDate = date("Y-m-d");
    
        $this ->setUserAttribute($userName,$userCompnay,$userEmail,$hashedPassword,$userCreatedDate);

        



    }






}