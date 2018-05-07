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
     
     //Lista de venda cliente 
     public function listagemVendasClientes($id){
       $venda = new ItemVendaDAO();
       //echo "venda".$id;
       return $venda->getListagemCliente($id);
     }
     
     //Lista de venda vendedor
     public function listagemVendasVendedor($id){
       $venda = new ItemVendaDAO();
       //echo "venda".$id;
       return $venda->getListagemVendedor($id);
     }
}