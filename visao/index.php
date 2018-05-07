<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>

  <?php
    include'vendor/styler.php'; 
    require_once '../controle/ProdutoController.php';
    $produto = new ProdutoController();
    
    session_start();
    if(isset($_SESSION["idPessoa"])){
  	  	$idPessoa = $_SESSION["idPessoa"];
  	    $nomePessoa = $_SESSION["nomePessoa"];
  	    $categoria = $_SESSION["categoria"];
  	}
  	
  	header("Content-type: text/html;charset=utf-8");
	
  ?>
  <body id="page-top">
    
    <!-- Navigation -->
    <?php include 'vendor/menu.php';?>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Venha conferir nossas promoções</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="listaProdutos.php?op=1">Ver mais</a>
          </div>
        </div>
      </div>
    </header>


    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">CONHEÇA NOSSOS PRODUTOS</h2>
            <hr class="my-4">
          </div>
        </div>
        <div class="row">
            <?php $listaDeProduto = $produto->listarTodas();?>
            <div class="row">
                 <?php  while ($myproduto = mysql_fetch_array($listaDeProduto)){ 
                 //var_dump($myproduto)?>
                    <div class="col-md-2">
                              <div class="card card-inverse card-info">
                                  <h4 class="card-title" style="margin-top:8px;text-align:center;"><?php echo utf8_decode($myproduto['nomeproduto']); ?> </h4>
                                  <div class="card-block">
                                      <img src="img/<?php echo $myproduto['img']; ?>" style="width:100%;">
                                     
                                      <div class="card-text">
                                          <a href="verProduto.php?op=<?php echo $myproduto['id']; ?>">ver mais...</a>
                                          <br>Preço: <?php echo $myproduto['valor']; ?>
                                      </div>
                                  </div>
                                  <div class="card-footer">
                                    <?php if($myproduto['estoque']){ ?>
                                      <a href="carrinho.php?acao=add&codigo=<?php echo $myproduto['codigo']; ?>" class="btn btn-info btn-md" style="font-size:10px"><i class="fa fa-cart-plus"></i> add no carrinho</a>
                                    <?php }else{?>
                                      <a href="carrinho.php" class="btn btn-info btn-md disabled" style="font-size:10px" aria-disabled="true"><i class="fa fa-cart-plus"></i> add no carrinho</a>
                                    <?php } ?>
                                  </div>
                              </div>
                          </div>
                <?php } ?>
              </div>
        </div>
  
      </div>
    </section>
    <section class="bg-dark text-white" >
        <div class="container">
          <div class="row">
              <div class="col-md-3">
                  <a href="listaProdutos.php?op=3">Suspense</a>
              </div>
              <div class="col-md-3">
                  <a href="listaProdutos.php?op=4">Ficção Ciêntifica</a>
              </div>
              <div class="col-md-3">
                  </h4><a href="listaProdutos.php?op=5">Romance</a>
              </div>
          </div>
          <div class="row">
             <div class="col-md-3">
                <a href="listaProdutos.php?op=6">HQ</a>
              </div>
              <div class="col-md-3">
                  <a href="listaProdutos.php?op=7">Religioso</a>
              </div>
              <div class="col-md-3">
                <a href="listaProdutos.php?op=8">Historia</a>
              </div>
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
