<?php


namespace app\core;



trait Validation {

    public $formData = [];


    public  const RULE_EMAIL = 'email';
    public  const RULE_MIN = 'min';
    public  const RULE_MAX = 'max';
    public  const RULE_MATCH = 'match';


    public function rule():array {

        return [
        

        'name' => [self::RULE_MIN, [6]],
        'email' => [self::RULE_EMAIL],
        'company' => [self::RULE_MAX,[6]],
        'password' => [self::RULE_MIN,[6]]
        

        ];


    }


    public function validateBody($arraybody){

        foreach($arraybody as $key => $value){
            if(empty($value)){
                $this -> formData[$key]['errormsg'] = "$key field required";
                
            }
            
            // else {
            //     $rule = $this -> rule();
            //     $ruleAtrrtibute = $rule[$key];
                
            //     foreach($ruleAtrrtibute as  $value) {
            //         $tempFormapp = $arraybody[$key];
            //         $tempFormRule =  $ruleAtrrtibute[0];
                    
            //         $tempFormRuleLimit = $ruleAtrrtibute[1];

            //         // if()



            //         var_dump( json_encode($tempFormapp));


            //     }


            // }
            /*
            TO-Do

            adding more rule on validations and filtering the data
        
            
            */

            
        }
       

        if(!empty($this -> formData) ){

            $this -> formData["error"] = true;
            $this -> formData["oldBody"] = $arraybody;
            return $this -> formData;


        }else{
            $this -> formData["error"] = false;
            $this -> formData["body"] = $arraybody;
            
            return $this -> formData;

        }

    }




}