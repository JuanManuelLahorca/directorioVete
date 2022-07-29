<?php
require_once "./smarty-3.1.39/libs/Smarty.class.php";

class View{
    
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();

    }

    function showHome ($vets = null){
        $this->smarty->assign('vets' , $vets);
        $this->smarty->display('templates/home.tpl');
        
    }

    function showLogin($error = ""){
        $this->smarty->assign('titulo', 'Login');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/homeUser.tpl');
        
    }

    function showCreateVet($vets){
        $this->smarty->assign('titulo', 'Agregar un veterinario');
        $this->smarty->assign('vets' , $vets);
        $this->smarty->display('templates/showCreateVet.tpl');
    }
    
    function createNewVet (){
        $this->smarty->assign('admin' , $admin);
        $this->smarty->display('templates/createNewVet.tpl');
        
    }

    function showDataVet($user, $vets){
        $this->smarty->assign('vets' , $vets);
        $this->smarty->assign('user' , $user);
        $this->smarty->display('templates/dataVet.tpl');
    }


    function Location(){
        header("Location: ".BASE_URL."home");
    }

    function bases(){
        $this->smarty->display('basesycondiciones.tpl');
    }

    function showGoUpdateVet($id, $vet){
        $this->smarty->assign('titulo', 'Modificar datos');
        $this->smarty->assign('id', $id);
        $this->smarty->assign('vet', $vet);
        $this->smarty->display('templates/updateVet.tpl');
    }

    function showGoUpdateVetByAdmin($id, $vet){
        $this->smarty->assign('titulo', 'Modificar datos');
        $this->smarty->assign('id', $id);
        $this->smarty->assign('vet', $vet);
        $this->smarty->display('templates/updateVetByAdmin.tpl');
    }
    
    function recuperarPass(){
        $this->smarty->assign('titulo', 'Recuperar Password');
        $this->smarty->display('templates/recuperarPass.tpl');
    }
}