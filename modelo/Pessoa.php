<?php

class Pessoa{
    private $id = '';
    private $nome = '';
    private $CPF = '';
    private $telefone = '';
    
    function __construct ($nome) {
        $this->nome = $nome;
    }
    
    /*----------------------------
        Getters e Setters 
    ----------------------------*/
    //ID
    public function getId(){  return $this->$id; }
    public function setId($id){ $this->id = $id; }
    
    //NOME
    public function getNome(){  return $this->$nome; }
    public function setNome($nome){ $this->nome = $nome; }
    
    //CPF
    public function getCPF(){
        return $this->$CPF;
    }
    
    public function setCPF($CPF){
        $this->CPF = $CPF;
    }
    
    //Telefone
    public function getTelefone(){
        return $this->$telefone;
    }
    
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
}
?>