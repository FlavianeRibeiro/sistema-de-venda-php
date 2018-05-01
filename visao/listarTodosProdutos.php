<!DOCTYPE html>
<html lang="pt-br">
  <?php 
    include'vendor/styler.php';
    require_once '../controle/produtoController.php';
    $produto = new produtoController();
    
    include 'vendor/menuFuncionario.php';
  ?>
  
  <body id="page-top">
    <!-- Navigation -->
    <br/>
    
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
                               <a href="cad_produto.php?acao=editar&Id='.$myproduto["id"].'"><i class="fa fa-edit"></i></a>
                            </div>
                        </div>
                    </div>';
                 } ?>
            </div>
        </div>
    </section>
  </body>
</html>
