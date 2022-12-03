<?php

// links para teste local
// http://localhost/php_api/index.php
// http://localhost/php_api/sessao.php

session_start();

// desloga o usuario em 20s sem atividade na pagina, redirecionando para a pagina HOME  
if((isset($_SESSION['atividade'])) && ( time() - $_SESSION['atividade']) > 20){
    session_unset();
    session_destroy();
    header("Location: index.php");
}

// pega o tempo atual
$_SESSION['atividade']= time();

echo $_SESSION['atividade'] . "<br>";
echo $_SERVER['REMOTE_ADDR']. "<br>";



