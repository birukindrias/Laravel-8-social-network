<?php

use App\core\App;

include_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$config = ['user' => \App\models\users::class,
    'db' => [
        'dsn' => $_ENV['DB_HOST'],
        'user' => $_ENV['DB_USER'],
        'pass' => $_ENV['DB_PASS'],
    ],
];
$App = new App(__DIR__, $config);

$App->db->applieMigration();
