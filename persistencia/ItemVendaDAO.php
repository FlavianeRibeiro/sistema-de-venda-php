<?php
include 'Banco.php';

class ItemVendaDAO{
    private $id = '';
    private $idVenda = '';
    private $idProduto = '';
    private $descricao = '';
    private $precoUnitario = '';
    private $qualidade = '';
    
    public function save($itemVenda){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        $sql =  "INSERT INTO `item_venda`(`idVenda`, `idProduto`, `precoUnitario`, `quantidade`) 
        VALUES ('$itemVenda->idVenda','$itemVenda->idProduto','$itemVenda->precoUnitario','$itemVenda->quantidade')";
        return mysqli_query($link, $sql);
    }
    
    public function update($itemVenda){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        return mysqli_query($link,
        "UPDATE `venda` SET 
        `descricao`='$itemVenda->descricao',
        `precoUnitario`='$itemVenda->precoUnitario',
        `quantidade`='$itemVenda->quantidade',
        WHERE `id` = '$itemVenda->id'");
    }
    
    public function getAll(){
        $link = mysqli_connect("", "", "", "");
        return mysqli_query($link, "SELECT * FROM `item_venda`");
    }
    
    public function getListagemCliente($id){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        $sql = "SELECT `item_venda`.`id` ,`item_venda`.`idProduto` , `item_venda`.`precoUnitario` , 
                SUM(`item_venda`.`quantidade`) AS 'quantidade' , `venda`.`data` , `venda`.`valor` , 
                `produto`.`nomeproduto`, `produto`.`img` 
                FROM `item_venda` 
                INNER JOIN `venda` ON `item_venda`.`idVenda` = `venda`.`id` 
                INNER JOIN `produto` ON `produto`.`codigo` = `item_venda`.`idProduto` 
                INNER JOIN `cliente` ON `venda`.`idCliente`= `cliente`.`id`
                WHERE `cliente`.`idPessoa`='".$id."'
                GROUP BY `produto`.`nomeproduto`";
       return mysqli_query($link, $sql);
    }
    
    public function getListagemVendedor($id){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        $sql = "SELECT `item_venda`.`id` ,`item_venda`.`idProduto` , `item_venda`.`precoUnitario` , `item_venda`.`quantidade` , `venda`.`data` , `venda`.`valor` , `produto`.`nomeproduto`, `produto`.`img` 
                FROM `item_venda` 
                INNER JOIN `venda` ON `item_venda`.`idVenda` = `venda`.`id` 
                INNER JOIN `produto` ON `produto`.`codigo` = `item_venda`.`idProduto` 
                INNER JOIN `vendedor` ON `venda`.`idVendedor`= `vendedor`.`id`
                WHERE `vendedor`.`idPessoa`='".$id."'
                GROUP BY `produto`.`nomeproduto`";
       // echo $sql;
       return mysqli_query($link, $sql);
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
    
    //ID Venda
    public function getIdVenda(){
        return $this->$idVenda;
    }

    public function setIdVenda($idVenda){
        $this->idVenda = $idVenda;
    }
    
    //ID Produto
    public function getIdProduto(){
        return $this->$idProduto;
    }
    
    public function setIdProduto($idProduto){
        $this->idProduto = $idProduto;
    }
    
    //DESCRIÇÃO
    public function getDescricao(){
        return $this->$descricao;
    }
    
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    
    //Preço Unitário
    public function getPrecoUnitario(){
        return $this->$precoUnitario;
    }
    
    public function setPrecoUnitario($precoUnitario){
        $this->precoUnitario = $precoUnitario;
    }
    
    //QUANTIDADE
    public function getQuantidade(){
        return $this->$quantidade;
    }
    
    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }
}
?>