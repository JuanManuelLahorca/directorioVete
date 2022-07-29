<?php

require_once "./Model/Model.php";
require_once "./View/View.php";
require_once "./Helpers/AuthHelper.php";
require_once "./mail/mail.php";

class Controller{

    private $model;
    private $view;
    private $AuthHelper;
    private $mail;

    function __construct(){
        $this->model = new Model();
        $this->view = new View();
        $this->AuthHelper = new AuthHelper();
        $this->mail = new mail();
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
            if($user && password_verify($userpass, $user->Pass)){
                $vets = $this->model->getVets();
                $this->view->showDataVet($user, $vets);
                //session_start();
                //$_SESSION["mail"] = $usermail;              
                //$admin = $this->model->IsAdmin($_SESSION["mail"]);
                //$vets = $this->model->getVets();
                //$this->view->showAdminHome($admin, $vets);    
            }
            else{
                $this->view->showLogin("Acceso Denegado: el nombre de usuario o contraseña son incorrectos.");
            }
        }
    }


    function showCreateVet(){
        $vets = $this->model->getVets(); 
        $this->view->showCreateVet($vets);  // formulario crear vete
    }
    
    function createNewVet(){
        //$this->AuthHelper->checkLoggedIn();
        $nombre = $_FILES['title']['name'];
        $guardado = $_FILES['title']['tmp_name'];
        if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
           
            $this->view->showLogin("Los Datos personales fueron guardos con exito. Bienvenido/a a DirectorioVeterinario!"); 
        }else{
            $this->view->showLogin("Los datos personales no se guardaron correctamente."); 
        } 
        $maildireccion = $_POST['mail'];
  
        $password = password_hash($_POST['pass'],PASSWORD_BCRYPT);
        $this->model->insertVet($_POST['name'], $_POST['state'], $_POST['city'], $_POST['phone'], $_POST['mail'], $password, $_POST['terms'], $_POST['rol']);
        //$this->mail->enviarEmail($maildireccion);
    }

    function bases(){
        //$this->AuthHelper->checkLoggedIn();
        $this->view->bases(); 
    }

    function goUpdateVet($id){
        $Vet = $this->model->getVet($id);
        $this->view->showGoUpdateVet($id, $Vet);
    }

    function goUpdateVetByAdmin($id){
        $Vet = $this->model->getVet($id);
        $this->view->showGoUpdateVetByAdmin($id, $Vet);
    }

    function updateVet(){
        //$this->AuthHelper->checkLoggedIn();
        $nombre = $_FILES['title']['name'];
        $guardado = $_FILES['title']['tmp_name'];
        if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
           
            $this->view->showLogin("Los Datos personales fueron guardos con exito. Bienvenid@ a DirectorioVeterinario!"); 
        }else{
            $this->view->showLogin("Los datos personales no se guardaron correctamente."); 
        } 
        $password = password_hash($_POST['pass'],PASSWORD_BCRYPT);
        $this->model->updateVet($_POST['id_Vet'], $_POST['name'], $_POST['state'], $_POST['city'], $_POST['phone'], $_POST['mail'], $password, $_POST['terms'], $_POST['rol']);
        $this->view->showLogin(); 
    }

    function updateVetByAdmin(){
        //$this->AuthHelper->checkLoggedIn();
        $this->model->updateVetByAdmin($_POST['id_Vet'], $_POST['name'], $_POST['state'], $_POST['city'], $_POST['phone'], $_POST['mail']);
        $this->view->showLogin(); 
    }

    function deleteVet($id){
        //$this->AuthHelper->checkLoggedIn();
        $this->model->deleteVet($id);
        $this->view->showLogin(); 
    }

    function recuperarPass(){
        //$this->AuthHelper->checkLoggedIn();
        $this->view->recuperarPass();
    }

    function generarPass(){
        //$this->AuthHelper->checkLoggedIn();
        //generar contraseña
        $newPassword = rand();
        var_dump($newPassword);
        $mail = $_POST['mail'];
        var_dump($mail);
        //insertar en base de datos
        $vetData = $this->model->getVetByMail($mail);
        var_dump($vetData);
        $this->model->updateVet($vetData->$id_Professional, $vetData->$Name, $vetData->$State, $vetData->$City, $vetData->$Phone, $vetData->$Mail, $newPassword, $vetData->$Terms, $vetData->$Role);
        var_dump($newPassword);
        //mandar mail
        //$this->mail->enviarNewPassEmail($mail, $newPassword);
        
        $this->view->showLogin();
    }

    function publicOnVet($id){
        //$this->AuthHelper->checkLoggedIn();
        $this->model->publicOnVet($id);
        $this->view->showLogin();
    }

    function publicOffVet($id){
        //$this->AuthHelper->checkLoggedIn();
        $this->model->publicOffVet($id);
        $this->view->showLogin();
    }

    
}