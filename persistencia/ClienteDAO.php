<?php
include 'Banco.php';
require_once '../persistencia/PessoaDAO.php';

class ClienteDAO extends PessoaDAO{
    private $id = '';
    private $idPessoa = '';
    private $endereco = '';
    
    public function saveCliente($cliente){
        //echo "INSERT INTO `cliente`( `idPessoa`, `endereco`) VALUES ('$cliente->idPessoa','$cliente->endereco')";
       
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        mysqli_query($link, "INSERT INTO `cliente`( `idPessoa`, `endereco`) VALUES ('$cliente->idPessoa','$cliente->endereco')");
        
        return "sucessoCliente";
    }
    
    
    public function getById($id){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        $sql = "SELECT `pessoa`.`id`, `nome`, `cpf`, `telefone`, `endereco`
                FROM `cliente`
                INNER JOIN `pessoa` ON `pessoa`.`id`=`cliente`.`idPessoa`
                WHERE `pessoa`.`id`='$id'";
        //echo $sql;
        return mysqli_query($link, $sql);
    }
    
    
    /*----------------------------
        Getters e Setters 
    ----------------------------*/
    //ID
    public function getId(){
        return $this->$id;
    }
    public function setId($id){
        $this->id = $id;
    }
    
    //Id Pessoa
    public function getIdPessoa(){
        return $this->$idPessoa;
    }
    public function setIdPessoa($idPessoa){
        $this->idPessoa = $idPessoa;
    }
    
    //Endereço
    public function getEndereco(){
        
        return $this->$endereco;
    }
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    
}
?>