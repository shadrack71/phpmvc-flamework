<?php
namespace app\core\form;

use app\core\field\Field;
use App\Model;


class Form {

public static function begin($action, $method){


    echo  sprintf( '<form method="%s" action="%s" >', $action , $method);


    return new Form();



}



public static function end(){

 echo  '</form >';

}

public function field(Model $modal,$attribute)
{
    
    return new Field($modal, $attribute);


}






}