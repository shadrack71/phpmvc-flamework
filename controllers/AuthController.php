<?php

namespace app\controllers;
use app\models\RegisterModal;



class AuthController extends controller {
    
    use \app\core\Validation;

protected $layout = "auth";
public $requestData;
protected $registerModal;

public function __construct(){
    parent::__construct();

    $this -> setLayout( $this->layout);

   $this -> registerModal =  new RegisterModal();
   


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
    $this -> registerModal;

    echo "data saved";
    //var_dump($requestData );


}else{

   return  self::render("register", $requestData);

    
    //var_dump($requestData );

    
}

    
    
    


    
    

    // var_dump($requestData );
}


}