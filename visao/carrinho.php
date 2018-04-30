<!DOCTYPE html>
<html lang="pt-br">
  <?php 
    include'vendor/styler.php'; 
    
    require_once '../controle/produtoController.php';
    $produto = new produtoController();
    
    if (isset($_GET['op'])){

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
    <br><br>
     <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Produtos no carrinho</h2>
            <hr class="my-4">
          </div>
        </div>
        <div class="row">
           <div class="col-md-3">
                <div class="card card-inverse card-info">
                    <div class="card-block">
                        <img class="card-img-top" src="img/img1.jpg">
                        <h4 class="card-title">Nome Produto</h4>
                        <div class="card-text">
                           Quantidade: numero
                            <br>Preço: total
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-md"><i class="fa fa-plus"></i></button>
                        <button class="btn btn-primary btn-md"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
  </body>
</html>

