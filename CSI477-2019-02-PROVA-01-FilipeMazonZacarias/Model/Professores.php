<?php

namespace Model;

use \PDO;
use \PDOException;
use Model\Database;

class Professores {
    
    private $idProfessor;
    private $Nome;
    private $Area;
 


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setidProfessor($value) {
        $this->idProfessor = $value;
    }

    function setNome($value) {
        $this->nome = $value;
    }

    function setArea($value) {
        $this->area = $value;
    }





    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Professores`(`nome`,`area`) VALUES(:nome,:area)");
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":area", $this->area);

            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }
    
    public function edit(){
        try{
            $stmt = $this->conn->prepare("UPDATE `Professores` SET `nome` = :nome, `area` = :area");
            $stmt->bindParam(":idProfessor", $this->idProfessor);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":area", $this->area);


            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }



    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `Professores` WHERE `idProfessor` = :idProfessor");
        $stmt->bindParam(":idProfessor", $this->idProfessor);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `Professores` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}