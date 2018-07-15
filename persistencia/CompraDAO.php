<?php
include 'Banco.php';

class CompraDAO{
    private $id = '';
    private $data = '';
    private $valorTotal='';
    private $idFornecedor='';
    private $idProduto='';

    
    public function getAll(){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        $sql = "SELECT  `compra`.`id` ,  `compra`.`data` ,  `fornecedor`.`razaoSocial` ,  `produto`.`nomeproduto` ,  `item_compra`.`precoUnitario` , `item_compra`.`quantidade` ,  `item_compra`.`idProduto` ,  `compra`.`idFornecedor` 
                FROM  `compra` 
                INNER JOIN  `fornecedor` ON  `fornecedor`.`id` =  `compra`.`idFornecedor` 
                INNER JOIN  `item_compra` ON  `item_compra`.`idCompra` =  `compra`.`id` 
                INNER JOIN  `produto` ON  `produto`.`id` = `item_compra`.`idProduto`";
        //var_dump($sql);
        return mysqli_query($link, $sql);
    }
    
    public function save_Compra($compraProduto){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        $sql = "INSERT INTO `compra`( `idFornecedor`, `data`, `valor`) 
                VALUES (".$compraProduto[0].",'".$compraProduto[1]."',".$compraProduto[2].")";
        mysqli_query($link, $sql);
        
    }
    
    public function buscardados(){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        $sql = "SELECT MAX(ID) as id FROM `compra`";
        return mysqli_query($link, $sql);
    }
    
}
?>