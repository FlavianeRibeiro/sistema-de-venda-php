<?php
include 'Banco.php';

class PessoaDAO{
    private $id = '';
    private $nome = '';
    private $cpf = '';
    private $telefone = '';
    
    public function save($pessoa){
        return mysql_query("INSERT INTO `pessoa`(`nome`, `cpf`, `telefone`) 
        VALUES ('$pessoa->nome','$pessoa->cpf','$pessoa->telefone')");
    }
    
    public function update($pessoa){
        return mysql_query($link,
        "UPDATE `venda` SET 
        `nome`='$pessoa->nome',
        `cpf`='$pessoa->cpf',
        `telefone`='$pessoa->telefone' 
        WHERE `id` = '$pessoa->id'");
    }
    
    public function getAll(){
        return mysql_query($link, "SELECT * FROM `pessoa`");
    }
    
    public function login($pessoa){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
	    //return "SELECT 1 FROM `pessoa` where `nome`='$pessoa->nome' and `cpf`='$pessoa->cpf'";
        return mysqli_query($link, "SELECT 1 FROM `pessoa` where `nome`='$pessoa->nome' and `cpf`='$pessoa->cpf'");
        
    }
    
    /** Getters e Setters **/
    public function getId(){  return $this->$id; }
    public function setId($id){ $this->id = $id; }
    
    public function getNome(){  return $this->$nome; }
    public function setNome($nome){ $this->nome = $nome; }
    
    public function getCpf(){  return $this->$cpf; }
    public function setCpf($cpf){ $this->cpf = $cpf; }
    
    public function getTelefone(){  return $this->$telefone; }
    public function setTelefone($telefone){ $this->telefone = $telefone; }
}
?>