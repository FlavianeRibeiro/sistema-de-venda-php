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
    $action = 'cadastraFornecedor';
     if (isset($_GET['acao'])){
         $acao = $_GET['acao'];
        if($acao == "cadastraFornecedor"){
        
        	$fornecedor->setCnpj($_POST['cnpj']);
        	$fornecedor->setRazaoSocial($_POST['razaoSocial']); 
        	$fornecedor->setEndereco($_POST['endereco']);
          $resposta = $fornecedorController->salvar($fornecedor);
          var_dump($resposta);
          if(!$resposta){
            echo '<br><div class="alert alert-danger" role="alert">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    This is a danger alert—check it out!
                  </div>';
          }else {
            echo '<br><div class="alert alert-success" role="alert">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    Fornecedor Cadastrado com Sucesso
                  </div>';
          }
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
                        <input type="text" class="form-control" name="razaoSocial" id="razaoSocial">
                    </div>
                </div>
                <div class="row">
                   <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label for="cnpj">CNPJ:</label>
                        <input type="text" class="form-control" name="cnpj" id="cnpj">
                    </div>
               </div>
              <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <label for="endereco">Endereço:</label>
                        <input type="text" class="form-control" name="endereco" id="endereco">
                    </div>
                </div>
              <br>
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-4">
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



            
            