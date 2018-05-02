<?php

class Compra{
    private $id = '';
    private $codigo = '';
    private $idProduto ='';
    private $idFornecedor ='';
    private $data = '';
    private $valor = '';
    
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
        
    //Código
    public function getCodigo(){
        return $this->$codigo;
    }
    
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    
    //DESCRISÃO
    public function getData(){
        return $this->$data;
    }
    
    public function setData($data){
        $this->data = $data;
    }
    
    //TAMANHO
    public function getValor(){
        return $this->$valor;
    }
    
    public function setValor($valor){
        $this->valor = $valor;
    }
}
?>