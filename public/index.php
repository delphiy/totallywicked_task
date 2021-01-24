<?php
require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * If we used laravel in task, it would have better router management
 */

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router();

$router->add('', ['controller' => 'HomeController', 'action' => 'index']);
$router->add('character/{id:\d+}', ['controller' => 'CharacterController', 'action' => 'index']);
$router->dispatch($_SERVER['QUERY_STRING']);