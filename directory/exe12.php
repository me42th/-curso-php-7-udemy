<?php
    $cep = $_GET['cep'];
    $link = "https://viacep.com.br/ws/$cep/json/";
    
    //curl
    $ch = curl_init($link);
    //retorno
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
    //ssl
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 0);
    //exec
    $response = curl_exec($ch);
    curl_close($ch);
    
    $data = json_decode($response,true);
    print_r($data);
?>