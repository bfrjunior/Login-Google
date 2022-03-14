<?php

//AUTO LOAD DO COMPOSER
require __DIR__.'/vendor/autoload.php';

//DEPENDÊNCIAS
 use Google\Client as GoogleClient;
 use App\Session\User as sessao;   

// VALIDAÇÃO PRINCIPAL DO COOKIE


//verifica os campos obrigatorios
if(!isset($_POST['credential']) || !isset($_POST['g_csrf_token'])){
    header('location: index.php');
    exit;
}

//COOKIE CSRF
$cookie = $_COOKIE['g_csrf_token'] ?? '';

//VERIFICA O VALOR DO COOKIE E DO POST PARA CSRF
if($_POST['g_csrf_token'] != $cookie){
    header('location: index.php');
    exit;
}

// VALIDAÇÃO SECUNDARIO DO TOKEN

//INSTÂNCIA DO CLIENTE GOOGLE
$client = new GoogleClient(['client_id' => '891715379727-glkake9v7qrg14lp9nbogiiuombog75v.apps.googleusercontent.com']); 

//OBTEM OS DADOS DO USUÁRIO COM BASE NO JWT
$payload = $client->verifyIdToken($_POST['credential']);

//VERIFICA OS DADOS DO PAYLOAD
if (isset($payload['email'])) {
    sessao::login($payload['name'],$payload['email']);
 header('location: index.php');
 exit;

} 

//PROBLEMAS AO CONSULTAR API
die('Problemas ao consultar API');
