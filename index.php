<?php

//autoload de classes composer
require __DIR__.'/vendor/autoload.php';

//DEPENDÊNCIAS
use \App\Session\User as SessionUser;


//HEADER
include __DIR__.'/includes/header.php';

//Corpo da pagina
include SessionUser::isLogged() ?
__DIR__.'/includes/admin.php' :
__DIR__.'/includes/login.php';

//footer
include __DIR__.'/includes/footer.php';



?>