<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH .'Core/functions.php';

spl_autoload_register(function ($class){

    str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});



require base_path('bootstrap.php');


$router = new \Core\Router();

$routes = require base_path("routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


// $method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUESTED_METHOD'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);



