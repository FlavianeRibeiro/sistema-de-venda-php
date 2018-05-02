<?php 
    require_once '../controle/ClienteController.php';
    require_once '../persistencia/ClienteDAO.php';
    //require_once '../modelo/Cliente.php';
    
    $clienteController = new ClienteController();
    
    if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
        
        if($acao == "cadastrarCliente"){
          $cliente = new ClienteDAO();
          $cliente->setNome($_POST['nome']);
          $cliente->setCpf($_POST['cpf']);
          $cliente->setTelefone($_POST['telefone']);
          $cliente->setEndereco($_POST['endereco']);
          
          $msg = $clienteController->save($cliente);
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
  <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">LOJA JFT</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">INICIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="lista-produto.php?op=1">PROMOÇAO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="lista-produto.php?op=2">PEÇAS LIMITADAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 
    <!-- Page Content -->
    <section id="contact">
      <div class="container">
  
        <div class="row" style="text-aling: center">
  
          <!-- Blog Entries Column -->
          <div class="col-md-8" >
            <div class="card" style="margin-top: 25px;">
              <h5 class="card-header">Cadastro de Cliente</h5>
              <div class="card-body">
                <form  action="<?php $SELF_PHP;?>?acao=cadastrarCliente" method="POST">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Nome do cliente:</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="nome cliente">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">CPF:</label>
                    <input type="number" min="0" class="form-control" name="cpf" id="cpf" placeholder="CPF cliente">
                  </div>
                   <div class="form-group">
                    <label for="formGroupExampleInput">Telefone:</label>
                    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone cliente" maxlength="15">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="endereço cliente">
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
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
