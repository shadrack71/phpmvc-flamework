<?php

use app\controllers\AuthController;
use app\Controllers\SiteController;
use app\core\application;

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();




$config = [

    'DB' => [
        'dsn' => $_ENV["DB_DSN"],
        'user' => $_ENV["DB_USER"],
        'password' => $_ENV["DB_PASSWORD"]
    ]
];

$app = new Application(dirname(__DIR__),$config);

$app -> router->get('/', [SiteController::class, 'contactView']);
$app -> router->post('/contact', [SiteController::class, 'contactController']);

$app -> router->get('/login', [AuthController::class, 'login']);
$app -> router->post('/login', [AuthController::class, 'loginStore']);

$app -> router->get('/register', [AuthController::class, 'register']);
$app -> router->post('/register', [AuthController::class, 'registerStore']);














// $app -> router->get('/contact','contact');
// $app -> router->get('/contactxx', [SiteController::class, 'contactController']);





$app-> run();