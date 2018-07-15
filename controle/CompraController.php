<?php 
require_once '../persistencia/CompraDAO.php';
class CompraController {
    
    //Salvando cadastro de Fornecedor
    public function salvar($compraProduto){
      $compra = new CompraDAO();
      return $compra->save_Compra($compraProduto);
    }

    //Obtendo todos de compra
    public function obterTodasCompras(){
      $compra = new CompraDAO();
      return $compra->getAll();
    }
    
    public function buscarDados(){
      $compra = new CompraDAO();
      return $compra->buscardados();
    }
}