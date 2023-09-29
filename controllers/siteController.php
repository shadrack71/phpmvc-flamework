<?php

namespace app\Controllers;



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