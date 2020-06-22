<?php
function setSession($container){

$twig = $container->view->getEnvironment();
$twig->addGlobal("session", $_SESSION);

}