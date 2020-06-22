<?php
namespace App\controllers;

require_once '../../vendor/j4mie/idiorm/idiorm.php';
require_once '../../vendor/j4mie/paris/paris.php';
require_once '../models/products.php';

class CartController
{
    private $container;
    private $view;

    public function __construct($container)
    {
        $this->container = $container;
        $this->view = $container['view'];
    }

    public function get($request, $response)
    {
        if(count($_SESSION['cart']) > 0) {
        $products = \Model::factory('\App\model\products')
            ->find_many();

        $cart = [];
        $ttl = 0;

        foreach ($products as $product) {

            $id = $product->id;
            if (in_array($id, $_SESSION['cart'])) {
                $cart[] = $product;
                $ttl += $product->price;
            }
        }

        $args['cart'] = $cart;
        $args['ttl'] = $ttl;

        setSession($this->container);
        return $this->view->render($response, 'cart.twig', $args);
    }
        else{

            setSession($this->container);
            return $this->view->render($response, 'cart.twig');
        }
    }

    public function deleteAll($request, $response)
    {
        $_SESSION['cart'] = array();

        setSession($this->container);
        return $this->view->render($response, 'cart.twig');
    }

    public function add($request, $response, $params)
    {
        $productId = $params['id'];

        if(!isset($_SESSION['cart'])){

            $_SESSION['cart'] = array();
            $_SESSION['cart'][] = $productId;


        } else{

            if(!in_array($productId, $_SESSION['cart'])){

                $_SESSION['cart'][] = $productId;
            }
        }

        $products = \Model::factory('\App\model\products')
            ->find_many();

        $cart = [];
        $ttl = 0;

        foreach ($products as $product){

            $id = $product->id;
            if(in_array($id, $_SESSION['cart'])){
                $cart[] = $product;
                $ttl += $product->price;
            }
        }

        $args['cart'] = $cart;
        $args['ttl'] = $ttl;

        setSession($this->container);
        return $this->view->render($response, 'cart.twig', $args);
    }

    public function delete($request, $response, $params)
    {
        $productId = $params['id'];

        if(isset($_SESSION['cart'])){

            if(in_array($productId, $_SESSION['cart'])){

                $index = array_search($productId, $_SESSION['cart']);

                unset($_SESSION['cart'][$index]);
            }
        }

        if(count($_SESSION['cart']) > 0){
            $products = \Model::factory('\App\model\products')
                ->find_many();

            $cart = [];
            $ttl = 0;

            foreach ($products as $product){

                $id = $product->id;
                if(in_array($id, $_SESSION['cart'])){
                    $cart[] = $product;
                    $ttl += $product->price;
                }
            }

            $args['cart'] = $cart;
            $args['ttl'] = $ttl;

            setSession($this->container);
            return $this->view->render($response, 'cart.twig', $args);
        }

        setSession($this->container);
        return $this->view->render($response, 'cart.twig');
    }
}