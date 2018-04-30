<!DOCTYPE html>
<html lang="pt-br">
<br><br><br>
  <?php
    include'vendor/styler.php'; 
    require_once '../controle/produtoController.php';
    require_once '../persistencia/produtoDAO.php';
    $produtoController = new produtoController();
    $produto = new produto();
    $action = 'cadastraProduto';
     if (isset($_GET['acao'])){
         $acao = $_GET['acao'];
        if($acao == "cadastraProduto"){
          $array = array($_POST['codigo'], $_POST['nomeproduto'], $_POST['valor'], $_POST['estoque'],
              $_POST['img'],$_POST['descricao'],$_POST['tipo']);
              $produtoController->salvar($array);
              
        }elseif($acao == "editar"){
              $action = 'AtualizarCadastro';
              $resposta = $produto->buscarProduto($id);
              $myProduto = mysql_fetch_array($resposta);
              
              
              $nomeprocuto = $myProduto['nomeproduto'];
              $codigo = $myProduto['codigo'];
              $valor = $myProduto['valor'];
              $img = $myProduto['img'];
              $estoque = $myProduto['estoque'];
              $descricao = $myProduto['descricao'];
              $img = $myProduto['img'];
               $array = array($_POST['codigo'], $_POST['nomeproduto'], $_POST['valor'], $_POST['estoque'],
              $_POST['img'],$_POST['descricao'],$_POST['tipo']);
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
              <a class="nav-link js-scroll-trigger" href="lista-produto.php?op=1">PROMOÇAO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="lista-produto.php?op=2">PEÇAS LIMITADAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <br><br>
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Cadastro de produto</h2>
            <hr class="my-4">
          </div>
        </div>
        <div style="">
            <form action="<?php $SELF_PHP;?>?acao=<?php echo $action;?>" method="POST">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <label for="nomeproduto">Nome do Produto:</label>
                        <input type="text" class="form-control" name="nomeproduto" id="nomeproduto" value="<?php echo $nomeprocuto;?>" <?php echo $permissao;?>>
                    </div>
                     <div class="col-md-4">
                        <label for="codigo">Código:</label>
                        <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $codigo;?>" <?php echo $permissao;?>>
                    </div>
                </div>
               <div class="row">
                   <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <label for="valor">Valor:</label>
                        <input type="text" class="form-control" name="valor" id="valor" value="<?php echo $valor;?>" <?php echo $permissao;?>>
                    </div>
                    <div class="col-md-2">
                        <label for="estoque">Qtdd. Estoque:</label>
                        <input type="text" class="form-control" name="estoque" id="estoque" value="<?php echo $estoque;?>" <?php echo $permissao;?>>
                    </div>
                     <div class="col-md-3">
                        <label for="tipo">Tipo</label>
                        <select class="form-control" name="tipo" id="tipo" <?php echo $permissao;?>>
                            <option value="Jeans">Jeans</option>
                            <option value="Acessorio"  <?php if($tipo == 'Acessorio') echo"selected";?>>Acessorio</option>
                            <option value="Promocao"  <?php if($tipo == 'Prmocao') echo"selected";?>>Promoção</option>
                            <option value="Limitado"  <?php if($tipo == 'Limitado') echo"selected";?>>Limitado</option>
                            <option value="Vestidos"  <?php if($tipo == 'Feminino') echo"selected";?>>Vestidos</option>
                            <option value="Blusas"  <?php if($tipo == 'Vestidos') echo"selected";?>>Blusas</option>
                            <option value="Camisetas"  <?php if($tipo == 'Camisetas') echo"selected";?>>Camisetas</option>
                            <option value="Sapatodos"  <?php if($tipo == 'Sapatodos') echo"selected";?>>Sapatodos</option>
                        </select>
                    </div>
               </div>
               <div class="row">
                  <div class="col-md-2"></div>
               <div class="col-md-8">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="3" value="<?php echo $descricao;?>" <?php echo $permissao;?>></textarea>
               </div>
               </div>
               <div class="row">
                 <div class="col-md-2"></div>
                <div class="col-md-6">
                    <label for="img">Imagem:</label>
                    <input type="text" class="form-control" id="img" name="img" value="<?php echo $descricao;?>" <?php echo $permissao;?>>
                </div>
                </div>
              <br>
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </section>
  </body>
</html>



            
            