<!DOCTYPE html>
<html lang="pt-br">
  
  <?php 
    include'vendor/styler.php';
    require_once '../controle/CompraController.php';
    require_once '../persistencia/CompraDAO.php';
    $compraController = new CompraController();
    $compra = new CompraDAO();
    
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
    <br>
      <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Listagem de Compras</h2>
                <hr class="my-4">
            </div>
          </div>
          
          <?php echo $msg;
            $result = $compraController->obterTodasCompras();
            $total = mysqli_num_rows($result);
          ?>
          <div class="row">
              <table style="width:  100%;" class="table table-bordered">
                  <caption>Total <?php echo $total?> registros</caption>
                  <thead >
                      <tr>
                          <th>Compra ID</th>
                          <th>Produto</th>
                          <th>Fornecedor</th>
                          <th>Data</th>
                          <th>Valor</th>
                          <th>Quantidade</th>
                          <th>
                            <a href="cad_compra.php"><i class="fa fa-plus-circle"></i> Nova Compra</a>
                          </th>
                      </tr>
                  </thead>
              <form action="cad_compra.php" method="post">
                  <tbody>
                     <?php
                         if($total <= 0){
                            echo '<tr><td colspan="6">Não há compras</td></tr>';
                         }else{
                           
                             while($myItemCompra = $result->fetch_array(MYSQLI_ASSOC)){
                                
                               echo '<tr>
                                      <td style="padding-top: 20px;">'.$myItemCompra['id'].'</td>
                                      <td style="padding-top: 20px;"> '.$myItemCompra['nomeproduto'].'</td>
                                      <td style="padding-top: 20px;"> '.$myItemCompra['razaoSocial'].'</td>
                                      <td style="padding-top: 20px;"> '.$myItemCompra['data'].'</td>
                                      <td style="padding-top: 20px;"> '.$myItemCompra['precoUnitario'].'</td>
                                      <td style="padding-top: 20px;"> '.$myItemCompra['quantidade'].'</td>
                                      <td style="padding-top: 20px;">
                                          <a href="cad_compra.php?idprod='.$myItemCompra['idProduto'].'&idFor='.$myItemCompra['idFornecedor'].'"><i class="fa fa-edit"></i> Solicitar mais</a>
                                      </td>
                                    </tr>';
                            }
                                  
                           }?>
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

