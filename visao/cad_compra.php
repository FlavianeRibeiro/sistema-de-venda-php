<!DOCTYPE html>
<html lang="pt-br">

  <?php
    include'vendor/styler.php'; 
    require_once '../controle/ProdutoController.php';
    require_once '../controle/FornecedorController.php';
    require_once '../controle/itemCompraController.php';
    require_once '../controle/CompraController.php';
    $itemCompra = new itemCompraController();
    $compra = new CompraController();
    $produtoController = new ProdutoController();
    $fornecedorController = new FornecedorController();
    
      $msg = '';
      session_start();
      
      if(isset($_SESSION["idPessoa"])){
  	  	$idPessoa = $_SESSION["idPessoa"];
  	    $nomePessoa = $_SESSION["nomePessoa"];
  	    $categoria = $_SESSION["categoria"];
      }
      else{
        header('Location: login.php');
      }
      $data = date('d/m/y');
      $idProduto = $_GET['idprod'];
      $idFornecedor = $_GET['idFor'];
      $myProduto = $itemCompra->buscarProdutosDeFornecedor($idFornecedor,$idProduto);
     
      if(isset($_GET['acao'])){
        if($_GET['acao'] == 'cadastro'){
            $quantidade = $_POST['quantidade'];
            $produtoController->addQtddEstoque($_GET['id'],$quantidade);
            $myProduto = $itemCompra->buscarProdutosDeFornecedor($_GET['for'],$_GET['id']);
            while($myProdutoFor = $myProduto->fetch_array(MYSQLI_ASSOC)){
              $valor = $myProdutoFor['valor'];
            }
            $total = $valor * $quantidade;
            $data = $today = date("m.d.y"); 
            $compraProduto = array($_GET['for'],$data, $total);
            // SALVANDO
            $salvar = $compra->salvar($compraProduto);
        } 
           
            header('Location: listarCompras.php');
      }
      
      $action = 'cadastro';
  ?>
  
  <body id="page-top">
    <!-- Navigation -->
    <?php include 'vendor/menu.php';?>
    
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Compra de Produtos com Fornecedor</h2>
            <hr class="my-4">
          </div>
        </div>
        <div style="">
            <form action="<?php $SELF_PHP;?>?acao=<?php echo $action;?>&id=<?php echo $idProduto;?>&for=<?php echo $idFornecedor;?>" method="POST" > 
              <div class="form-row">
                <div class="col-md-3">
                </div>
                <div class="form-group col-md-4">
                  
                  <?php 
                      while($myProdutoFor = $myProduto->fetch_array(MYSQLI_ASSOC)){
                        echo "Digite a quantidade de  produto <b>".$myProdutoFor['nomeproduto']."</b> do fornecedor <b>".$myProdutoFor['razaoSocial']."</b> :";
                      }
                  ?>
                </div>
                <div class="col-md-1">
                  <input type='text' name='quantidade' id='quantidade' class='form-control'/>
                </div>
                <div class="col-md-1">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
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