<?php 
require_once '../persistencia/vendedorDAO.php';

class produtoController {

    //Salvando cadastro do produto
     public function salvar($vendedor){
        return $vendedor->save($vendedor);
    }
    
}