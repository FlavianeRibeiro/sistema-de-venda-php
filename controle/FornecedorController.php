<?php 
require_once '../persistencia/FornecedorDAO.php';
class FornecedorController {
    
    //Salvando cadastro de produto
    public function salvar($fornecedor){
      return $fornecedor->save($fornecedor);
    }
    
}