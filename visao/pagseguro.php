<?php

$data['token'] ='89EB75D8D81341C891ECD67B5B9C9F9A';
$data['email'] = 'rnany13@gmail.com';
$data['currency'] = 'BRL';
$data['itemId1'] = '19';
$data['itemQuantity1'] = '1';
$data['itemDescription1'] = 'Paris';
$data['itemAmount1'] = '12.00';

$data = http_build_query($data);

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$xml = curl_exec($curl);
curl_close($curl);

$xml = simplexml_load_string($xml);
echo $xml -> code;

?>