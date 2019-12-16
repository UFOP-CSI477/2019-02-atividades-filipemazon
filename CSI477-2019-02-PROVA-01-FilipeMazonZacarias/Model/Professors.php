<?php

namespace Model;

use \PDO;
use \PDOException;
use Model\Database;

class Professors {
    
    private $id;
    private $Nome;
    private $Area;
 


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setid($value) {
        $this->id = $value;
    }

    function setNome($value) {
        $this->nome = $value;
    }

    function setArea($value) {
        $this->area = $value;
    }





    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `professors`(`nome`,`area`) VALUES(:nome,:area)");
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
            $stmt = $this->conn->prepare("UPDATE `professors` SET `nome` = :nome, `area` = :area");
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":area", $this->area);


            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }



    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `professors` WHERE `id` = :id");
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `professors` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}