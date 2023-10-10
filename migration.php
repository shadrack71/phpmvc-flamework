<?php


use app\core\application;

require_once __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();




$config = [

    'DB' => [
        'dsn' => $_ENV["DB_DSN"],
        'user' => $_ENV["DB_USER"],
        'password' => $_ENV["DB_PASSWORD"]
    ]
];

$app = new Application(__DIR__,$config);






$app->DB->applyMigrationS();