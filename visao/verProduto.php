<!DOCTYPE html>
<html lang="en">
    <?php include 'vendor/styler.php'; 
        require_once '../controle/ProdutoController.php';
        
        $produto = new ProdutoController();
      if (isset($_GET['op'])){
        $id = $_GET['op'];
        $produtoId = $produto->buscarProduto($id);
        $myProduto = mysql_fetch_array($produtoId);
        $permissao=''; $var = '';
      }
    ?>
  <body id="page-top">
    
    <!-- Navigation -->
    <?php include 'vendor/menu.php';?>
    <br><br><br>
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading"><?php  echo $myProduto['nomeproduto']; ?></h2>
            <hr class="my-4">
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
             <?php
                 if($myProduto['estoque'] == 0){
                      echo '<div class="alert alert-danger" role="alert">
                                <i class="fa fa-exclamation-triangle"></i> Produto em falta!
                            </div>';
                      $permissao='disabled'; $var = 'aria-disabled="true"';
                  }elseif (($myProduto['estoque'] < 10)){
                      echo '<div class="alert alert-warning" role="alert">
                                <i class="fa fa-info-circle"></i> Garanta o seu, poucas unidades no estoque!
                            </div>';
                  }elseif($myProduto['estoque'] > 11 ){
                      echo '<div class="alert alert-primary" role="alert">
                                <i class="fa fa-shopping-cart"></i> Boas Compras!
                            </div>';
                  }
              ?>
          </div>
          <div class="col-md-1"></div>
        </div>
       
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-6">
                <div class="card card-inverse card-info">
                    <img class="card-img-top" src="img/<?php echo $myProduto['img'];?>">
                </div>
            </div>
           <div class="col-md-4">
                <div class="card card-inverse card-info">
                    <div class="card-block">
                        <div class="card-text">
                            <b>Código do produto:</b> <?php echo $myProduto['codigo']; ?><br>
                            <b>Descrição:</b> <?php echo $myProduto['descricao']; ?><br><br>
                            <p>A partir de:</p>
                            <b><h5>Preço: <?php echo number_format($myProduto['valor'], 2, ',', '.'); ?></h5></b><p>
                        </div>
                    </div>
                    <div class="card-footer" style="font-size: 14px;text-align: center;">
                        <a class="btn btn-info <?php echo $permissao?>" role="button" href="carrinho.php?acao=add&codigo=<?php echo $myProduto['codigo']; ?>" <?php echo $var;?>><i class="fa fa-cart-plus"></i> Addicionar carrinho</a>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
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
