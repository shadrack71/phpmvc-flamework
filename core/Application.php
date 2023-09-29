<?php

namespace app\core;

class Application{

public static $ROOT_DIR;

public $layout = "main";

public Router $router;
public Request $request;

public  Response $response;

public static Application $app;

public function __construct($root_dir){
    
    self::$ROOT_DIR = $root_dir;
    self::$app = $this;
    $this-> request = new Request();
    $this-> response  = new Response();
    $this-> router = new Router($this->request);

}


public function setterLayout($layout){

    $this->layout = $layout;

}
public function getLayout(){

  return $this->layout;
  
}




public function run (){

  echo   $this -> router -> resolve();

}



}