<!DOCTYPE html>
<html lang="pt-br">

  <?php
    include'vendor/styler.php'; 
    require_once '../controle/vendedorController.php';
    require_once '../modelo/vendedor.php';
    $produtoController = new produtoController();
    $vendedor = new vendedor();
    $action = 'cadastraVededor';
     if (isset($_GET['acao'])){
         $acao = $_GET['acao'];
        if($acao == "cadastraProduto"){
        
        	$vendedor->setCodigo($_POST['nome']);      $vendedor->setNomeproduto($_POST['nomeproduto']);
        	$vendedor->setValor($_POST['valor']);        $vendedor->setEstoque($_POST['estoque']);
        	$vendedor->setTipo($_POST['tipo']);          $vendedor->setImg($_POST['img']);           
          echo '<br><br><br><br><br> entrou' ;
          echo 'produto : ';var_dump($vendedor);
          $resposta = $vendedorController->salvar($vendedor);
          
          if(!$resposta){
            echo '<div class="alert alert-danger" role="alert">
                    This is a danger alert—check it out!
                  </div>';
          }else {
            echo '<div class="alert alert-success" role="alert">
                    Produto Cadastrado com Sucesso
                  </div>';
          }
        }
     }
    
  ?>
  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">LOJA JFT</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">INICIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="lista-produto.php?op=1">PROMOÇAO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="lista-produto.php?op=2">PEÇAS LIMITADAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <br><br>
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Cadastro de Vendedor</h2>
            <hr class="my-4">
          </div>
        </div>
        <div style="">
            <form action="<?php $SELF_PHP;?>?acao=<?php echo $action;?>" method="POST">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <label for="nomeproduto">Nome do Vendedor:</label>
                        <input type="text" class="form-control" name="nomeproduto" id="nomeproduto">
                    </div>
                </div>
               <div class="row">
                   <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <label for="valor">CPF:</label>
                        <input type="text" class="form-control" name="valor" id="valor">
                    </div>
                    <div class="col-md-2">
                        <label for="estoque">Telefone:</label>
                        <input type="text" class="form-control" name="estoque" id="estoque">
                    </div>
               </div>
               <div class="row">
                    <div class="col-md-2"></div>
                       <div class="col-md-8">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="3"></textarea>
                       </div>
                    </div>
                </div>
              <br>
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </section>
  </body>
</html>



            
            