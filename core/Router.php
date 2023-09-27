<?php 

namespace app\core;

class Router {


    protected array $routes = [];
    protected Request $request;



    public function __construct (Request $request){
        $this-> request = $request;

        
    }


    public function get($path,$callback){

        $this -> routes['get'][$path] = $callback;
        

    
    }

    public function resolve(){
      $path =    $this-> request->getPath();
      $method =    $this-> request->getMethod();
      $callback = $this -> routes[$method][$path] ?? false;
      if($callback === false){
        return  'Not Found';
        

      }
      if(is_string($callback)){
        return $this->renderView($callback);
      }else{


        return  call_user_func($callback);
      }



        // var_dump($_SERVER);
        
    }

    public function renderView($view){

      $viewContent = $this->renderViewOnly($view);
      $layoutContent = $this->layoutContent();

      return str_replace('{{*content*}}', $viewContent , $layoutContent);
      

    }

    protected  function layoutContent(){

      ob_clean();

      include_once Application::$ROOT_DIR."/views/layout/main.php";

      return ob_get_clean();



    }
    protected function renderViewOnly($view){

      ob_clean();

      include_once Application::$ROOT_DIR."/views/$view.php";

      return ob_get_clean();

    }





}