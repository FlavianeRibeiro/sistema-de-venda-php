<!DOCTYPE html>
<html lang="pt-br">
  <?php 
    include'vendor/styler.php'; 
    
    require_once '../controle/produtoController.php';
    $produtoControlle = new produtoController();
    
      session_start();
      if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }
      //adiciona produto
      if(isset($_GET['acao'])){
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $codigo = intval($_GET['codigo']);
            if(!isset($_SESSION['carrinho'][$codigo])){
               $_SESSION['carrinho'][$codigo] = 1;
            }else{
               $_SESSION['carrinho'][$codigo] += 1;
            }
         }
         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            $codigo = intval($_GET['codigo']);
            if(isset($_SESSION['carrinho'][$codigo])){
               unset($_SESSION['carrinho'][$codigo]);
            }
         }
         //ALTERAR QUANTIDADE
         if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $codigo => $quantidade){
                  $codigo  = intval($codigo);
                  $quantidade = intval($quantidade);
                  if(!empty($quantidade) || $quantidade <> 0){
                     $_SESSION['carrinho'][$codigo] = $quantidade;
                  }else{
                     unset($_SESSION['carrinho'][$codigo]);
                  }
               }
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
    <br><br><br><br>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Produtos no carrinho</h2>
            <hr class="my-4">
          </div>
        </div>
        <div class="row">
          <table style="width:  100%;">
    <caption>Carrinho de Compras</caption>
    <thead >
          <tr>
            <th width="244">Produto</th>
            <th width="79">Quantidade</th>
            <th width="89">Pre&ccedil;o</th>
            <th width="100">SubTotal</th>
            <th width="64">Remover</th>
          </tr>
    </thead>
            <form action="?acao=up" method="post">
    <tfoot>
           <tr>
            <td colspan="5"><input type="submit" class="btn btn-primary"  value="Atualizar Carrinho" /></td>
            </tr>
            <tr>
            <td colspan="5"><a href="index.php" class="btn btn-success"> Continuar Comprando</a></td>
            </td>
             <tr>
            <td colspan="5"><a href="submit" class="btn btn-info">Finalizar compra</a></td>
            </td>
    </tfoot>

    <tbody>
      <form action="" method="POST">
      
         <?php
              $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
               if(count($_SESSION['carrinho']) == 0){
                  echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
               }else{
                   
                  $total = 0;
                  foreach($_SESSION['carrinho'] as $codigo => $quantidade){
                        $produtoCodigo = $produtoControlle->buscarProdutoCodigo($codigo);
                        $produto  = mysql_fetch_assoc($produtoCodigo);
                        $nome  = $produto['nomeproduto'];
                        $preco_unitario = number_format($produto['valor'], 2, ',', '.');
                        $sub   = number_format($produto['valor'] * $quantidade, 2, ',', '.');
                        $total += $produto['valor'] * $quantidade;
                        if($quantidade > $produto['estoque']){
                            $msg = "<font color='red'>Qtdd disponivel </font>";
                            $quantidade = $produto['estoque'];
                        }else {$msg = '';}
                     echo '<tr>
                           <td>'.$nome.'</td>
                           <td><input type="text" size="3" name="prod['.$codigo.']" value="'.$quantidade.'" />'.$msg.'</td>
                           <td>R$ '.$preco_unitario.'</td>
                           <td>R$ '.$sub.'</td>
                           <td><a href="?acao=del&codigo=<?php echo $codigo ?>"><i class="fa fa-trash"></i> Remove</a></td>
                        </tr>';
                  }
                     $total = number_format($total, 2, ',', '.');
                     echo '<tr>
                              <td colspan="4">Total</td>
                              <td>R$ '.$total.'</td>
                        </tr>';
               }
         ?>
      </form>
     </tbody>
        </form>
</table>
        </div>
      </div>
    </section>
  </body>
</html>

