<?php

namespace Model;

use \PDO;
use \PDOException;

class Projetos {
    
    private $idProjeto;
    private $Titulo;
    private $Ano;
    private $Semestre;
    private $Alunos_idAluno;
    private $Professores_idProfessor;
 


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setidProjeto($value) {
        $this->idProjeto = $value;
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

    function setAlunos_idAluno($value) {
        $this->Alunos_idAluno = $value;
    }
    function setProfessores_idProfessor($value) {
        $this->Professores_idProfessor = $value;
    }





    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Projetos`(`Titulo`,`Ano`,`Semestre`,`Alunos_idAluno`,`Professores_idProfessor`) VALUES(:Titulo,:Ano,:Semestre,:Alunos_idAluno,:Professores_idProfessor)");
            $stmt->bindParam(":Titulo", $this->Titulo);
            $stmt->bindParam(":Ano", $this->Ano);
            $stmt->bindParam(":Semestre", $this->Semestre);
            $stmt->bindParam(":Alunos_idAluno", $this->Alunos_idAluno);
            $stmt->bindParam(":Professores_idProfessor", $this->Professores_idProfessor);

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