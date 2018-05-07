<?php 
    require_once '../controle/ClienteController.php';
    require_once '../persistencia/ClienteDAO.php';
    
    $clienteController = new ClienteController();
    
     session_start();
    if(isset($_SESSION["idPessoa"])){
	  	$idPessoa = $_SESSION["idPessoa"];
	    $nomePessoa = $_SESSION["nomePessoa"];
	    $categoria = $_SESSION["categoria"];
	    
	    $result = $clienteController->obterClientePorId($idPessoa);
      while($fornecedor = $result->fetch_array(MYSQLI_ASSOC)){
          $id = $fornecedor['id'];
      		$nome = $fornecedor['nome'];
      		$telefone = $fornecedor['telefone'];
      		$cpf	= $fornecedor['cpf'];
      		$endereco	= $fornecedor['endereco'];
      }
	    
    }
    
    if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
        if($_GET['acao'] == "cadastrarCliente"){
          $cliente = new ClienteDAO();
          $cliente->setNome($_POST['nome']);
          $cliente->setCpf($_POST['cpf']);
          $cliente->setTelefone($_POST['telefone']);
          $cliente->setEndereco($_POST['endereco']);
          
          $msg = $clienteController->save($cliente);
          
        } else if($_GET['acao'] == "update"){
          $cliente = new ClienteDAO();
          $cliente->setId($_POST['id']);
          $cliente->setNome($_POST['nome']);
          $cliente->setCpf($_POST['cpf']);
          $cliente->setTelefone($_POST['telefone']);
          $cliente->setEndereco($_POST['endereco']);
          
          $msg = $clienteController->update($cliente);
          
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript">
/* Máscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('telefone').onkeyup = function(){
		mascara( this, mtel );
	}
}
</script>

</head>
    <?php include 'vendor/styler.php'?>
  <body>
  
    <!-- Navigation -->
    <?php include 'vendor/menu.php';?>
 
    <!-- Page Content -->
    <section id="contact">
      <div class="container">
  
        <div class="row" style="text-aling: center">
  
          <!-- Blog Entries Column -->
          <div class="col-md-8" >
            <div class="card" style="margin-top: 25px;">
              <h5 class="card-header">Cadastro de Cliente</h5>
              <div class="card-body">
                <form  action="<?php $SELF_PHP;?>?acao=<?php echo $acao;?>" method="POST">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Nome do cliente:</label>
                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id;?>">
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="nome cliente" value="<?php echo $nome;?>">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">CPF:</label>
                    <input type="number" min="0" class="form-control" name="cpf" id="cpf" placeholder="CPF cliente" value="<?php echo $cpf;?>">
                  </div>
                   <div class="form-group">
                    <label for="formGroupExampleInput">Telefone:</label>
                    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone cliente" maxlength="15" value="<?php echo $telefone;?>">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="endereço cliente" value="<?php echo $endereco;?>">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
                  </div>
                  <div class="form-group">
                    <?php echo $msg; ?>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div> <!-- /.container -->
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  </body>

</html>
