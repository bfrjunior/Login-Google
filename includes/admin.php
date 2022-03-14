<?php

//RETORNA AS INFORMÇÕES DA SESSÃO DO USUÁRIO
$info = \App\Session\User::getInfo();

?>

<h1>Logado com Sucesso!</h1>

<p>Olá , <b><?=$info['name']?></b>. Seja muito bem vindo ao painel Admin.</p>

<a href="logout.php">
    <button class="btn btn-danger">Sair</button>
</a>
