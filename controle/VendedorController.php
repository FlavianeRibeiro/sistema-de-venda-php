<?php 
require_once '../persistencia/VendedorDAO.php';

class VendedorController {

    //Salvando cadastro do produto
     public function salvar($vendedor){
        return $vendedor->save($vendedor);
    }
    
}