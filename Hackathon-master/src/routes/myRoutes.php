<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//HomeController
//get
$app->get('/', 'HomeController:home')->setName('home');
$app->get('/home', 'HomeController:home')->setName('home');
$app->get('/about', 'HomeController:about')->setName('about');


//ProductController
//get
$app->get('/products/{category}', 'ProductController:allByCategory')->setName('allByCategory');
$app->get('/allproducts', 'ProductController:all')->setName('all');


//AccountController
//get
$app->get('/signup', 'AccountController:signup')->setName('signup');
$app->get('/login', 'AccountController:login')->setName('login');
$app->get('/logout', 'AccountController:logout')->setName('logout');

//post
$app->post('/signup', 'AccountController:signup')->setName('signup');
$app->post('/login', 'AccountController:login')->setName('login');

//CartController
//get
$app->get('/cart', 'CartController:get')->setName('cartGet');

$app->get('/cart/add/{id}', 'CartController:add')->setName('cartAdd');

$app->get('/cart/deleteAll', 'CartController:deleteAll')->setName('cartDelete');

$app->get('/cart/delete/{id}', 'CartController:delete')->setName('cartDelete');


