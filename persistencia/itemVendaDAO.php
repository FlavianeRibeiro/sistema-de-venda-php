<?php
include 'Banco.php';

class itemVendaDAO{
    private $id = '';
    private $idVenda = '';
    private $descricao = '';
    private $precoUnitario = '';
    private $qualidade = '';
    
    public function save($venda){
        $link = mysqli_connect("", "", "", "");
        return mysql_query($link,
        "INSERT INTO `item_venda`(`idVenda`, `descricao`, `precoUnitario`, `quantidade`) 
        VALUES ('$venda->idVenda','$venda->descricao','$venda->precoUnitario','$venda->quantidade'))");
    }
    
    public function update($venda){
        $link = mysqli_connect("", "", "", "");
        return mysql_query($link,
        "UPDATE `venda` SET 
        `descricao`='$venda->descricao',
        `precoUnitario`='$venda->precoUnitario',
        `quantidade`='$venda->quantidade',
        WHERE `id` = '$venda->id'");
    }
    
    public function getAll(){
        $link = mysqli_connect("", "", "", "");
        return mysql_query($link, "SELECT * FROM `item_venda`");
    }
}
?>