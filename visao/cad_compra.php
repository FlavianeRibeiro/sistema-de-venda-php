<!DOCTYPE html>
<html lang="pt-br">

  <?php
    include'vendor/styler.php'; 
    require_once '../controle/ProdutoController.php';
    require_once '../controle/FornecedorController.php';
    require_once '../controle/CompraController.php';
    require_once '../persistencia/CompraDAO.php';
    $compraController = new CompraController();
    $produtoController = new ProdutoController();
    $fornecedorController = new FornecedorController();
    $compra = new CompraDAO();
    
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
            <form action="<?php $SELF_PHP;?>?acao=<?php echo $action;?>" method="POST" > 
              <div class="form-row">
                <div class="col-md-3"></div>
                <div class="form-group col-md-6">
                  <label for="fornecedor">Fornecedor</label>
                  <select id="fornecedor" class="form-control">
                    <?php 
                    $resultF = $fornecedorController->obterTodosFornecedores();
                    while($fornecedor = $resultF->fetch_array(MYSQLI_ASSOC)){
                      echo "<option>".$fornecedor['razaoSocial']."</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-3"></div>
                <div class="form-group col-md-5">
                  <label for="fornecedor">Produto</label>
                  <select id="fornecedor" class="form-control">
                    <?php 
                    $resultP = $produtoController->listarTodas();
                    while ($myproduto = mysql_fetch_array($resultP)){ 
                      echo "<option>".$myproduto['nomeproduto']."</option>";
                    }
                    ?>
                  </select>
                  <button type="submit" class="btn btn-info">Add</button>
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



            
            