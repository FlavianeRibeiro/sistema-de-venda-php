<?php
    require_once '../controle/PessoaController.php';
    require_once '../persistencia/PessoaDAO.php';
    
    $pessoaController = new PessoaController();
    
    if (isset($_GET['acao'])){
    $acao = $_GET['acao'];

        
        // Verifica qual formulario foi submetido
        if($acao == "login"){
            $pessoa = new PessoaDAO();
            $pessoa->setNome($_POST['nome']);
            $pessoa->setCpf($_POST['senha']);
            
            $msg = $pessoaController->login($pessoa);
            
            if($msg != "" && $_POST['nome'] != ""){
                echo '<br><br><br>
                      <div class="alert alert-danger" role="alert" id="flash-msg">
                      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                      <h6><i class="icon fa fa-check"></i>'.$msg.'</h6>
                    </div>';
            }
            
        }elseif($acao == "logout"){
            session_start();
            session_destroy();
            header('Location: index.php');
        }
        
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <header>
     <script>
      $(document).ready(function () {
          $("#flash-msg").delay(3000).fadeOut("slow");
      });
    </script>
  </header>
    
    <link href="css/login.css" rel="stylesheet">
    <?php include 'vendor/styler.php'?>
<body> 
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">LOJA JFT</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
     <section id="contact">
    <div class="container">
        <div class="col-md-6">
            <div class="card card-container">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" action="<?php $SELF_PHP;?>?acao=login" method="POST">
                    <input type="text" name="nome" id="nome"  value="<?php echo $nome;?>" class="form-control" placeholder="Nome" required autofocus>
                    <input type="password" name="senha" id="senha" value="<?php echo $senha;?>" class="form-control" placeholder="Senha" required>
                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Lembre-se de mim
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
                    <div >
                        <label>
                            <a href="cad_cliente.php?acao=cadastrarCliente"> Cadastrar-se</a>
                        </label>
                    </div>
                </form><!-- /form -->
            </div><!-- /card-container -->
        </div>
    </div><!-- /container -->
    </section>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>
