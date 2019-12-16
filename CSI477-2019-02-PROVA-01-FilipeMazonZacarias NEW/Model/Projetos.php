<?php

namespace Model;

use \PDO;
use \PDOException;

class Projetos {
    
    private $id;
    private $Titulo;
    private $Ano;
    private $Semestre;
    private $Aluno_id;
    private $Professor_id;
 


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

    function setAluno_id($value) {
        $this->Aluno_id = $value;
    }
    function setProfessor_id($value) {
        $this->Professor_id = $value;
    }





    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `projetos`(`titulo`,`ano`,`semestre`,`aluno_id`,`professor_id`) VALUES(:Titulo,:Ano,:Semestre,:Aluno_id,:Professor_id)");
            $stmt->bindParam(":Titulo", $this->Titulo);
            $stmt->bindParam(":Ano", $this->Ano);
            $stmt->bindParam(":Semestre", $this->Semestre);
            $stmt->bindParam(":Aluno_id", $this->Aluno_id);
            $stmt->bindParam(":Professor_id", $this->Professor_id);

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