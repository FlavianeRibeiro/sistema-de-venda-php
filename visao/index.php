<!DOCTYPE html>
<html lang="pt-br">

  <?php
    include'vendor/styler.php'; 
    require_once '../controle/produtoController.php';
    $produto = new produtoController();
    
    session_start();
    if(isset($_SESSION["idPessoa"])){
  	  	$idPessoa = $_SESSION["idPessoa"];
  	    $nomePessoa = $_SESSION["nomePessoa"];
  	    $categoria = $_SESSION["categoria"];
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
              <a class="nav-link js-scroll-trigger" href="carrinho.php" >
                  <i class="fa fa-cart-plus" style="font-size:24px;"></i>
              </a>
            </li>
            <?php 
            if($idPessoa != ""){ 
                if($categoria == "vendedor"){  ?>
                 <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="cad_produto.php?acao=cadastraProduto">Cadastrar Produto</a>
                </li>
            <?php } ?>
            <li class="dropdown open">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                    <i class="fa fa-user fa-fw" style="font-size:24px; padding: 8px 10px;"></i> 
                    <?php echo $nomePessoa ?>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li> -->
                    <li>
                      <a href="login.php?acao=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
            <?php }else { ?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
            </li>
          <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

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
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="lista-produto.php?op=1">Ver mais</a>
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
                  echo ' <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                        <div class="card card-inverse card-info">
                            <div class="card-block">
                                <img class="card-img-top" src="img/'.$myproduto['img'].'.jpg">
                                <h4 class="card-title">'.$myproduto['nomeproduto'].'</h4>
                                <div class="card-text">
                                  <b><div style="font-size: 13px;">Descrição:</b> '.$myproduto['descricao'].'</div>
                                  <br><b>Preço:</b> '.$myproduto['valor'].'
                                </div>
                                <a href="verProduto.php?op='.$myproduto['id'].'">ver mais ...</a>
                            </div>
                            <div class="card-footer">
                              <a type="button" href="carrinho.php?acao=add&codigo='.$myproduto['codigo'].'" class="btn btn-primary btn-md" ><i class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                    </div>';
                 } ?>
            </div>
        </div>
  
      </div>
    </section>
    <section class="bg-dark text-white" >
        <div class="container">
          <div class="row">
              <div class="col-md-3">
                  <a href="lista-produto.php?op=3">Jeans</a>
              </div>
              <div class="col-md-3">
                  <a href="lista-produto.php?op=4">Acessorio</a>
              </div>
              <div class="col-md-3">
                  </h4><a href="lista-produto.php?op=5">Blusa</a>
              </div>
          </div>
          <div class="row">
             <div class="col-md-3">
                <a href="lista-produto.php?op=6">Camisetas</a>
              </div>
              <div class="col-md-3">
                  <a href="lista-produto.php?op=7">Sapatos</a>
              </div>
              <div class="col-md-3">
                <a href="lista-produto.php?op=8">Vestidos</a>
              </div>
          </div>
        </div>
    </section>
  </body>
</html>
