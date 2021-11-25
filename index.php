<?php
session_start();
//Récupère l'url de la page demandée
define('URL', str_replace("index.php", "", (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

//Lance le méthode routerRequest qui gère la redirection sécurisé des pages
require_once "app/controllers/Router.php";
$router = new Router();
$router->routeRequest();