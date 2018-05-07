<?php
include 'Banco.php';

class ItemCompraDAO{
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
        //echo "<br>".$sql;
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