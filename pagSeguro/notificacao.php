<?php

$notificationCode = preg_replace('/[^[:alnum:]-]/','',$_POST["notificationCode"]);
$data['token'] ='89EB75D8D81341C891ECD67B5B9C9F9A';
$data['email'] = 'rnany13@gmail.com"';

$data = http_build_query($data);

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationCode.'?'.$data;

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$xml = curl_exec($curl);
curl_close($curl);

$xml = simplexml_load_string($xml);

$reference = $xml->reference;
echo $status = $xml->status;

if($reference && $status){
 include_once '../persistencia/Banco.php';
 $link = mysqli_connect("localhost", "flavianeribeiro", "", "sistema_mer");
 $id =  mysqli_query($link, "SELECT  `id` FROM  `venda` ORDER BY id DESC LIMIT 1");
 
 $resulTotal =  mysqli_query($link, "UPDATE `venda` SET ,`status`=$status WHERE `id` = $id");
echo $resultado;
}

?>