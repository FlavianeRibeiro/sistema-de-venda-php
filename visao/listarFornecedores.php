<!DOCTYPE html>
<html lang="pt-br">
  
  <?php 
    include'vendor/styler.php';
    require_once '../controle/FornecedorController.php';
    require_once '../persistencia/FornecedorDAO.php';
    $fornecedorController = new FornecedorController();
    $fornecedor = new FornecedorDAO();
    
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
      
       if (isset($_GET['acao']) && $_GET['acao'] == "del"){
          	$fornecedor->setId($_GET['codigo']);
            $msg = $fornecedorController->deletar($fornecedor);
       }
      
  ?>
  
<body id="page-top">
    
    <!-- Navigation -->
    <?php include 'vendor/menu.php';?>
    <br>
      <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Listagem de Fornecedores</h2>
                <hr class="my-4">
            </div>
          </div>
          
          <?php echo $msg;
            $result = $fornecedorController->obterTodosFornecedores();
            $total = mysqli_num_rows($result);
          ?>
          <div class="row">
              <table style="width:  100%;" class="table table-bordered">
                  <caption>Total <?php echo $total?> registros</caption>
                  <thead >
                      <tr>
                          <th>Razão Social</th>
                          <th>Endereço</th>
                          <th>CNPJ</th>
                          <th style="align: right;">
                            <a href="cad_fornecedor.php"><i class="fa fa-plus-circle"></i> Novo</a>
                          </th>
                      </tr>
                  </thead>
              <form action="cad_fornecedor.php" method="post">
                  <tbody>
                     <?php
                         if($total <= 0){
                            echo '<tr><td colspan="6">Não há registros</td></tr>';
                         }else{
                           
                             while($fornecedor = $result->fetch_array(MYSQLI_ASSOC)){
                                $codigo = $fornecedor['id'];
                            		$razaoSocial = $fornecedor['razaoSocial'];
                            		$endereco	= $fornecedor['endereco'];
                            		$cnpj	= $fornecedor['cnpj'];
                                   
                                
                               echo '<tr>
                                      <td style="padding-top: 20px;" width="24%">'.$razaoSocial.'</td>
                                      <td style="padding-top: 20px;" width="50%"> '.$endereco.'</td>
                                      <td style="padding-top: 20px;" width="8%"> '.$cnpj.'</td>
                                      <td style="padding-top: 20px;" width="18%">
                                          <a href="cad_fornecedor.php?codigo='.$codigo.'"><i class="fa fa-edit"></i> Editar</a>
                                          <a href="?acao=del&codigo='.$codigo.'"><i class="fa fa-trash"  style="padding-left: 20px;"></i> Remove</a>
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

