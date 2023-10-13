<?php

namespace app\core;

use app\core\Database;
use app\core\DbModal\DataBind;

class Application{

public static $ROOT_DIR;

public $layout = "main";

public Router $router;
public Database $DB;
public Request $request;

public  Response $response;
public  Session $session;
// public  DataBind $dataBind;

public static Application $app;

public function __construct($root_dir, array $config){
    
    self::$ROOT_DIR = $root_dir;
    self::$app = $this;
    $this-> request = new Request();
    $this-> response  = new Response();
    $this-> router = new Router($this->request);
    $this-> DB  = new Database($config['DB']);
    $this-> session  = new Session();
    

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