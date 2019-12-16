<?php

namespace Model;

use \PDO;
use \PDOException;

class Projetos {
    
    private $id;
    private $Titulo;
    private $Ano;
    private $Semestre;
    private $Alunos_id;
    private $Professors_id;
 


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setid($value) {
        $this->id = $value;
    }

    function setTitulo($value) {
        $this->Titulo = $value;
    }

    function setAno($value) {
        $this->Ano = $value;
    }

    function setSemestre($value) {
        $this->Semestre = $value;
    }

    function setAlunos_id($value) {
        $this->Alunos_id = $value;
    }
    function setProfessors_id($value) {
        $this->Professors_id = $value;
    }





    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `projetos`(`titulo`,`ano`,`semestre`,`alunos_id`,`professors_id`) VALUES(:Titulo,:Ano,:Semestre,:Alunos_id,:Professors_id)");
            $stmt->bindParam(":Titulo", $this->Titulo);
            $stmt->bindParam(":Ano", $this->Ano);
            $stmt->bindParam(":Semestre", $this->Semestre);
            $stmt->bindParam(":Alunos_id", $this->Alunos_id);
            $stmt->bindParam(":Professors_id", $this->Professors_id);

            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }
    



    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `Projetos` WHERE `idProjeto` = :idProjeto");
        $stmt->bindParam(":idProjeto", $this->idProjeto);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `Projetos` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}