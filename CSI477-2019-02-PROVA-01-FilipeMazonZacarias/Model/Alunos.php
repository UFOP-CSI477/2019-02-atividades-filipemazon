<?php

namespace Model;

use \PDO;
use \PDOException;
use Model\Database;

class Alunos {
    
    private $idAluno;
    private $Nome;
    private $Curso;
 


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setidAluno($value) {
        $this->idAluno = $value;
    }

    function setNome($value) {
        $this->nome = $value;
    }

    function setCurso($value) {
        $this->curso = $value;
    }





    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Alunos`(`nome`,`curso`) VALUES(:nome,:curso)");
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":curso", $this->curso);

            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }
    
    public function edit(){
        try{
            $stmt = $this->conn->prepare("UPDATE `Alunos` SET `nome` = :nome, `curso` = :curso");
            $stmt->bindParam(":idAluno", $this->idAluno);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":curso", $this->curso);


            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }



    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `Alunos` WHERE `idAluno` = :idAluno");
        $stmt->bindParam(":idAluno", $this->idAluno);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `Alunos` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}