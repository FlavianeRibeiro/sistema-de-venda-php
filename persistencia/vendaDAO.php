<?php
include 'Banco.php';

class vendaDAO{
    private $id = '';
    private $codigo = '';
    private $data = '';
    private $valor = '';
    
    public function save_cliente($venda){
        return mysql_query($link,"INSERT INTO `venda`( `codigo`, `data`, `valor`) VALUES ('$cliente->codigo','$cliente->data','$cliente->valor')");
    }

    
    public function getAll(){
        return mysql_query("SELECT * FROM `venda`");
    }
}
?>