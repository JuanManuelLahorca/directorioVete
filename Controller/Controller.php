<?php

require_once "./Model/Model.php";
require_once "./View/View.php";
require_once "./Helpers/AuthHelper.php";

class Controller{

    private $model;
    private $view;
    private $AuthHelper;

    function __construct(){
        $this->model = new Model();
        $this->view = new View();
        $this->AuthHelper = new AuthHelper();
    }

    function home(){
        $vets = $this->model->getVets();
        $this->view->showHome($vets);              
    }

    function Login() {
        $this->view->showLogin();
    }

    function logout(){
        session_start();
        session_destroy();
        $vets = $this->model->getVets();
        $this->view->showHome($vets);
    }

    function verifylogin(){
        if(!empty($_POST['mail']) && !empty($_POST['password'])){
            $usermail= $_POST['mail'];
            $userpass= $_POST['password'];
            $user = $this->model->getVetUser($usermail);
            if($user && password_verify($userpass, $user->Password)){
                $vets = $this->model->getVets();
                $this->view->showDataVet($user, $vets);
                //session_start();
                //$_SESSION["mail"] = $usermail;              
                //$admin = $this->model->IsAdmin($_SESSION["mail"]);
                //$vets = $this->model->getVets();
                //$this->view->showAdminHome($admin, $vets);    
            }
            else{
                $this->view->showLogin("Acceso Denegado");
            }
        }
    }


    function showCreateVet(){
        $vets = $this->model->getVets(); 
        $this->view->showCreateVet($vets);  // formulario crear vete
    }
    
    function createNewVet(){
        //$this->AuthHelper->checkLoggedIn();
        $password = password_hash($_POST['pass'],PASSWORD_BCRYPT);
        $this->model->insertVet($_POST['name'], $_POST['state'], $_POST['city'], $_POST['phone'], $_POST['mail'], $password, $_POST['terms'], $_POST['title'], $_POST['rol']);
        $this->view->showLogin(); 
    }

    function bases(){
        //$this->AuthHelper->checkLoggedIn();
        $this->view->bases(); 
    }

    function goUpdateVet($id){
        $Vet = $this->model->getVet($id);
        $this->view->showGoUpdateVet($id, $Vet);
    }

    function UpdateVet(){
        //$this->AuthHelper->checkLoggedIn();
        $password = password_hash($_POST['pass'],PASSWORD_BCRYPT);
        $this->model->updateVet($_POST['id_Vet'], $_POST['name'], $_POST['state'], $_POST['city'], $_POST['phone'], $_POST['mail'], $password, $_POST['terms'], $_POST['title'], $_POST['rol']);
        $this->view->showLogin(); 
    }

    function deleteVet($id){
        //$this->AuthHelper->checkLoggedIn();
        $this->model->deleteVet($id);
        $vets = $this->model->getVets();
        $this->view->showHome($vets);
    }

    /*

    

    function winesForStore($id){
        $vinosporbodega = $this->model->getStore($id);
        $this->view->showWinesForStore($vinosporbodega);
        
    }   

    function showCreateStore(){
        $this->AuthHelper->checkLoggedIn();
        $stores = $this->model->getStores();
        $this->view->showCreateStore($stores);
    }

    function CreateStore(){
        $this->AuthHelper->checkLoggedIn();
        $this->model->insertStore($_POST['nameStore']);
        $this->view->showCrudStoreLocation(); 
    }

    function deleteStore($id){
        $this->AuthHelper->checkLoggedIn();
        try {
            $this->model->deleteStore($id);
            $this->view->showCrudStoreLocation();
        } catch (Exception $e) {
            $message = "No se puede borrar la bodega porque posee vinos asociados";
            $this->view->showCrudStoreLocation($message);
        }
    }

    function goUpdateStore($id){
        $this->AuthHelper->checkLoggedIn();
        $this->view->showGoUpdateStore($id);
    }

    function updateStore(){
        $this->AuthHelper->checkLoggedIn();
        $this->model->updateStore($_POST['id_store'], $_POST['nameStore']);
        $this->view->showCrudStoreLocation();
    }

    */
}