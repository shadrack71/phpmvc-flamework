<?php

namespace app\controllers;

use app\models\User;
use app\core\Application;
use app\core\DbModal\DataBind;
use app\core\DbModal\LoginBind;
use app\core\DbModal\SignUpBind;






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

    $requestLoginData = $this ->validateBody($this ->request->getBoby());
    if (!$requestLoginData['error']){
        $loginUser = new User();
        $loginUser -> BindLoginUserData($requestLoginData);
        $authResultArray  =   $loginUser -> userLogin();
        
         if($authResultArray['status'] == "success"){
        //     var_dump( $authResultArray);
        // exit;
            Application::$app->session->setFlashMessages('success',"Successfully login");
            Application::$app->response->redirect("/");

         } else{
             return  self::render("login", $authResultArray);
                // var_dump( $authResultArray);
         }

}else{

   return  self::render("login", $requestLoginData);
    
    }

}

public function registerStore(){

$requestData = $this ->validateBody($this ->request->getBoby());

if (!$requestData['error']){

    
    $registerUser = new User() ;
    $registerUser -> BindRegisterUserData($requestData);

    
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