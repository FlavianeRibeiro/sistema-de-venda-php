<?php

class FornecedorDAO{
    private $id = '';
    private $cnpj = '';
    private $razaoSocial = '';
    private $endereco = '';
    
    
    function save($fornecedor){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        mysqli_query($link, "INSERT INTO `fornecedor`( `cnpj`, `razaoSocial`, `endereco`) VALUES ('$fornecedor->cnpj','$fornecedor->razaoSocial','$fornecedor->endereco')");
        
        return "sucesso";
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