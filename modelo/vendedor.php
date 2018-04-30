<?php
include '../persistencia/Banco.php';

class vendedor extends pessoa{
    private $id = '';
    private $codigoVendedor = '';
    
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
    
    //NOME PRODUTO
    public function getCodigoVendedor(){
        return $this->$codigoVendedor;
    }
    
    public function setCodigoVendedor($codigoVendedor){
        $this->codigoVendedor = $codigoVendedor;
    }

} 
?>