<?php 
require_once '../persistencia/ProdutoDAO.php';

class ProdutoController  {
    //Retorna uma lista com todos os produtos cadastrados
    public function listarTodas() {
        $produto = new ProdutoDAO();
        return $produto->getAll();
    }
    
    //Retorna uma lista com tipo
    public function listarTipos($tipo) {
        $produto = new ProdutoDAO();
        return $produto->getTipos($tipo);
    }
    
    //Salvando cadastro do produto
     public function salvarOld($array){
         $product = new ProdutoDAO();
        return $product->salvar($array);
    }
    
    
    //Atualizar dados
    public function atualizar($arrayAtualizado){
        $produto = new ProdutoDAO();
        return $produto->update($arrayAtualizado);
    }
    
    //Atualizar dados
    public function buscarProduto($id){
        $produto = new ProdutoDAO();
        return $produto->getId($id);
    }
    
    //Buscar por código
    public function buscarProdutoCodigo($codigo){
        $produto = new ProdutoDAO();
        return $produto->getCodigo($codigo);
    }
    
    //Atualizar estoque
    public function atualizarQtddEstoque($codigo,$quantidade)
    {
        $produto = new ProdutoDAO();
        $var = $produto->alterarEstoque($codigo,$quantidade);
    }
    
    public function addQtddEstoque($idProduto,$quantidade){
        $produto = new ProdutoDAO();
        return $produto->addEstoque($idProduto,$quantidade);
    }
}