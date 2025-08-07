<?php 

namespace app\models;
use app\core\DbModal\DbModal;
class User extends DbModal{

    protected static $tableattributes = [ 'email', 'password','firstname', 'lastname',  'status'];

    public function getTableName(): string {
        return 'users';

    }

      public function getAttribute(): array {
        return self::$tableattributes;

    }


    public function save(){
        $this ->password = password_hash($this->password,PASSWORD_DEFAULT);
        return parent::save();
    }

    

  




}
