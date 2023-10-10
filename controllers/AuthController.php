<?php

namespace app\controllers;

use app\core\Application;
use app\models\User;
use \app\core\DbModal\DataBind;







class AuthController extends controller {
    
    use \app\core\Validation;
    
   

protected $layout = "auth";
public $requestData;
protected $registerUser;

public function __construct(){
    parent::__construct();

    $this -> setLayout( $this->layout);
    

   
   


}




public function login(){

    return  self::render('login');
}

public function register(){

    return  self::render('register');
}





public function loginStore(){

    return  "login store";
}

public function registerStore( ){

$requestData = $this ->validateBody($this ->request->getBoby());

if (!$requestData['error']){

    new DataBind($requestData);
    $registerUser = new User($requestData) ;

    
    if($registerUser -> save()){


        Application::$app->session->setFlashMessages('success',"Successfully registered");
        Application::$app->response->redirect("/");

        


    }
    

    

    


    // // $this -> registerModal;

    // echo $this ->firstname;
    
    // // var_dump($requestData);
    


}else{

    // var_dump($requestData );
   return  self::render("register", $requestData);

    

    
}

    
    
    


    
    

    // var_dump($requestData );
}


}