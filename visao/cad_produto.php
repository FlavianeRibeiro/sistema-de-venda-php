<!DOCTYPE html>
<html lang="pt-br">
  <header>
     <script>
      $(document).ready(function () {
          $("#flash-msg").delay(3000).fadeOut("slow");
      });
    </script>
  </header>
<br><br><br>
  <?php
    include'vendor/styler.php'; 
    require_once '../controle/produtoController.php';
    require_once '../controle/vendaController.php';
    require_once '../persistencia/produtoDAO.php';
    require_once '../persistencia/compraDAO.php';
    $produtoController = new produtoController();
    $compraController = new compraController();
    $produto = new produtoDAO();
    $compra = new compraDAO();
    $action = 'cadastraProduto';
    
    session_start();
    	if(isset($_SESSION["idPessoa"])){
	  	$idPessoa = $_SESSION["idPessoa"];
	    $nomePessoa = $_SESSION["nomePessoa"];
	}else{ header('Location: login.php');}

     if (isset($_GET['acao'])){
         $acao = $_GET['acao'];
        if($acao == "cadastraProduto"){
          $titulo = "CADASTRO DE PRODUTO";
          $array = array($_POST['codigo'], $_POST['nomeproduto'], $_POST['valor'], $_POST['estoque'],
              $_POST['img'],$_POST['descricao'],$_POST['tipo']);
              $msg = $produtoController->salvar($array);
              
        }else if($acao == 'AtualizarCadastro'){
          
           $arrayAtualizado = array($_POST['codigo'], $_POST['nomeproduto'], $_POST['valor'], $_POST['estoque'],
              $_POST['img'],$_POST['descricao'],$_POST['tipo']);
              $produto->update($arrayAtualizado);
             header('Location: listarTodosProdutos.php');
        }elseif($acao == "editar"){
              $action = 'AtualizarCadastro';
              $permissao='disabled';
              $id = $_GET['Id'];
              $resposta = $produtoController->buscarProduto($id);
              $myProduto = mysql_fetch_array($resposta);
              $titulo = "EDIÇÃO DO PRODUTO";
              $nomeprocuto = $myProduto['nomeproduto'];
              $codigo = $myProduto['codigo'];
              $valor = $myProduto['valor'];
              $img = $myProduto['img'];
              $estoque = $myProduto['estoque'];
              $descricao = $myProduto['descricao'];
              $img = $myProduto['img'];
              $id = $myProduto['id'];
        }
        
        if($msg == "success"){
            echo '<div class="alert alert-success" role="alert" id="flash-msg">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h6><i class="icon fa fa-check"></i>Produto cadastrado com sucesso</h6>
                  </div>';
        }else if($msg != "" && $_POST['nome'] != ""){
          echo '<div class="alert alert-danger" role="alert" id="flash-msg">
                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                  <h6><i class="icon fa fa-check"></i>'.$msg.'</h6>
                </div>';
        }
     }
    
  ?>
  <body id="page-top">
    <!-- Navigation -->
  <?php include 'vendor/menuFuncionario.php';?>
  <br><br>
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading"><?php echo $titulo; $id;?></h2>
            <hr class="my-4">
          </div>
        </div>
        <div style="">
            <form action="<?php $SELF_PHP;?>?acao=<?php echo $action;?>" method="POST">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <label for="nomeproduto">Nome do Produto:</label>
                        <input type="text" class="form-control" name="nomeproduto" id="nomeproduto" value="<?php echo $nomeprocuto;?>"? required autofocus>
                    </div>
                     <div class="col-md-4">
                        <label for="codigo">Código:</label>
                        <input type="number" min="0" class="form-control" name="codigo" id="codigo" value="<?php echo $codigo;?>">
                    </div>
                </div>
               <div class="row">
                   <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <label for="valor">Valor:</label>
                        <input type="number" min="0" class="form-control" name="valor" id="valor" value="<?php echo $valor;?>">
                    </div>
                    <div class="col-md-2">
                        <label for="estoque">Qtdd. Estoque:</label>
                        <input type="number" min="0" class="form-control" name="estoque" id="estoque" value="<?php echo $estoque;?>">
                    </div>
                     <div class="col-md-3">
                        <label for="tipo">Tipo</label>
                        <select class="form-control" name="tipo" id="tipo">
                            <option value="Jeans">Jeans</option>
                            <option value="Acessorio" <?php if($tipo == 'Acessorio') echo"selected";?>>Acessorio</option>
                            <option value="Promocao" <?php if($tipo == 'Prmocao') echo"selected";?>>Promoção</option>
                            <option value="Limitado" <?php if($tipo == 'Limitado') echo"selected";?>>Limitado</option>
                            <option value="Vestidos"  <?php if($tipo == 'Feminino') echo"selected";?>>Vestidos</option>
                            <option value="Blusas"  <?php if($tipo == 'Vestidos') echo"selected";?>>Blusas</option>
                            <option value="Camisetas"  <?php if($tipo == 'Camisetas') echo"selected";?>>Camisetas</option>
                            <option value="Sapatodos"  <?php if($tipo == 'Sapatodos') echo"selected";?>>Sapatodos</option>
                        </select>
                    </div>
               </div>
               <div class="row">
                  <div class="col-md-2"></div>
               <div class="col-md-8">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="3" value="<?php echo $descricao;?>" ></textarea>
               </div>
               </div>
               <div class="row">
                 <div class="col-md-2"></div>
                <div class="col-md-3">
                    <label for="img">Imagem:</label>
                    <input type="text" class="form-control" id="img" name="img" value="<?php echo $img;?>">
                </div>
                </div>
              <br>
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                  <?php if($acao == "cadastraProduto") { ?>
                      <button type="submit" class="btn btn-primary">Cadastrar</button>
                   <?php }else { ?>
                      <button type="submit" class="btn btn-primary" href="" >Editar</button>
                  <?php } ?>
                </div>
              </div>
            </form>
        </div>
      </div>
    </section>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  </body>
</html>



            
            