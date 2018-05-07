<?php 
require_once '../persistencia/FornecedorDAO.php';
class FornecedorController {
    
    //Salvando cadastro de Fornecedor
    public function salvar($fornecedor){
      $fornecedor->save($fornecedor);
      header('Location: listarFornecedores.php?msg=inserido');
    }
    
    public function atualizar($fornecedor){
      $fornecedor->update($fornecedor);
     // header('Location: listarFornecedores.php?msg=atualizado');
    }
    
    public function deletar($fornecedor){
      $fornecedor->delet($fornecedor);
      //return "excluido";
    }
    
    //Obtendo todos os Fornecedores
    public function obterTodosFornecedores(){
      $fornecedor = new FornecedorDAO();
      return $fornecedor->getAll();
    }
    
    //Obtendo fornecedor por Id
    public function obterFornecedor($fornecedor){
      return $fornecedor->getById($fornecedor);
    }
    
}