<!DOCTYPE html>
<html lang="pt-br">
  <header>
     <script>
      $(document).ready(function () {
          $("#flash-msg").delay(3000).fadeOut("slow");
      });
    </script>
  </header>
  
  <?php
    include'vendor/styler.php'; 
    require_once '../controle/FornecedorController.php';
    require_once '../persistencia/FornecedorDAO.php';
    $fornecedorController = new FornecedorController();
    $fornecedor = new FornecedorDAO();
    
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
    
    
    $action = 'cadastraFornecedor';
    if(isset($_GET['codigo'])){
      $codigo = $_GET['codigo'];
      $action = 'atualizarFornecedor&codigo='.$codigo;
      $fornecedor->setId($codigo);
    }
    
     if (isset($_GET['acao'])){
         $acao = $_GET['acao'];
        if($acao == "cadastraFornecedor"){
        
        	$fornecedor->setCnpj($_POST['cnpj']);
        	$fornecedor->setRazaoSocial($_POST['razaoSocial']); 
        	$fornecedor->setEndereco($_POST['endereco']);
          $resposta = $fornecedorController->salvar($fornecedor);
          //var_dump($resposta);
          if(!$resposta){
            echo '<br><div class="alert alert-danger" role="alert">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    Occorreu algum erro!!
                  </div>';
          }
        }else if($acao == "atualizarFornecedor"){
         // echo $_POST['cnpj'];
          $fornecedor->setCnpj($_POST['cnpj']);
        	$fornecedor->setRazaoSocial($_POST['razaoSocial']); 
        	$fornecedor->setEndereco($_POST['endereco']);
        	$fornecedor->setId($_GET['codigo']);
          $resposta = $fornecedorController->atualizar($fornecedor);
          if(!$resposta){
            echo '<br><div class="alert alert-danger" role="alert">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    Occorreu algum erro!!
                  </div>';
          }
        }
     }else{
       $result = $fornecedorController->obterFornecedor($fornecedor);
        while($fornecedor = $result->fetch_array(MYSQLI_ASSOC)){
            $codigo = $fornecedor['id'];
        		$razaoSocial = $fornecedor['razaoSocial'];
        		$endereco	= $fornecedor['endereco'];
        		$cnpj	= $fornecedor['cnpj'];
        }
     }
  ?>
  <body id="page-top">
    <!-- Navigation -->
    <?php include 'vendor/menu.php';?>
    
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Cadastro de Fornecedor</h2>
            <hr class="my-4">
          </div>
        </div>
        <div style="">
            <form action="<?php $SELF_PHP;?>?acao=<?php echo $action;?>" method="POST">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label for="razaoSocial">Razão Social:</label>
                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $codigo;?>">
                        <input type="text" class="form-control" name="razaoSocial" id="razaoSocial" value="<?php echo $razaoSocial;?>">
                    </div>
                </div>
                <div class="row">
                   <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label for="cnpj">CNPJ:</label>
                        <input type="text" class="form-control" name="cnpj" id="cnpj" value="<?php echo $cnpj;?>">
                    </div>
               </div>
              <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label for="endereco">Endereço:</label>
                        <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $endereco;?>">
                    </div>
                </div>
              <br>
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                  <a href="listarFornecedores.php" class="btn btn-info">Voltar</a>
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



            
            