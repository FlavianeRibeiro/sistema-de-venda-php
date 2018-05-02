<?php
include 'Banco.php';

class PessoaDAO{
    private $id = '';
    private $nome = '';
    private $cpf = '';
    private $telefone = '';
    
    public function savePessoa($pessoa){
        //echo "INSERT INTO `pessoa`(`nome`, `cpf`, `telefone`) VALUES ('$pessoa->nome','$pessoa->cpf','$pessoa->telefone')";
        
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        mysqli_query($link, "INSERT INTO `pessoa`(`nome`, `cpf`, `telefone`) 
        VALUES ('$pessoa->nome',$pessoa->cpf,'$pessoa->telefone')");
        
        return $this->getPessoaByCpf($pessoa);
    }
    
    public function getPessoaByCpf($pessoa){
        //echo "select `id`, `nome`, `cpf`, `telefone` from `pessoa` where `cpf`='$pessoa->cpf'";
        
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        return mysqli_query($link, "select `id`, `nome`, `cpf`, `telefone` from `pessoa` where `cpf`='$pessoa->cpf'");
    }
    
    public function update($pessoa){
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        return mysqli_query($link,
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
        
        return mysqli_query($link, 
            "SELECT p.`id`, `nome`, 'vendedor' as categoria FROM `pessoa` p
                inner join `vendedor` v on v.idPessoa = p.id
                where `nome`='$pessoa->nome' and `cpf`='$pessoa->cpf'
            union  
            SELECT p.`id`, `nome`, 'cliente' as categoria FROM `pessoa` p
                inner join `cliente` c on c.idPessoa = p.id
                where `nome`='$pessoa->nome' and `cpf`='$pessoa->cpf'");
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