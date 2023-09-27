<?php

namespace app\core;


class Response {

public static function setStatusCode(int $status){
    
     http_response_code($status);

}

}