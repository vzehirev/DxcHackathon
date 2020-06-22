<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\controllers\HomeController;
use App\controllers\ProductController;
use App\controllers\CartController;
use App\controllers\AccountController;

require '../../vendor/autoload.php';

require '../controllers/productController.php';
require '../controllers/homeController.php';
require '../controllers/cartController.php';
require '../controllers/accountController.php';

require_once '../../vendor/j4mie/idiorm/idiorm.php';
require_once '../../vendor/j4mie/paris/paris.php';

ORM::configure('mysql:host=a27658cb2f7b;dbname=web_store');
ORM::configure('username', 'root');
ORM::configure('password', 'root');

session_start();

$app = new \Slim\App([

    'settings' => ['displayErrorDetails' => true]]
);

$_SESSION['someData'] = 'some data from session';

$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('../views/templates');

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};

$container['HomeController'] = function($c) {

    $home = new HomeController($c);

    return $home;
};

$container['AccountController'] = function($c) {

    $account = new AccountController($c);

    return $account;
};

$container['ProductController'] = function($c) {

    $product = new ProductController($c);

    return $product;
};

$container['CartController'] = function($c) {

    $cart = new CartController($c);

    return $cart;
};

require '../routes/myRoutes.php';

$app->run();
