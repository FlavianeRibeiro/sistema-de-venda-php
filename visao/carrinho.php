<!DOCTYPE html>
<html lang="pt-br">
  
  <?php 
    include'vendor/styler.php'; 
    
    require_once '../controle/ProdutoController.php';
    require_once '../controle/ItemVendaController.php';
    require_once '../controle/VendaController.php';
    require_once '../persistencia/VendaDAO.php';
    require_once '../persistencia/ItemVendaDAO.php';
    
    $produtoControlle = new ProdutoController();
    $itemVendaController = new ItemVendaController();
    $vendaController = new VendaController();
    
      $msg = '';
      session_start();
      
	  	$idPessoa = $_SESSION["idPessoa"];
	    $nomePessoa = $_SESSION["nomePessoa"];
	    $categoria = $_SESSION["categoria"];
      
      if(!isset($_SESSION['carrinho'])){
         $_SESSION['CarrinhoDeCompra'] = array();
      }
      //adiciona produto
      if(isset($_GET['acao'])){
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $codigo = intval($_GET['codigo']);
            if(!isset($_SESSION['CarrinhoDeCompra'][$codigo])){
               $_SESSION['CarrinhoDeCompra'][$codigo] = 1;
            }else{
               $_SESSION['CarrinhoDeCompra'][$codigo] += 1;
            }
         }
         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            $codigo = intval($_GET['codigo']);
            if(isset($_SESSION['CarrinhoDeCompra'][$codigo])){
               unset($_SESSION['CarrinhoDeCompra'][$codigo]);
            }
         }
         
         //ALTERAR QUANTIDADE
         if($_GET['acao'] == 'up'){
           $msg = '';
           if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $codigo => $quantidade){
                    $codigo  = intval($codigo);
                    $quantidade = intval($quantidade);
                    if(!empty($quantidade) || $quantidade <> 0){
                       $_SESSION['CarrinhoDeCompra'][$codigo] = $quantidade;
                    }else{
                       unset($_SESSION['CarrinhoDeCompra'][$codigo]);
                    }
               }
            }
         }
         
        //ALTERAR QUANTIDADE
      }
  ?>
  
<body id="page-top">
    <!-- Navigation -->
    <?php include 'vendor/menu.php';?>
      <br><br><br><br>
      <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Produtos no carrinho</h2>
                <hr class="my-4">
            </div>
          </div>
          
          <?php echo $msg;?>
          <div class="row">
              <table style="width:  100%;" class="table table-bordered">
                  <caption>Carrinho de Compras</caption>
                  <thead >
                      <tr>
                          <th colspan="2">Produto</th>
                          <th style="text-align:  center;">Quantidade</th>
                          <th >Pre&ccedil;o</th>
                          <th >SubTotal</th>
                          <th >Remover</th>
                      </tr>
                  </thead>
              <form action="?acao=up" method="post">
                  <tfoot>
                         <tr>
                          <td colspan="6">
                              <input type="submit" class="btn btn-primary"  value="Atualizar Carrinho" />
                          <a href="index.php" class="btn btn-success">Continuar Comprando</a>
                          <a href="carrinho.php?acao=ok" class="btn btn-info">Finalizar compra</a>
                          </td>
                          </tr>
                  </tfoot>
                  <tbody>
                       <?php
                            $link = mysql_connect("localhost", "flavianeribeiro", "", "sistema_mer");
                            if(count($_SESSION['CarrinhoDeCompra']) == 0){
                                echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
                            }else{
                                $total = 0;$i=0;
                                foreach($_SESSION['CarrinhoDeCompra'] as $codigo => $quantidade){
                                    $produtoCodigo = $produtoControlle->buscarProdutoCodigo($codigo);
                                    $produto  = mysql_fetch_assoc($produtoCodigo);
                                    $nome  = $produto['nomeproduto'];
                                    $img  = $produto['img'];
                                    $preco_unitario = number_format($produto['valor'], 2, ',', '.');
                                    $sub   = number_format($produto['valor'] * $quantidade, 2, ',', '.');
                                    $total += $produto['valor'] * $quantidade;
                                       if($quantidade > $produto['estoque']){
                                          $msg = "<font color='red'>Qtdd disponivel </font>";
                                          $quantidade = $produto['estoque'];
                                      }else {$msg = '';}
                                     
                                   echo '<tr>
                                           <td style="padding:0;width:25%;"><img src="img/'.$img.'" style="width: 25%;"></td>
                                           <td>'.$nome.'</td>
                                           <td style="text-align:  center;"><input type="text" style="text-align:  center;" size="3" name="prod['.$codigo.']" value="'.$quantidade.'" />'.$msg.'</td>
                                           <td>R$ '.$preco_unitario.'</td>
                                           <td>R$ '.$sub.'</td>
                                           <td><a href="?acao=del&codigo='.$codigo.'"><i class="fa fa-trash"></i> Remove</a></td>
                                        </tr>';
                                       $venda[$i] = array($codigo, $preco_unitario, $quantidade, $sub);
                                      $i++;
                                }
                                $totalVenda = number_format($total, 2, ',', '.');
                                echo '<tr>
                                        <td colspan="5">Total</td>
                                        <td>R$ '.$totalVenda.'</td>
                                      </tr>';
                             }
                        if($_GET['acao'] == 'ok'){
                         if(isset($_SESSION["idPessoa"])){
                           
                            if(is_array($venda)){
                              $myVenda = new VendaDAO();
                              $myVenda->setValorTotal($total);
                              
                              if($_SESSION["categoria"] == "Vendedor"){
                                $myVenda->setIdVendedor($_SESSION["idPessoa"]);
                              }else{
                                $myVenda->setIdCliente($_SESSION["idPessoa"]);
                              }
                              $result = $vendaController->salvar($myVenda);
                              if($result != ""){
                                foreach($venda as $chave => $valor){
                                  $itemVenda = new ItemVendaDAO();
                                  $itemVenda->setIdVenda($result);              $itemVenda->setIdProduto($valor[0]);
                                  $itemVenda->setPrecoUnitario($valor[1]);      $itemVenda->setQuantidade($valor[2]);
                                  $CodigoEstoque = $valor[0];                   $Estoque = $valor[2];
                                  
                                  $itemVendaController->salvar($itemVenda);
                                  $produtoControlle->atualizarQtddEstoque($CodigoEstoque,$Estoque);
                                }
                                unset($_SESSION['CarrinhoDeCompra']);
                                echo '<br><div class="alert alert-success" role="alert">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Pedido realizado com sucesso!!
                                      </div>';
                            }
                          }
                        }// fim Acao_Ok
                        }
                      ?>
                  </tbody>
              </form>
        </table>
        </div>
      </div>
       
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  </body>
</html>