<?php


namespace app\core;



trait Validation {

    public $formData = [];


    public function validateBody($arraybody){

        foreach($arraybody as $key => $value){

            if(empty($value)){
                $this -> formData[$key]['errormsg'] = "$key field required";
            }
        }
       

        if(!empty($this -> formData) ){

            $this -> formData["error"] = true;
            return $this -> formData;


        }else{
            $this -> formData["error"] = false;
            $this -> formData["body"] = $arraybody;
            return $this -> formData;

        }

    }




}