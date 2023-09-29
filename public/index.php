<?php
require_once __DIR__.'/../vendor/autoload.php';

use app\controllers\AuthController;
use app\Controllers\SiteController;
use app\core\application;

$app = new Application(dirname(__DIR__));

$app -> router->get('/', [SiteController::class, 'contactView']);
$app -> router->post('/contact', [SiteController::class, 'contactController']);

$app -> router->get('/login', [AuthController::class, 'login']);
$app -> router->post('/login', [AuthController::class, 'loginStore']);

$app -> router->get('/register', [AuthController::class, 'register']);
$app -> router->post('/register', [AuthController::class, 'registerStore']);














// $app -> router->get('/contact','contact');
// $app -> router->get('/contactxx', [SiteController::class, 'contactController']);




$app-> run();