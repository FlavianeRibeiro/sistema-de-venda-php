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
            
            $result = $pessoaController->login($pessoa);
            
           if (mysqli_num_rows($result) > 0) {
                header('Location: index.php');
            }else{
              $msg = "Login Invalido!!";   
            }
            
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
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
                    <span style="color:red"><?php echo $msg ?></span>
                    <input type="text" name="nome" id="nome"  value="<?php echo $nome;?>" class="form-control" placeholder="Nome" required autofocus>
                    <input type="password" name="senha" id="senha" value="<?php echo $senha;?>" class="form-control" placeholder="Senha" required>
                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Lembre-se de mim
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
                </form><!-- /form -->
                <a href="#" class="forgot-password">
                    Esqueceu a senha?
                </a>
                <a href="cad_cliente.php" class="forgot-password">
                    Cadastrar-se
                </a>
            </div><!-- /card-container -->
        </div>
    </div><!-- /container -->
    </section>
</body>
</html>
