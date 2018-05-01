<?php 
require_once '../persistencia/ClienteDAO.php';
require_once '../persistencia/PessoaDAO.php';

class ClienteController {

    public function save($cliente){
         $result = $cliente->getPessoaByCpf($cliente);
        
        if (mysqli_num_rows($result) > 0) {
            return "Já existe uma conta com este CPF";
        }else{
        
            $result = $cliente->savePessoa($cliente);
            
            
            while($pessoa = $result->fetch_array(MYSQLI_ASSOC)){
                $cliente->setIdPessoa($pessoa['id']);
                return $cliente->saveCliente($cliente);
            }
        }
    }
}