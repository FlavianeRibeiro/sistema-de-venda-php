<!DOCTYPE html>
<html lang="en">
    <?php include 'vendor/styler.php'; 
        require_once '../controle/produtoController.php';
        $produto = new produtoController();
      if (isset($_GET['op'])){
        $id = $_GET['op'];
        $produtoId = $produto->buscarProduto($id);
      }
    ?>
  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">LOJA JFT</a>
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
                <a class="nav-link js-scroll-trigger" href="cad_produto.php?acao=cadastraProduto">Cadastrar Produto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
              </li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br>
     <?php 
        $myProduto = mysql_fetch_array($produtoId);
     ?>
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading"><?php  echo $myProduto['nomeproduto']; ?></h2>
            <hr class="my-4">
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
                <div class="card card-inverse card-info">
                    <img class="card-img-top" src="img/<?php echo $myProduto['img'];?>.jpg">
                </div>
            </div>
           <div class="col-md-4">
                <div class="card card-inverse card-info">
                    <div class="card-block">
                        <div class="card-text">
                            <b>Descrição:</b> <?php echo $myProduto['descricao']; ?>
                            <br><b>Preço:</b> <?php echo $myProduto['valor']; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-md"><i class="fa fa-cart-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
  </body>
</html>
