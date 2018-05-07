<?php
include 'Banco.php';

class CompraDAO{
    private $id = '';
    private $data = '';
    private $valorTotal='';
    private $idFornecedor='';
    private $idProduto='';
    
    public function save_venda($venda){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        
        $this->data = $today = date("m.d.y");
        $this->idVendedor = $this->getIdVendedorByPessoa($venda);
        $this->idCliente = $this->getIdClienteByPessoa($venda);
        
        $sql = "INSERT INTO `venda`(`data`, `valor`, `idVendedor`, `idCliente`)  VALUES ('$this->data','$venda->valorTotal','$venda->idVendedor','$venda->idCliente')";
        //echo "<br>".$sql;
        mysqli_query($link, $sql);
        
        return $this->obterVenda($venda);
    }
    
    public function obterVenda($venda){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        
        $sql = "SELECT `id` from `venda` where `data`='$this->data' and `valor`='$this->valorTotal' and `idVendedor`='$venda->idVendedor' and `idCliente`='$venda->idCliente'";
        //echo "<br>".$sql;
        return mysqli_query($link, $sql);
        
    }
    
    public function getIdVendedorByPessoa($venda){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        $result = mysqli_query($link, "select `id` from `vendedor` where `idPessoa`='$venda->idVendedor'");
        
        while($pessoa = $result->fetch_array(MYSQLI_ASSOC)){
            return $pessoa['id'];
        }
        return "";
    }
    
    public function getIdClienteByPessoa($venda){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        $result = mysqli_query($link, "select `id` from `cliente` where `idPessoa`='$venda->idCliente'");
        
        while($pessoa = $result->fetch_array(MYSQLI_ASSOC)){
            return $pessoa['id'];
        }
        return "";
    }

    
    public function getAll(){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        $sql = "SELECT `compra`.`id`,`compra`.`data`, `fornecedor`.`razaoSocial`, `produto`.`nomeproduto`,`item_compra`.`precoUnitario`,`item_compra`.`quantidade`
                FROM `compra` 
                INNER JOIN `fornecedor` ON `fornecedor`.`id` = `compra`.`idFornecedor`
                INNER JOIN `item_compra` ON `item_compra`.`idCompra` = `compra`.`id`
                INNER JOIN `produto` ON `produto`.`id` = `item_compra`.`idProduto`";
        //var_dump($sql);
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
    
    /*
    //Codigo
    public function getCodigo(){
        return $this->$codigo;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }*/
    
    //Data
    public function getData(){
        return $this->$data;
    }
    public function setData($data){
        $this->data = $data;
    }
    
    //Valor
    public function getValorTotal(){
        return $this->$valorTotal;
    }
    public function setValorTotal($valorTotal){
        $this->valorTotal = $valorTotal;
    }
    
    //ID Vendedor
    public function getIdVendedor(){
        return $this->$idVendedor;
    }
    public function setIdVendedor($idVendedor){
        $this->idVendedor = $idVendedor;
    }
    
    //ID Cliente
    public function getIdCliente(){
        return $this->$idCliente;
    }
    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    }
}
?>