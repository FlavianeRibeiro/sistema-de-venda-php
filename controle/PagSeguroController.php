<?php 
require_once '../persistencia/PagSeguroDAO.php';

class PagSeguroController {

    //Salvando venda do produto
    public function salvar($itemVenda){
     return $itemVenda->save($itemVenda);
    }
    
    //Buscar dados
     public function salvar(){
       $venda = new PagSeguroDAO();
        return $venda->getAll();
     }

}