<?php 

namespace app\core;

class Session {
protected const FLASH_KEY = 'flash_messages';

public function __construct(){

    session_start();
    $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
    foreach($flashMessages as $key => &$flashMessage){

        $flashMessage['remove'] = true;

    }
    
    $_SESSION[self::FLASH_KEY] = $flashMessages;


}


public function setFlashMessages($key,$flashmsg){
   $_SESSION[self::FLASH_KEY][$key] = [

     'remove'=> false,
     'value'=>$flashmsg

   ];


}

public function getFlashMessages($key){

  return  $_SESSION[self::FLASH_KEY][$key]['value'];


}


public function __destruct(){

    $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
    foreach($flashMessages as $key => &$flashMessage){
        if($flashMessage['remove']){
            unset($flashMessages[$key]);

        }
    }
    $_SESSION[self::FLASH_KEY] = $flashMessages;
}






}