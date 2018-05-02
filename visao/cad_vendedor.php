<!DOCTYPE html>
<html lang="pt-br">

  <?php
    include'vendor/styler.php'; 
    require_once '../controle/vendedorController.php';
    require_once '../modelo/vendedor.php';
    $produtoController = new produtoController();
    $vendedor = new vendedor();
    $action = 'cadastraVededor';
     if (isset($_GET['acao'])){
         $acao = $_GET['acao'];
        if($acao == "cadastraProduto"){
        
        	$vendedor->setCodigo($_POST['nome']);      $vendedor->setNomeproduto($_POST['nomeproduto']);
        	$vendedor->setValor($_POST['valor']);        $vendedor->setEstoque($_POST['estoque']);
        	$vendedor->setTipo($_POST['tipo']);          $vendedor->setImg($_POST['img']);           
          echo '<br><br><br><br><br> entrou' ;
          echo 'produto : ';var_dump($vendedor);
          $resposta = $vendedorController->salvar($vendedor);
          
          if(!$resposta){
            echo '<div class="alert alert-danger" role="alert">
                    This is a danger alert—check it out!
                  </div>';
          }else {
            echo '<div class="alert alert-success" role="alert">
                    Produto Cadastrado com Sucesso
                  </div>';
          }
        }
     }
    
  ?>
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
  <body id="page-top">
    <!-- Navigation -->
    <?php include 'vendor/menuFuncionario.php';?>
  <br><br>
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Cadastro de Vendedor</h2>
            <hr class="my-4">
          </div>
        </div>
        <div style="">
            <form action="<?php $SELF_PHP;?>?acao=<?php echo $action;?>" method="POST">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <label for="nomeproduto">Nome do Vendedor:</label>
                        <input type="text" class="form-control" name="nomeproduto" id="nomeproduto">
                    </div>
                </div>
               <div class="row">
                   <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <label for="valor">CPF:</label>
                        <input type="text" class="form-control" name="valor" id="valor">
                    </div>
                    <div class="col-md-2">
                        <label for="estoque">Telefone:</label>
                        <input type="text" class="form-control" name="estoque" id="estoque">
                    </div>
               </div>
               <div class="row">
                    <div class="col-md-2"></div>
                       <div class="col-md-8">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="3"></textarea>
                       </div>
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



            
            