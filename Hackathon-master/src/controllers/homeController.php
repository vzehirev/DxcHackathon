<?php


namespace App\controllers;

require_once "GetAndSetSession.php";

class HomeController
{
    private $container;
    private $view;

    public function __construct($container)
    {
        $this->container = $container;
        $this->view = $container['view'];
    }

    public function home($request, $response)
    {
        setSession($this->container);
        return $this->view->render($response, 'home.twig');
    }

    public function about($request, $response)
    {
        setSession($this->container);
        return $this->view->render($response, 'about.twig');
    }
}