<?php 
require_once '../persistencia/PessoaDAO.php';
class PessoaController {

    public function login($pessoa){
        $result = $pessoa->login($pessoa);
        
         if (mysqli_num_rows($result) > 0) {
             while($pessoa = $result->fetch_array(MYSQLI_ASSOC)){
                
                session_start();
            		$_SESSION["idPessoa"] = $pessoa['id'];
            		$_SESSION["nomePessoa"]	= $pessoa['nome'];
            		$_SESSION["categoria"]	= $pessoa['categoria'];
                   
                header('Location: index.php');
                    
            }
        }else{
          return "Login Invalido!!";   
        }
        
    }
}