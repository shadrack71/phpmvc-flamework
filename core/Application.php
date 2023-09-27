<?php

namespace app\core;

class Application{

public static $ROOT_DIR;

public Router $router;
public Request $request;
// public Router $router;

public function __construct($root_dir){
    
    self::$ROOT_DIR = $root_dir;


    $this-> request = new Request();
    
    $this-> router = new Router($this->request);


}




public function run (){

  echo   $this -> router -> resolve();

}



}