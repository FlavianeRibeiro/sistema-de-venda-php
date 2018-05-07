<?php 
require_once '../persistencia/CompraDAO.php';
class CompraController {
    
    //Salvando cadastro de Fornecedor
    public function salvar($fornecedor){
      $fornecedor->save($fornecedor);
      header('Location: listarFornecedores.php?msg=inserido');
    }
    
    public function atualizar($fornecedor){
      $fornecedor->update($fornecedor);
      //header('Location: listarFornecedores.php?msg=atualizado');
    }
    
    public function deletar($fornecedor){
      $fornecedor->delet($fornecedor);
    }
    
    //Obtendo todos os Fornecedores
    public function obterTodasCompras(){
      $compra = new CompraDAO();
      return $compra->getAll();
    }
    
    //Obtendo fornecedor por Id
    public function obterFornecedor($fornecedor){
      return $fornecedor->getById($fornecedor);
    }
    
}