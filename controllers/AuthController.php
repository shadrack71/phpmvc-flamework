<?php

namespace app\controllers;



class AuthController extends controller {
    use \app\core\Validation;

protected $layout = "auth";
public $requestData;

public function __construct(){
    parent::__construct();

    $this -> setLayout( $this->layout) ;
   


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

 $this -> requestData =   $this -> validateBody($this ->request->getBoby());
    
    
    


    
    

    var_dump($this -> requestData );
}


}