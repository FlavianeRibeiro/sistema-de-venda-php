<?php 
require_once '../persistencia/ItemVendaDAO.php';

class ItemVendaController {

    //Salvando venda do produto
    public function salvar($itemVenda){
     return $itemVenda->save($itemVenda);
    }
    
    //Buscar dados
     public function buscarTodos(){
       $venda = new ItemVendaDAO();
        return $venda->getAll();
    }
}