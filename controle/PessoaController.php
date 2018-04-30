<?php 
require_once '../persistencia/PessoaDAO.php';
class PessoaController {

    public function login($pessoa){
        return $pessoa->login($pessoa);
    }
}