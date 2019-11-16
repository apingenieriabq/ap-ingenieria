<?php

$url = 'https://ap-ingenieria-puroingeniosamario.c9users.io/api/sistema/api/probandoRecepcionPOST';
$params = array(
    'dato' => 'abcde12345x',
    'from' => '2105',
    'to' => '47xxxxxxxx',
    'type' => 'text',
    'price' => 0,
    // 'data' => utf8_encode('Hello, world! (æøåÆØÅ)')
);

$username = 'superusuario';
$password = 'superusuario';

$ch = curl_init();
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
$response = curl_exec($ch);
if(curl_errno($ch)){
    throw new Exception(curl_error($ch));
}
curl_close($ch);
header('Content-Type: application/json');
echo $response;
// This should be the default Content-type for POST requests
//curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));