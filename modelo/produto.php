<?php

class produto{
    private $id = '';
    private $codigo = '';
    private $nomeproduto = '';
    private $valor = '';
    private $estoque = '';
    private $tipo = '';
    private $img = '';
    private $descricao = '';
    
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
    
    public function id()
    {
        if($id) {
            $this->id = $id;
        }
        
        return $this->id;
    }
    
    //Código
    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
 
    //NOME PRODUTO
    public function getNomeProduto(){
        return $this->$nomeproduto;
    }
    
    public function setNomeProduto($nomeproduto){
        $this->nomeproduto = $nomeproduto;
    }
    
    //Valor
    public function getValor(){
        return $this->$valor;
    }
    
    public function setValor($valor){
        $this->valor = $valor;
    }
    
    //Estoque
    public function getEstoque(){
        return $this->$estoque;
    }
    
    public function setEstoque($estoque){
        $this->estoque = $estoque;
    }
    
    //Tipo
    public function getTipo(){
        return $this->$tipo;
    }
    
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    //IMG
    public function getImg(){
        return $this->$img;
    }
    
    public function setImg($img){
        $this->img = $img;
    }
    //Descriçao
    public function getDescricao(){
        return $this->$descricao;
    }
    
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
}
?>