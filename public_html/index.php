<?php

//Import classes
use app\controllers\views;
use app\config\Config;

//Get Composer and custom autoloader and run them
require '../vendor/autoload.php';
require_once '../app/project_autoloader.php';
$autoloader = new app\Autoloader();
spl_autoload_register(array($autoloader, 'handle'));

//Configuration for Slim
$app = new \Slim\App(Config::getConfig());

//Include routes file
require '../app/routesInclude.php';

//Dependency injection via Slim Container
$container = $app->getContainer();

//Render views
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('../app/views/');
};

//Home controller
$container['HomeController'] = function($container) {
    return new views\HomeController($container);
};

//Blog controller
$container['BlogController'] = function($container) {
    return new views\BlogController($container);
};

//Error controller
$container['notFoundHandler'] = function($container) {
    return function ($request, $response, $arguments) use ($container) {
        return  $container->view->render($response, '404.php');
    };
};

//Error controller
$container['errorHandler'] = function($container) {
    return function ($request, $response, $arguments) use ($container) {
        return  $container->view->render($response, 'error.php');
    };
};

$app->run();