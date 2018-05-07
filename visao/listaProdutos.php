<!DOCTYPE html>
<html lang="pt-br">
  <?php 
    include'vendor/styler.php'; 
    require_once '../controle/ProdutoController.php';
    $produto = new produtoController();
    
    if (isset($_GET['op'])){
      switch ($_GET['op']){
                case 1:
                    $Tipo = "Promocao";
                    $Titulo = "Livros em Promoções";
                break;
                case 2:
                    $Tipo = "Limitadas";
                    $Titulo = "Livros Limitados";
                break;
                case 3:
                    $Tipo = "Suspense";
                    $Titulo = "Livros de Suspenses";
                break;
                case 4:
                    $Tipo = "FiccaoCientifica";
                    $Titulo = "Livros de Ficção Ciêntifica";
                break;
                case 5:
                    $Tipo = "Romance";
                    $Titulo = "Livros de Romance";
                break;
                case 6:
                    $Tipo = "HQ";
                    $Titulo = "Livros de HQ";
                break;
                case 7:
                    $Tipo = "Religioso";
                    $Titulo = "Livros Religioso";
                break;
                case 8:
                    $Tipo = "Historias";
                    $Titulo = "Livros de Historias";
                break;
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
                  <h2 class="section-heading"><?php echo $Titulo; ?></h2>
                  <hr class="my-4">
              </div>
            </div>
            <?php $listaDeProduto = $produto->listarTipos($Tipo); ?>
            <div class="row">
               <?php  while ($myproduto = mysql_fetch_array($listaDeProduto)){ 
                  echo ' <div class="col-md-2">
                        <div class="card card-inverse card-info">
                         <h4 class="card-title">'.$myproduto['nomeproduto'].'</h4>
                            <div class="card-block">
                                <img class="card-img-top" src="img/'.$myproduto['img'].'">
                               
                                <div class="card-text">
                                   Quantidade: '.$myproduto['estoque'].'
                                    <br>Preço: '.$myproduto['valor'].'
                                </div>
                            </div>
                            <div class="card-footer" style="text-align:  center;">
                             <a href="carrinho.php?acao=add&codigo='.$myproduto['codigo'].'" class="btn btn-info btn-md" style="font-size:10px"><i class="fa fa-cart-plus"></i> add no carrinho</a>
                            </div>
                        </div>
                    </div>';
                 } ?>
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
