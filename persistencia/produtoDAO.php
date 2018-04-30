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
        return mysql_query($sql);
    }
    
    public function update($produto){
        $sql ='UPDATE `produto` SET 
            `codigo`='.$array[0].', `nomeproduto`="'.$array[1].'",;
            `valor`='.$array[2].', `estoque`='.$array[3].',
            `img`="'.$array[4].'", `descricao`="'.$array[5].'",
            `tipo`="'.$array[6].'"';
        return mysql_query($sql);
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
        $sql = 'SELECT * FROM `sistema_mer`.`produto` WHERE `id` = "'.$id.'"';
        return mysql_query($sql);
    }
}
?>