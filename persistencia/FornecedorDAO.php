<?php

class FornecedorDAO{
    private $id = '';
    private $cnpj = '';
    private $razaoSocial = '';
    private $endereco = '';
    
    
    function save($fornecedor){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        return mysqli_query($link, "INSERT INTO `fornecedor`( `cnpj`, `razaoSocial`, `endereco`) VALUES ('$fornecedor->cnpj','$fornecedor->razaoSocial','$fornecedor->endereco')");
    }
    
    function update($fornecedor){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        $sql = "UPDATE `fornecedor` SET 
                                `cnpj`='$fornecedor->cnpj',
                                `razaoSocial`='$fornecedor->razaoSocial',
                                `endereco`='$fornecedor->endereco'
                                where `id`='$fornecedor->id'";
                                
                                echo $sql;
        return mysqli_query($link, $sql);
    }
    
    function delet($fornecedor){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        //echo "DELETE FROM `fornecedor` WHERE `id`='$fornecedor->id'";
        return mysqli_query($link, "DELETE FROM `fornecedor` WHERE `id`='$fornecedor->id'");
    }
    
    function getAll(){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        return mysqli_query($link, "SELECT `id`, `cnpj`, `razaoSocial`, `endereco` FROM `fornecedor`");
    }
    
    function getByID($fornecedor){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        return mysqli_query($link, "SELECT `id`, `cnpj`, `razaoSocial`, `endereco` FROM `fornecedor` where `id`='$fornecedor->id'");
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