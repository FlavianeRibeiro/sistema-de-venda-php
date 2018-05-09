 <?php
    include'vendor/styler.php'; 
    
    session_start();
    if(isset($_SESSION["idPessoa"])){
  	  	$idPessoa = $_SESSION["idPessoa"];
  	    $nomePessoa = $_SESSION["nomePessoa"];
  	    $categoria = $_SESSION["categoria"];
  	}
	
  ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">LOJA JFTR</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#page-top">INICIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="listaProdutos.php?op=1">PROMOÇAO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="listaProdutos.php?op=2">PEÇAS LIMITADAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="carrinho.php" >
                  <i class="fa fa-shopping-cart" style="font-size:23px;"></i>
              </a>
            </li>
            <?php if($idPessoa != ""){ ?>
            <li class="dropdown open" style="color:black;">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true" style="color:black; font-size: .9rem; font-weight: 700;">
                    <i class="fa fa-user fa-fw" style="font-size:24px; padding: 8px 10px;"></i> 
                    <?php echo strtoupper($nomePessoa) ?>
                </a>
                <ul class="dropdown-menu dropdown-user">
                  <?php if($categoria == "vendedor"){  ?>
                       <li>
                          <a href="listarTodosProdutos.php" style="padding: 8px 10px; color:black; font-size: .9rem; font-weight: 700;">
                            <i class="fa fa-shopping-bag"></i>
                            PRODUTOS</a>
                      </li>
                       <li>
                          <a href="listarFornecedores.php" style="padding: 8px 10px; color:black; font-size: .9rem; font-weight: 700;">
                            <i class="fa fa-users fa-fw"></i> 
                            FORNECEDORES</a>
                      </li>
                       <li>
                          <a href="listaProdutoVendedor.php" style="padding: 8px 10px; color:black; font-size: .9rem; font-weight: 700;">
                            <i class="fa fa-shopping-cart"></i> 
                            ITENS VENDIDOS</a>
                      </li>
                      <li>
                          <a href="listaProdutoVendedor.php" style="padding: 8px 10px; color:black; font-size: .9rem; font-weight: 700;">
                            <i class="fa fa-shopping-cart"></i> 
                            COMPRADOS</a>
                      </li>
                       <li>
                          <a href="listarCompras.php" style="padding: 8px 10px; color:black; font-size: .9rem; font-weight: 700;">
                            <i class="fa fa-shopping-cart"></i> 
                            COMPRAS</a>
                      </li>
                      
                  <?php } else {?>
                       <li>
                          <a href="listaProdutoCliente.php" style="padding: 8px 10px; color:black; font-size: .9rem; font-weight: 700;">
                            <i class="fa fa-shopping-bag"></i>
                            MEUS PEDIDOS</a>
                      </li>
                       <li>
                          <a href="cad_cliente.php" style="padding: 8px 10px; color:black; font-size: .9rem; font-weight: 700;">
                            <i class="fa fa-user-o"></i> 
                            MEUS DADOS</a>
                      </li>
                  <?php } ?>
                    <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li> -->
                    <li>
                      <a href="login.php?acao=logout" style="padding: 8px 10px; color:black; font-size: .9rem; font-weight: 700;"><i class="fa fa-sign-out fa-fw"></i> LOGOUT</a>
                    </li>
                </ul>
            </li>
            <?php }else { ?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
            </li>
          <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

  <br><br>
  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  

<!--<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">LOJA JFT</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/">INICIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="cad_produto.php?acao=cadastraProduto"><i class="fas fa-plus"></i>Novo Produto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="listarTodosProdutos.php">Lista dos produtos</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="cad_vendedor.php"><i class="fas fa-plus"></i>Novo funcionario</a>
                </li>
            </ul>
        </div>
    </div>
</nav>-->