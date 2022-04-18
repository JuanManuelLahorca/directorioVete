<?php
require_once 'libs/Router.php';
require_once 'Controller/ApiController.php';
require_once 'Controller/Controller.php';


// crea el router
$router = new Router();
// define la tabla de ruteo

$router->addRoute('vet', 'GET', 'ApiController', 'getVets');
$router->addRoute('vet/:ID', 'GET', 'ApiController', 'getVet');
$router->addRoute('vet', 'POST', 'ApiController', 'createVet');
$router->addRoute('vet/:ID', 'DELETE', 'ApiController', 'deleteVet');
$router->addRoute('vet/:ID', 'UPDATE', 'ApiController', 'updateVet');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
