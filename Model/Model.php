<?php

class Model{

    private $db;
    function __construct(){
        $this-> db = new PDO('mysql:host=localhost;'.'dbname=db_directory;charset=utf8', 'root', ''); 
    }


    function insertVet($name, $state, $city, $phone, $mail, $pass, $terms, $title, $rol)   {
        $sentencia = $this->db->prepare("INSERT INTO professional (Name, State, City, Phone, Mail, Password, Terms, Title, rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sentencia->execute(array($name, $state, $city, $phone, $mail,$pass, $terms, $title, $rol));
    }

    function getVets()  {
        $sentencia = $this->db->prepare( "SELECT id_Professional, Name, State, City, Phone, Mail FROM professional");
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

    function updateVet($id, $name, $state, $city, $phone, $mail, $pass, $terms, $title, $rol){
        $sentencia = $this->db->prepare("UPDATE professional SET Name=?, State=?, City=?, Phone=?, Mail=?, Password=?, Terms=?, Title=?, rol=? WHERE id_Professional=?");
        $sentencia->execute(array($name, $state, $city, $phone, $mail, $pass, $terms, $title, $rol, $id));
        
    }

    function deleteVet($id){
        $sentencia = $this->db->prepare("DELETE FROM professional WHERE id_Professional=?");
        $sentencia->execute(array($id));
    }
    /*
    function insertWine($namewine, $style, $id_store, $price)   {
        $sentencia = $this->db->prepare("INSERT INTO wines(NameWine, Style, id_store, Price) VALUES (?, ?, ?, ?)");
        $sentencia->execute(array($namewine, $style, $id_store, $price));
    }

    
    function deleteWine($id){
        $sentencia = $this->db->prepare("DELETE FROM wines WHERE id_Wine=?");
        $sentencia->execute(array($id));
    }

    function updateWine($id, $namewine, $style, $id_store, $price){
        $sentencia = $this->db->prepare("UPDATE wines SET NameWine=?, Style=?, id_store=?,Price=? WHERE id_Wine=? ");
        $sentencia->execute(array($namewine, $style, $id_store, $price, $id));
        
    }

    function getWineUpdate($id)  {
            $sentencia = $this->db->prepare( "SELECT a.*, b.*
                                                FROM wines a
                                                LEFT JOIN stores b
                                                ON a.id_store = b.id_store where NameWine=?");
            $sentencia->execute(array($id));
            $wines = $sentencia->fetch(PDO::FETCH_OBJ);
            return $wines;
    }
    
    function getVets()  {
        $sentencia = $this->db->prepare( "SELECT * FROM professional");
        $sentencia->execute();
        $wines = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vets;
    } 

    function getWine($id)  {
        $sentencia = $this->db->prepare( "SELECT a.*, b.*
                                            FROM wines a
                                            LEFT JOIN stores b
                                            ON a.id_store = b.id_store where NameWine=?");
        $sentencia->execute(array($id));
        $wine = $sentencia->fetch(PDO::FETCH_OBJ);
        return $wine;
    }
*/
}