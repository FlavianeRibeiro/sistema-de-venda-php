<?php   
class ItemVenda{
    private $id = '';
    private $idVenda = '';
    private $descricao = '';
    private $precoUnitario = '';
    private $quantidade = '';
    
    /*----------------------------
             construtor 
    ----------------------------*/
    function __construct(){
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