<?php
include 'Banco.php';

class vendedorDAO{
    private $id = '';
    private $codigoVendedor = '';
    
    public function save($vendendor){
        return mysql_query("INSERT INTO `vendedor`(`codigoVendedor`) 
        VALUES ('$vendendor->codigoVendedor')");
    }

}
?>