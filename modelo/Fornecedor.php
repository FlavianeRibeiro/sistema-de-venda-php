<?php

class Fornecedor{
    private $id = '';
    private $cnpj = '';
    private $razaoSocial = '';
    private $endereco = '';
    
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
    
    //CNPJ
    public function getCnpj(){
        return $this->$cnpj;
    }
    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }
    
    //RAZÃO SOCIAL
    public function getRazaoSocial(){
        return $this->$razaoSocial;
    }
    public function setRazaoSocial($razaoSocial){
        $this->razaoSocial = $razaoSocial;
    }
    
    //ENDERECO
    public function getEndereco(){
        return $this->$endereco;
    }
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
}
?>