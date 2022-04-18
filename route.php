<?php    
    require_once "./Controller/Controller.php";
    require_once "./Controller/LoginController.php";


    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'home'; // acción por defecto si no envían
    }

    $params = explode('/', $action);

    $Controller = new Controller();
    $LoginController = new LoginController();


    // determina que camino seguir según la acción
    switch ($params[0]) {
        case 'home': 
            $Controller->home(); 
            break;  

        case 'login': 
            $Controller->login(); 
            break;

        case 'logout': 
            $Controller->logout(); 
            break; 

        case 'register': 
            $LoginController->register(); 
            break;

        case 'createAdmin': 
            $LoginController->createAdmin(); 
            break;

        case 'verifyregister': 
            $LoginController->verifyregister(); // verificar registro
            break;

        case 'verifyLogin': 
            $Controller->verifylogin(); // verificar logueo
            break; 

        case 'showCreateVet': 
            $Controller->showCreateVet(); // ir a form para crear veterinario
            break; 

        case 'createNewVet': 
            $Controller->createNewVet(); // crear veterinario
            break; 
        case 'bases': 
            $Controller->bases(); // crear veterinario
            break; 
    
        case 'goUpdateVet': 
            $Controller->goUpdateVet($params[1]); // form modifico veterinario
            break;

        case 'UpdateVet': 
            $Controller->updateVet(); //modifico veterinario en db
            break;

        case 'deleteVet': 
            $Controller->deleteVet($params[1]); //borro un veterinario -- 
            break;

       

    default: 
            echo('404 Page not found'); 
            break;
            
    }
