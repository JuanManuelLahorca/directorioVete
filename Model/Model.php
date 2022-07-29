<?php

class Model{

    private $db;
    function __construct(){
        //$this-> db = new PDO('mysql:host=localhost;'.'dbname=db_directory;charset=utf8', 'root', '');
        $this-> db = new PDO('mysql:host=localhost;'.'dbname=dbgaqbbnn6kuqe;charset=utf8', 'uk6hh6nayar5p', '1`53#2((gch3'); 
    }


    function insertVet($name, $state, $city, $phone, $mail, $pass, $terms, $rol){
        $sentencia = $this->db->prepare("INSERT INTO professional (Name, State, City, Phone, Mail, Pass, Terms, Role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $sentencia->execute(array($name, $state, $city, $phone, $mail,$pass, $terms, $rol));
    }

    function getVets()  {
        $sentencia = $this->db->prepare( "SELECT id_Professional, Name, State, City, Phone, Mail, Role FROM professional ORDER BY City");
        $sentencia->execute();
        $vets = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vets;
    } 

    function getVetUser($usermail){
        $query = $this->db->prepare('SELECT * FROM professional WHERE Mail = ?');
        $query->execute(array($usermail)); 
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;    
    }

    function isAdmin($usermail){
        $query = $this->db->prepare('SELECT admin FROM users WHERE NameUser = ?');
        $query->execute(array($usermail)); 
        $admin = $query->fetchColumn();
        return $admin == "1";    
    }

    function getVet($id)  {
        $sentencia = $this->db->prepare( "SELECT * FROM professional where id_Professional=?");
        $sentencia->execute(array($id));
        $Vet = $sentencia->fetch(PDO::FETCH_OBJ);
        return $Vet;
    }

    function getVetByMail($mail)  {
        $sentencia = $this->db->prepare( "SELECT * FROM professional where Mail=?");
        $sentencia->execute(array($mail));
        $Vet = $sentencia->fetch(PDO::FETCH_OBJ);
        return $Vet;
    }

    function updateVet($id, $name, $state, $city, $phone, $mail, $pass, $terms, $rol){
        $sentencia = $this->db->prepare("UPDATE professional SET Name=?, State=?, City=?, Phone=?, Mail=?, Pass=?, Terms=?, Role=? WHERE id_Professional=?");
        $sentencia->execute(array($name, $state, $city, $phone, $mail, $pass, $terms, $rol, $id));    
    }

    function updateVetByAdmin($id, $name, $state, $city, $phone, $mail){
        $sentencia = $this->db->prepare('UPDATE professional SET Name=?, State=?, City=?, Phone=?, Mail=? WHERE id_Professional=?');
        $sentencia->execute(array($name, $state, $city, $phone, $mail, $id));    
    }

    function deleteVet($id){
        $sentencia = $this->db->prepare("DELETE FROM professional WHERE id_Professional=?");
        $sentencia->execute(array($id));
    }

    function publicOnVet($id){
        $sentencia = $this->db->prepare("UPDATE professional SET Role = 'p' WHERE id_Professional=?");
        $sentencia->execute(array($id));    
    }

    function publicOffVet($id){
        $sentencia = $this->db->prepare("UPDATE professional SET Role='u' WHERE id_Professional=?");
        $sentencia->execute(array($rol, $id));    
    }
    
}