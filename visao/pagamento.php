<html>
<?php include'vendor/styler.php';?>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
 <title>Pedido de teste</title>
 <link rel="stylesheet" type="text/css" href="style.css" />
 <script src="vendor/jquery/jquery.min.js"></script>
<script>

 function enviaPagseguro(){
   $.post('pagseguro.php','',function(data){
 

       $('#code').val(data);
       $('#comprar').submit();

     })
 }
 </script>
</head>

<body>
 <div style=" text-align:  center;margin-top: 60px;">
 <h1 >Confirme seu pagamento de forma segura</h1>
 <p >Pag Seguro</p>
 <button onclick="enviaPagseguro()" class="btn btn-primary">Comprar</button><br />
   <input type="hidden" name="code" value=""/>
   
   <img src="https://www.j2store.org/images/extensions/payment_plugins/pagseguro.png" width="40%" heigth="40%">
 </div>


 <form id="comprar" action="https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
 <input type="hidden" name="code" id="code" value="" />
 </form>

 <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>


 
</body>
</html>