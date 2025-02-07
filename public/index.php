<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Route.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

$router = new Router();
Route::setRouter($router);

Route::get('/sign_up', ['AuthController', 'showRegister']);
Route::post('/sign_up', ['AuthController', 'Register']);


$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];


if (strpos($uri, '/manager/public') === 0) {
    $uri = substr($uri, strlen('/manager/public'));
}

try {
    $router->dispatch($uri, $method);
} catch (Exception $e) {
    error_log($e->getMessage());
    echo "Routing Error: " . $e->getMessage();
}
