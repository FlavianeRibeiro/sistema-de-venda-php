<?php
include 'Banco.php';

class vendedorDAO{
    private $id = '';
    private $codigoVendedor = '';
    
    public function save($vendendor){
        mysql_query("INSERT INTO `vendedor`(`codigoVendedor`) 
        VALUES ('$vendendor->codigoVendedor')");
        return "sucesso";
    }

}
?>