<?php
require_once __DIR__.'/../vendor/autoload.php';

use app\core\application;

$app = new Application();

$app -> router->get('/',function(){
    return " hello world";


});

$app-> run();