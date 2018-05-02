<?php 
require_once '../persistencia/VendaDAO.php';

class VendaController {

    //Salvando venda do produto
    public function salvar($venda){
      $result = $venda->save_venda($venda);
      
      while($vendaDB = $result->fetch_array(MYSQLI_ASSOC)){
          return $vendaDB['id'];
      }
      return "";
    }
    
    //Buscar dados
     public function buscarTodos(){
       $venda = new vendaDAO();
        return $venda->getAll();
    }
}