<?php require_once '../persistencia/ClienteDAO.php';

class ClienteController {
    public function save($cliente){
        echo "PessoaController login";
        return $cliente->save($cliente);
    }
}