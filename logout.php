<?php

//autoload de classes composer
require __DIR__.'/vendor/autoload.php';

//DEPENDÊNCIAS
use \App\Session\User as SessionUser;

//DESLOGA O USUÁRIO
SessionUser::logout();

header('location: index.php');
exit;
