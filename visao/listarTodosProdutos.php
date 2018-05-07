<!DOCTYPE html>
<html lang="pt-br">
  <?php 
    include'vendor/styler.php';
    require_once '../controle/ProdutoController.php';
    $produto = new ProdutoController();
    
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
  ?>
  
  <body id="page-top">
    <!-- Navigation -->
    <?php include 'vendor/menu.php';?>
    
    <section id="contact">
        <div class="container">
           <div class="row">
              <div class="col-lg-12 text-center">
                  <h2 class="section-heading">Lista de todo os produto</h2>
                  <hr class="my-4">
              </div>
            </div>
            <?php $listaDeProduto = $produto->listarTodas() ?>
            <div class="row">
               <?php  while ($myproduto = mysql_fetch_array($listaDeProduto)){ 
                  echo ' <div class="col-md-2">
                            <div class="card card-inverse card-info" style="margin-bottom: 10px;">
                                <h4 class="card-title" style="margin-top:8px;text-align:center;">
                                    '.$myproduto['nomeproduto'].' 
                                    <a href="cad_produto.php?acao=editar&Id='.$myproduto["id"].'" ><i class="fa fa-edit"></i></a>
                                </h4>
                                
                                <div class="card-block">
                                    <img class="card-img-top" src="img/'.$myproduto['img'].'" style="margin-bottom: 7px;">
                                   
                                    <div class="card-text" styler="font-size: 13px !important;">
                                       Quantidade: '.$myproduto['estoque'].'
                                        <br>Preço: '.$myproduto['valor'].'
                                    </div>
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
