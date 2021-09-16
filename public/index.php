<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="../pages/style.css">

</head>
<body>
    
</body>
</html>
<?php

use App\controller\authController;
use App\controller\chatController;
use App\controller\frindsController;
use App\controller\postController;
use App\controller\ProfileController;
use App\controller\SiteController;
use App\core\App;

// echo '<pre>';
// echo  mysql_info();

include_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'user' => \App\models\users::class,

    'db' => [
        'dsn' => $_ENV['DB_HOST'],
        'user' => $_ENV['DB_USER'],
        'pass' => $_ENV['DB_PASS'],
    ],
];
$App = new App(dirname(__DIR__), $config);
// auth
$App->router->get('/', [SiteController::class, 'home']);
$App->router->get('/auth', [SiteController::class, 'auth']);
$App->router->get('/register', [authController::class, 'register']);
$App->router->post('/register', [authController::class, 'register']);
$App->router->post('/login', [authController::class, 'login']);
$App->router->get('/login', [authController::class, 'login']);
$App->router->get('/logout', [authController::class, 'logout']);
// auth end/
$App->router->get('/search', [siteController::class, 'search']);
$App->router->post('/search', [siteController::class, 'search']);
$App->router->get('/profile', [ProfileController::class, 'profile']);
$App->router->get('/update', [ProfileController::class, 'update']);
$App->router->post('/update', [ProfileController::class, 'update']);
// $App->router->update('/update', [ProfileController::class, 'update']);

$App->router->get('/upload', [ProfileController::class, 'upload']);
$App->router->post('/upload', [ProfileController::class, 'upload']);
$App->router->get('/posts', [postController::class, 'posts']);
$App->router->get('/chat', [chatController::class, 'chat']);
$App->router->post('/chat', [chatController::class, 'chat']);

$App->router->get('/friends', [frindsController::class, 'friends']);
$App->router->get('/friendadded', [frindsController::class, 'addfriend']);

$App->run();
