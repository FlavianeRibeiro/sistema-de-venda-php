<!DOCTYPE html>
<html lang="pt-br">
  <?php 
    include'vendor/styler.php'; 
    
    require_once '../controle/produtoController.php';
    $produto = new produtoController();
    
    if (isset($_GET['op'])){
      switch ($_GET['op']){
                case 1:
                    $Tipo = "Promocao";
                    $Titulo = "Roupas na Promoção";
                break;
                case 2:
                    $Tipo = "Limitadas";
                    $Titulo = "Queima de Estoque";
                break;
                case 3:
                    $Tipo = "Jeans";
                    $Titulo = "Roupas Jeans";
                break;
                case 4:
                    $Tipo = "Acessorio";
                    $Titulo = "Confira nossos Acessorio";
                break;
                case 5:
                    $Tipo = "Blusa";
                    $Titulo = "Blusas para curtir a noite";
                break;
                case 6:
                    $Tipo = "Camisetas";
                    $Titulo = "Confira nosso estoque de Camisetas";
                break;
                case 7:
                    $Tipo = "Sapatos";
                    $Titulo = "Sapatos maavilhosos";
                break;
                case 8:
                    $Tipo = "Vestidos";
                    $Titulo = "Vestidos para noite social";
                break;
            }
    }
  ?>
  
  <body id="page-top">
    <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
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
                          <a class="nav-link js-scroll-trigger" href="lista">PROMOÇAO</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link js-scroll-trigger" href="#portfolio">PEÇAS LIMITADAS</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link js-scroll-trigger" href="#contact">Login</a>
                      </li>
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
                      <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Ver mais</a>
                  </div>
              </div>
          </div>
      </header>
    
    <section id="contact">
        <div class="container">
           <div class="row">
              <div class="col-lg-12 text-center">
                  <h2 class="section-heading"><?php echo $Titulo; ?></h2>
                  <hr class="my-4">
              </div>
            </div>
            <?php $listaDeProduto = $produto->listarTipos($Tipo); ?>
            <div class="row">
               <?php  while ($myproduto = mysql_fetch_array($listaDeProduto)){ 
                  echo ' <div class="col-md-3">
                        <div class="card card-inverse card-info">
                            <div class="card-block">
                                <img class="card-img-top" src="img/'.$myproduto['img'].'.jpg">
                                <h4 class="card-title">'.$myproduto['nomeproduto'].'</h4>
                                <div class="card-text">
                                   Quantidade: '.$myproduto['estoque'].'
                                    <br>Preço: '.$myproduto['valor'].'
                                </div>
                            </div>
                            <div class="card-footer">
                              <button class="btn btn-primary btn-md"><i class="fa fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>';
                 } ?>
            </div>
        </div>
    </section>
  </body>
</html>
