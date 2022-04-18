<?php

class AuthHelper{
    function __construct(){
    }

    function checkLoggedIn(){
        session_start();
        
        if(!isset($_SESSION["mail"])){
            header("Location: ".BASE_URL."login");
        }
    }
}