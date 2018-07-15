<!DOCTYPE html>
<html lang="en">
    <?php include 'vendor/styler.php'; 
      require_once '../controle/ItemVendaController.php';
      //$link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
      $itemVendaController = new ItemVendaController();
      session_start();
      if(isset($_SESSION["idPessoa"])){
  	  	$idPessoa = $_SESSION["idPessoa"];
  	    $nomePessoa = $_SESSION["nomePessoa"];
  	    $categoria = $_SESSION["categoria"];
  	    
  	    $result = $itemVendaController->listagemVendasVendedor($idPessoa);
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
                <h2 class="section-heading">Meus Itens Vendidos</h2>
                <hr class="my-4">
            </div>
          </div>
          
          <?php echo $msg;
            $total = mysqli_num_rows($result);
          ?>
          <div class="row">
              <table style="width:  100%;" class="table table-bordered">
                  <caption>Total <?php echo $total?> registros</caption>
                  <thead >
                      <tr>
                          <th colspan="2">Produto</th>
                          <th>Data</th>
                          <th>Preço</th>
                          <th>Quantidade</th>
                      </tr>
                  </thead>
              <form action="cad_fornecedor.php" method="post">
                  <tbody>
                     <?php
                         if($total <= 0){
                            echo '<tr><td colspan="6">Não há fornecedores cadastrados</td></tr>';
                         }else{
                             while($fornecedor = $result->fetch_array(MYSQLI_ASSOC)){
                               echo '<tr>
                                      <td style="padding-top: 20px;" width="12%">
                                        <img class="card-img-top" src="img/'.$fornecedor['img'].'" style="width:80px;height:120px;"></td>
                                      <td style="padding-top: 20px;" width="30%"> '.$fornecedor['nomeproduto'].'</td>
                                      <td style="padding-top: 20px;" width="8%"> '.$fornecedor['data'].'</td>
                                      <td style="padding-top: 20px;" width="8%"> '.number_format($fornecedor['precoUnitario'], 2, ',', '.').'</td>
                                      <td style="padding-top: 20px;" width="8%"> '.$fornecedor['quantidade'].'</td>
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
