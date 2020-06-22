<?php
namespace App\controllers;
require_once '../models/customers.php';

class AccountController
{
    private $container;
    private $view;

    public function __construct($container)
    {
        $this->container = $container;
        $this->view = $container['view'];
    }

    public function signup($request, $response)
    {

        if ($request->getMethod()=="POST")
        {
            $errors = [];
            $username=$request->getParsedBodyParam("username");
            $email=$request->getParsedBodyParam("email");
            $password=$request->getParsedBodyParam("password");

            if ($username==null || $email==null || $password==null)
            {
                $errors[] = "No empty fields allowed!";
            }

            $user = \Model::factory('\App\model\customers')
                ->where("username", $username);

            if ($user->count()!=0)
            {
                $errors[] = "Username already taken!";
            }
            if(count($errors)>0)
            {
                $args['errors']=$errors;
                setSession($this->container);
                return $this->view->render($response, 'signup.twig', $args);
            }

            $user = \Model::factory('\App\model\customers')->create();

            $user->username = $username;
            $user->email = $email;
            $user->password = $password;
            $user->save();

            $_SESSION['username']=$username;
            $twig = $this->container->view->getEnvironment();
            $twig->addGlobal("session", $_SESSION);
            return $this->view->render($response, 'home.twig');
        }

        else {
            setSession($this->container);
            return $this->view->render($response, 'signup.twig');
        }
    }
    public function login($request, $response)
    {
        if($request->getMethod()=="POST")
        {
            $username=$request->getParsedBodyParam("username");
            $password=$request->getParsedBodyParam("password");
            $user = \Model::factory('\App\model\customers')
                ->where(["username"=>$username, "password"=>$password]);

            if ($user->count()==0)
            {
                $errors[] = "No user with the given username and/or password!";
            }
            if(count($errors)>0)
            {
            $args['errors']=$errors;
            setSession($this->container);
            return $this->view->render($response, 'login.twig', $args);
            }
            $_SESSION['username']=$username;
            $twig = $this->container->view->getEnvironment();
            $twig->addGlobal("session", $_SESSION);
            return $this->view->render($response, 'home.twig');

        }
        else
            {
            setSession($this->container);
            return $this->view->render($response, 'login.twig');
        }
    }
    public function logout($request, $response)
    {
        session_unset();
        $twig = $this->container->view->getEnvironment();
        $twig->addGlobal("session", $_SESSION);
        return $this->view->render($response, 'home.twig');
    }
}