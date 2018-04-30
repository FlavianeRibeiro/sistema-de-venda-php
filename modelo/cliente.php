<?php
include 'Banco.php';

class cliente extends pessoa{
    private $id = '';
    private $idPessoa = '';
    private $endereco = '';
    
    /*----------------------------
             construtor 
    ----------------------------*/
    public function __construct($db){
        $this->conn = $db;
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
    
    //Id Pessoa
    public function getIdPessoa(){
        return $this->$idPessoa;
    }
    
    public function setIdPessoa($idPessoa){
        $this->idPessoa = $idPessoa;
    }
    
    //Endereço
    public function getEndereco(){
        return $this->$endereco;
    }
    
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
}
?>