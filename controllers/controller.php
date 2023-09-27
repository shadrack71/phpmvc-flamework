<?php


namespace app\Controllers;

use app\core\Request;
use app\core\Application;

class Controller{
    protected  Request $request;
    protected  static SiteController $sitecontroller;

    public function __construct(){

        $this->  request = new Request();
        // self::$sitecontroller  = new SiteController();
        

    }


    public  static function render($view, $params = []){

       return Application::$app -> router-> renderView($view, $params);

    }



}