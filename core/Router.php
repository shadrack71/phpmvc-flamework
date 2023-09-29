<?php 

namespace app\core;

use app\core\Response;

class Router {


    protected array $routes = [];
    protected Request $request;
    private Response $response;

    public function __construct (Request $request){
        $this-> request = $request;
        $this-> response  = new Response();

        
    }


    public function get($path,$callback){

        $this -> routes['get'][$path] = $callback;
        

    
    }

      public function post($path,$callback){

      $this -> routes['post'][$path] = $callback;
        
    
    }

    public function resolve(){
      $path =    $this-> request->getPath();
      $method =    $this-> request->getMethod();
      $callback = $this -> routes[$method][$path] ?? false;



      // switch ($callback) {
      //   case  false :
      //     Response::setStatusCode(404);
         
      //     return  $this ->renderContent($this->renderViewOnly('_404'));
          

      //   case is_string($callback):

      //     return $this->renderView($callback);

  
      //   case is_callable($callback):

      //       $callback[0] = new $callback[0];
        
      //       return  call_user_func($callback);


      // //  default:

      // }
      
      
      
      if($callback === false){

        Response::setStatusCode(404);

        return  $this ->renderContent($this->renderViewOnly('_404'));
        

      }


      if(is_string($callback)){
        return $this->renderView($callback);
      }else {

        $callback[0] = new $callback[0];
        
        return  call_user_func($callback);
      }
        
    }

    public function renderView($view , $params = []){

      $layoutContent = $this->layoutContent();
      $viewContent = $this->renderViewOnly($view,$params);

      return str_replace("{{content}}", $viewContent , $layoutContent);
      

    }


    public function renderContent($contentView){

      $layoutContent = $this->layoutContent();
      
      return str_replace("{{content}}", $contentView , $layoutContent);
      

    }

    protected  function layoutContent(){

      $layout = Application::$app->getLayout();

      ob_start();

      require_once Application::$ROOT_DIR."/views/layout/$layout.php";

      return ob_get_clean();



    }
    protected function renderViewOnly($view,$params =[]){


      foreach($params as $key => $value){

        $$key = $value;
      }

      ob_start();

      require_once Application::$ROOT_DIR."/views/$view.php";

      return ob_get_clean();

    }

    





}