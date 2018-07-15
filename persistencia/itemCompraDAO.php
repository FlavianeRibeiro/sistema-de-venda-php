<?php
include 'Banco.php';

class ItemCompraDAO{
    private $id = '';
    private $idCompra = '';
    private $idProduto = '';
    private $precoUnitario = '';
    private $qualidade = '';
    
    public function save($itemVenda){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        $sql =  "INSERT INTO `item_compra`(`idCompra`, `idProduto`, `precoUnitario`, `quantidade`) 
        VALUES (".$itemVenda[0].",".$itemVenda[1].",".$itemVenda[2].",".$itemVenda[3].")";
        return mysqli_query($link, $sql);
    }
    
    
    public function getBuscaProduto($idFornecedor,$idProduto){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        $sql = "SELECT p.nomeproduto,  p.valor, f.razaoSocial
                FROM fornecedor f
                INNER JOIN compra c ON c.idFornecedor = f.id
                INNER JOIN item_compra ic ON c.id = ic.idCompra
                INNER JOIN produto p ON ic.idProduto = p.id
                WHERE f.id = $idFornecedor and p.id = $idProduto";
       return mysqli_query($link, $sql);
    }
}
?>