<?php 
require_once '../persistencia/produtoDAO.php';

class produtoController  {

    //Retorna uma lista com todos os produtos cadastrados
    public function listarTodas() {
        $produto = new produtoDAO();
        return $produto->getAll();
    }
    
    //Retorna uma lista com tipo
    public function listarTipos($tipo) {
        $produto = new produtoDAO();
        return $produto->getTipos($tipo);
    }
    
    //Salvando cadastro do produto
     public function salvar($array){
         $product = new produtoDAO();
        return $product->salvarProduto($array);
    }
    
    //Atualizar dados
    public function atualizar($arry){
        $produto = new produtoDAO();
        return $produto->update($arry);
    }
    
    //Atualizar dados
   // public function atualizar($id){
     //   $produto = new produtoDAO();
      //  return $produto->update($id);
//    }
    //Atualizar dados
    
    public function buscarProduto($id){
        $produto = new produtoDAO();
        return $produto->getId($id);
    }
}