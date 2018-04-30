<?php
include 'Banco.php';

class ClienteDAO{
    private $id = '';
    private $idPessoa = '';
    private $endereco = '';
    
    public function save($cliente){
        return mysqli_query("INSERT INTO `cliente`( `idPessoa`, `endereco`) VALUES (null,'$cliente->endereco'))");
    }
    
}
?>