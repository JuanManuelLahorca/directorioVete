<?php

require_once "./smarty-3.1.39/libs/Smarty.class.php";

class LoginView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showLogin($error = ""){
        $this->smarty->assign('titulo', 'Login');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/homeUser.tpl');
        
    }

    function showCreateAdmin(){
        $this->smarty->display('templates/showCreateAdmin.tpl');
    }

    function showRegister(){
        $this->smarty->display('templates/showCreateVet.tpl');
    }

    function showAdminHome($admin, $vets){
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('vets', $vets);
        $this->smarty->display('templates/adminHome.tpl');
    }
    
}