<?php 


namespace app\core\DbModal;

class DataBind {


    protected $firstname ;
    protected $lastname  ;
    protected $email ;
    protected $password  ;

    protected $status = 0;

    protected $loginemail ;
    protected $loginpassword  ;

   

    public function BindRegisterUserData(array $data){
        $this->firstname = $data['body']['firstname'];
        $this->lastname  = $data['body']['lastname'];
        $this->email =  $data['body']['email'];
        $this->password  = $data['body']['password'];


    }

     public function BindLoginUserData(array $logindata){

        $this->email = $logindata['body']['email'];
        $this->password  = $logindata['body']['password'];
          
    }
    




}