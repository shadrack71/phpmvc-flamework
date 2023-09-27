<?php
require_once __DIR__.'/../vendor/autoload.php';

use app\core\application;

$app = new Application(dirname(__DIR__));

$app -> router->get('/',function(){
    return " hello world";


});


$app -> router->get('/',function(){
    return " hello world";


});$app -> router->get('/contact','contact');



$app-> run();