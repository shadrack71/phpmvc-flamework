<?php 

namespace app\core;

class Session {
protected const FLASH_KEY = 'flash_messages';
public  string $uName = "";



public function __construct(){

    session_start();
    $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
    foreach($flashMessages as $key => &$flashMessage){

        $flashMessage['remove'] = true;

    }
    
    $_SESSION[self::FLASH_KEY] = $flashMessages;


}

public function setSession($userId,$userEmail,$userName){
    $this -> uName = $userName;
    $_SESSION["userSession"][$userId] = [
        "userId"=> $userId,
        "userEmail" => $userEmail 
    ];


}

public function  getUserSession($userId):array{

    return $_SESSION ["userSession"][$userId];

}
// public function  remevoUserSession($userId){

//     unset ($this -> getUSerSession($userId));
    
// }



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