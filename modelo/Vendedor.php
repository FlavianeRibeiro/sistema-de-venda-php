<?php

class Vendedor extends Pessoa{
    private $id = '';
    private $idPessoa = '';
    private $salario = '';
    
    /*----------------------------
             construtor 
    ----------------------------*/
    function __construct(){
    }
    
    /*----------------------------
        Getters e Setters 
    ----------------------------*/
    //ID
    public function getId(){
        return $this->$id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    //SALARIO
    public function getSalario(){
        return $this->$salario;
    }
    
    public function setSalario($salario){
        $this->salario = $salario;
    }
    
     //ID PESSOA
    public function getIdPessoa(){
        return $this->$idPessoa;
    }
    
    public function setId($idPessoa){
        $this->idPessoa = $idPessoa;
    }
} 
?>