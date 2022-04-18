<?php

require_once "./Model/Model.php";
require_once "./View/APIView.php";
//require_once "./View/AuthHelper.php";

class ApiController {

    private $model;
    private $view;
    private $AuthHelper;

    function __construct(){
        $this->model = new Model();
        $this->view = new APIView();
        $this->AuthHelper = new AuthHelper();
    }

    function getVets(){
        $Vets = $this->model->getVets();
        return $this->view->response($Vets, 200);
    }
    
    function getVet($params = null) {
        $idVet = $params[':ID'];
        $Vet = $this->model->getVet($idVet);

        if (!empty($Vet)) // verifica si el veterinario existe
            $this->view->response($Vet, 200);
        else
            $this->view->response("El veterinario con el id=$idVet no existe", 404);
    }

    function updateVet($params = null) {
        $idVet = $params[":ID"];
        $Vet = $this->model->getVet($idVet);

        if ($Vet) {
            $this->model->updateVet($_POST['Name'], $_POST['City'], $_POST['State'], $_POST['Contact']);
            return $this->view->response("El veterinario con el id=$idVet fue modificado", 200);
        } else {
            return $this->view->response("El veterinario con el id=$idVet no existe", 404);
        }
    }

    function deleteVet($params = null) {
        $idVet = $params[":ID"];
        $Vet = $this->model->getVet($idVet);

        if ($Vet) {
            $this->model->deleteVet($idVet);
            return $this->view->response("El veterinario con el id=$idVet fue borrado", 200);
        } else {
            return $this->view->response("El veterinario con el id=$idVet no existe", 404);
        }
    }

    function createVet() {   
        // obtengo el body del request (json)
        $body = $this->getBody();

        // TODO: VALIDACIONES -> 400 (Bad Request)

        $idVet = $this->model->insertVet($body->Name, $body->City, $body->State, $body->Contact); 
        if ($idVet != 0) {
            $this->view->response("El veterinario se insertó con el id=$idVet", 200);
        } else {
            $this->view->response("El veterinario no se pudo insertar", 500);
        }
    }
     // Devuelve el body del request
   
    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }








}
