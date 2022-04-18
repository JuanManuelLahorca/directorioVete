<?php
require_once "./Model/UserModel.php";
require_once "./Model/Model.php";
require_once "./View/LoginView.php";
require_once "./View/View.php";
require_once "./Helpers/AuthHelper.php";

class LoginController {
    
    private $modelUser;
    private $model;
    private $view;
    private $AuthHelper;

    function __construct(){
        $this->modelUser = new UserModel();
        $this->model = new Model();
        $this->viewLogin = new LoginView();
        $this->view = new View();
        $this->AuthHelper = new AuthHelper();
    }

    function Login() {
        $this->viewLogin->showLogin();
    }
    
    function register(){
        $this->viewLogin->showRegister();
    }

    function createAdmin(){
        $this->viewLogin->showCreateAdmin();
    }
    
    /*function verifyregister(){
        if(!empty($_POST['name']) && !empty($_POST['password'])){
            $username = $_POST['name'];
            $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
            $admin = $_POST['admin'];
            $this->modelUser->insertRegister($username, $password, $admin);
        }
        $this->view->createNewVet($admin);
    }*/

    function verifylogin(){
        if(!empty($_POST['mail']) && !empty($_POST['password'])){
            $usermail= $_POST['mail'];
            $userpass= $_POST['password'];
     

            $user = $this->model->getVetUser($usermail);

            if($user && password_verify($userpass, $user->Password)){

                $this->view->showDataVet();
                session_start();
                $_SESSION["name"] = $username;
                
                //$admin = $this->modelUser->IsAdmin($_SESSION["name"]);
                //$vets = $this->model->getVets();
                $this->view->showAdminHome($admin, $vets);    

            }
            else{
                $this->viewLogin->showLogin("Acceso Denegado");
            }
     
        }
     
    }


    /*

    function login(){
        $this->view->showLogin();
    }

    function logout(){
        session_start();
        session_destroy();
        $this->view->showLogin();
    }

    function verifylogin(){
        if(!empty($_POST['name']) && !empty($_POST['password'])){
            $username= $_POST['name'];
            $userpass= $_POST['password'];
     

            $user = $this->model->getUser($username);

            if($user && password_verify($userpass, $user->Password)){

                session_start();
                $_SESSION["name"] = $username;
                
                $admin = $this->model->IsAdmin($_SESSION["name"]);
                $this->view->showAdminHome($admin);    

            }
            else{
                $this->view->showLogin("Acceso Denegado");
            }
     
        }
     
    }

    function adminHome(){
        $this->AuthHelper->checkLoggedIn();
        $admin = $this->model->IsAdmin($_SESSION["name"]);
        $this->view->showAdminHome($admin);
    }

   

    

    function adminUser(){
        $this->AuthHelper->checkLoggedIn();
        $admin = $this->model->IsAdmin($_SESSION["name"]);
        $usuarios = $this->model->getUsers();
        $this->view->showUsers($usuarios, $admin);
    }

    function deleteUser($id){
        $this->AuthHelper->checkLoggedIn();
        $this->model->deleteUser($id);
        $this->view->showUserLocation();
    }

    function CambiarCondicion($id){
        $this->AuthHelper->checkLoggedIn();
        $this->model->updateUser($id);
        $this->view->showUserLocation();
    }

    */

}