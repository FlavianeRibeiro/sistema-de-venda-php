<?php 
require_once '../persistencia/itemCompraDAO.php';

class itemCompraController {
      public function buscarProdutosDeFornecedor($idFornecedor,$idProduto){
          $venda = new ItemCompraDAO();
          return $venda->getBuscaProduto($idFornecedor,$idProduto);
      }
      
      public function savar_itemcompra($itemVenda){
          $venda = new ItemCompraDAO();
          return $venda->save($itemVenda);
      }
}