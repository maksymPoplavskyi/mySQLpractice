<?php

require __DIR__ . '/../vendor/autoload.php';

session_start();

//classes
use router\Router;

//autoload
spl_autoload_register('autoload');

function autoload(string $className)
{
    $className = strtolower($className);
    $path = explode('\\', $className);
    $path[count($path) - 1] = ucfirst($path[count($path) - 1]);
    $className = implode('/', $path);

    require_once '../' . $className . '.php';
}

//routes
$uri = explode('?', $_SERVER['REQUEST_URI'])[0];

$router = new Router();
$router->request($uri);