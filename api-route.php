<?php
require_once 'libs/Router.php';
require_once 'Controller/ApiController.php';


// crea el router
$router = new Router();
// define la tabla de ruteo
$router->addRoute('Vet', 'GET', 'ApiController', 'getVets');
$router->addRoute('Vet/:ID', 'GET', 'ApiController', 'getVet');
$router->addRoute('Vet', 'POST', 'ApiController', 'createVet');
$router->addRoute('Vet/:ID', 'UPDATE', 'ApiController', 'updateVet');
$router->addRoute('Vet/:ID', 'DELETE', 'ApiController', 'deleteVet');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
