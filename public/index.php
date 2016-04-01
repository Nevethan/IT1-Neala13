<?php
use App\Kernel\Autoloader;
use App\Kernel\Container;
use App\Kernel\Router;

/******************
*  Configuration  *
******************/

// Enable all error levels
error_reporting(-1);
// Output all errors to the browser (should only be used in development)
ini_set('display_errors', 1);

// Define some global constants
define('VIEW_DIR', realpath(__DIR__ . '/../views'));
define('CONTROLLER_DIR', realpath(__DIR__ . '/../App/Controller'));
define('MODEL_DIR', realpath(__DIR__ . '/../App/Model'));


/*******************
*  Initialization  *
*******************/

// Handles the PHPSESSID cookie and populates the $_SESSION array with the users data
session_start();

// This is the only require in the project
require __DIR__ . '/../App/Kernel/Autoloader.php';

// Initialize and configure the autoloader
$loader = new Autoloader();
$loader->addNamespace('App', __DIR__ . '/../App');
$loader->register();

// Initialize and configure the dependency injection container
$container = new Container();


$router = new Router();
$router->addRoute('GET', '/', ['App\\Controller\\LoginController', 'showPage']);
$router->addRoute('POST', '/login',['App\\Controller\\LoginController', 'invoke']);
$router->addRoute('POST','/gallery', ['App\\Controller\\LoginController', 'invoke']);
$router->addRoute('GET', '/userform',['App\\Controller\\AddUserController', 'showPage']);
$router->addRoute('POST', '/',['App\\Controller\\AddUserController', 'invoke']);

// Convert i.e. "/foo%40bar?id=1" to "/foo@bar"
$uri = rawurldecode(parse_url(filter_input(INPUT_SERVER, 'REQUEST_URI'), PHP_URL_PATH));
$route = $router->match(filter_input(INPUT_SERVER, 'REQUEST_METHOD'), $uri);

if ($route === null) {
    $route = [
        'handle' => ['App\\Controller\\ErrorController', 'error404'],
        'arguments' => []
    ];
}

$controller = $container->create($route['handle'][0]);
$container->call([$controller, $route['handle'][1]], $route['arguments']);
