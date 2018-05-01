<?php
include '../persistencia/Banco.php';
include 'Pessoa.php';

class Cliente extends Pessoa{
    private $id = '';
    private $idPessoa = '';
    private $endereco = '';
    
    /*----------------------------
             construtor 
    ----------------------------
    function __construct(){
    }*/
    
    public function clienteDetails($nome, $cpf,$telefone, $endereco){
        parent::setNome($nome);
        parent::setCPF($cfp);
        parent::setTelefone($telefone);
        self::setTelefone($endereco);
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