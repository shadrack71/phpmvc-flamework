<?php 


namespace app\core\DbModal;

trait  SignUpBind   {


    protected $firstname ;
    protected $lastname  ;
    protected $email ;
    protected $password  ;
 
    protected $status = 0;

   public function __construct(array $data){
        $this->firstname = $data['body']['firstname'];
        $this->lastname  = $data['body']['lastname'];
        $this->email =  $data['body']['email'];
        $this->password  = $data['body']['password'];


   }

  

    
    




}