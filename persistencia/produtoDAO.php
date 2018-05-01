<?php
include 'Banco.php';
include '../modelo/produto.php';
class produtoDAO{
    private $id = '';
    private $codigo = '';
    private $nomeproduto = '';
    private $valor = '';
    private $estoque = '';
    private $tipo = '';
    private $img = '';
    private $descricao = '';
    
    /*----------------------------
        PESISTENCIA 
    ----------------------------*/    
    public function salvarProduto($array) {
         $sql ='INSERT INTO `sistema_mer`.`produto`(`codigo`, `nomeproduto`, `valor`, `estoque`, `img`, `descricao`, `tipo`) 
                VALUES ('.$array[0].',
                        "'.$array[1].'",
                        '.$array[2].',
                        '.$array[3].',
                        "'.$array[4].'",
                        "'.$array[5].'",
                        "'.$array[6].'")';
        if (!$sql) {
            die('Invalid query: ' . mysql_error());
        }          
        
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        
        $res = mysqli_query($link, $sql);
        if ($res)
        	return "success";
        else
        	return "Erro ao salvar Produto";
    }
    
    public function update($arrayAtualizado){
        $sql ='UPDATE `produto` SET 
             `nomeproduto`="'.$arrayAtualizado[1].'",
            `valor`='.$arrayAtualizado[2].', `estoque`='.$arrayAtualizado[3].',
            `img`="'.$arrayAtualizado[4].'", `descricao`="'.$arrayAtualizado[5].'",
            `tipo`="'.$arrayAtualizado[6].'"  where  `codigo` = '.$arrayAtualizado[0];
            
        $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
        return mysqli_query($link, $sql);
    }
    
    public function getAll(){
        $sql = "SELECT * FROM `sistema_mer`.`produto`";
        return mysql_query($sql);
    }
    
    public function getTipos($tipo){
        $sql = 'SELECT * FROM `sistema_mer`.`produto` WHERE `tipo` ="'.$tipo.'"';
        return mysql_query($sql);
    }
    public function getId($id){
        $sql = 'SELECT * FROM `sistema_mer`.`produto` WHERE `id` = '.$id;
        return mysql_query($sql);
    }
        public function getCodigo($codigo){
        $sql = 'SELECT * FROM `sistema_mer`.`produto` WHERE `codigo` = '.$codigo;
        return mysql_query($sql);
    }
}
?>