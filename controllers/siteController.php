<?php

namespace app\Controllers;

use app\core\Request as request;

class SiteController extends Controller{


    public  function contactView(){

        
        $param =[
            'name' => 'attaboy'


        ];

        return self::render('contact');



    }

    public function contactController(){
        
        $contactBody =  $this -> request ->getBoby();

        var_dump($contactBody);
        
    }





}