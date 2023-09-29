<?php


namespace app\Controllers;

use app\core\Request;
use app\core\Response;
use app\core\Application;

class Controller{

   
    protected  Request $request;

    protected  Response $response;
    protected  static SiteController $sitecontroller;

    public function __construct(){

        $this->  request = new Request();
         $this-> response  = new Response();
        // self::$sitecontroller  = new SiteController();
        

    }


    public  static function render($view, $params = []){

       return Application::$app -> router-> renderView($view, $params);

    }

    public function setLayout($layout){

    Application::$app->setterLayout($layout);
}



}