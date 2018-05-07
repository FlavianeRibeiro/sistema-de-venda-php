<?php 
require_once '../persistencia/ClienteDAO.php';
require_once '../persistencia/PessoaDAO.php';

class ClienteController {

    public function save($cliente){
        //verifica se já possui pessoa com mesmo cpf
         $result = $cliente->getPessoaByCpf($cliente);
        
        //se retornar algo é pq existe
        if (mysqli_num_rows($result) > 0) {
            return "Já existe uma conta com este CPF";
        }else{
        
            //se não existe pode cadastrar pessoa e retornar registro cadastrado
            $result = $cliente->savePessoa($cliente);
            
            //da pessoa cadastrada obtem id para realizar cadastro de Cliente
            while($pessoa = $result->fetch_array(MYSQLI_ASSOC)){
                $cliente->setIdPessoa($pessoa['id']);
                return $cliente->saveCliente($cliente);
            }
        }
    }
    
    public function obterClientePorId($id){
        $cliente = new ClienteDAO();
        return $cliente->getById($id);
    }
}