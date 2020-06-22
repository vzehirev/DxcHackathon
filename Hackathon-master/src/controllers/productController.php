<?php
namespace App\controllers;

use \model;

require_once '../../vendor/j4mie/idiorm/idiorm.php';
require_once '../../vendor/j4mie/paris/paris.php';
require_once '../models/products.php';

class ProductController
{
    private $container;
    private $view;

    public function __construct($container)
    {
        $this->container = $container;
        $this->view = $container['view'];
    }

    public function all($request, $response)
    {
        $products = \Model::factory('\App\model\products')
            ->find_many();

        $args = [];
        $args['products'] = $products;

        setSession($this->container);
        return $this->view->render($response, 'allproducts.twig', $args);
    }

    public function allByCategory($request, $response, $params)
    {
        $category = $params['category'];

        $products = \Model::factory('\App\model\products')
            ->where('category', $category)
            ->find_many();

        $args = [];
        $args['products'] = $products;
        $args['category'] = ucfirst($category);

        setSession($this->container);
        return $this->view->render($response, 'products.twig', $args);
    }
}