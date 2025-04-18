<?php 
session_start();

$_SESSION["nome"] = "Filipe";
$_SESSION["profissao"] = "Operador";


// session_unset();
// session_destroy();

/* 
    Sessions

Parecido com cookie mas não cria um arquivo, ao fechar o navegador a sessão é destruida. Uma maneira de armazenar varáveis entre páginas de um site. Mais indicado para informações de login ao invez de cookies.

Sintaxe:

    Iniciar Sessão
session_start() //Primeira linha depois de <?php

    Criar / Modificar variável de sessão
$_SESSION['nome'] = 'Filipe';
$_SESSION['profissao'] = 'Operador';

    Remover todas as variáveis de sessão
session_unset(); ou $_SESION = array();

    Destruir a sessão
session_destroy(); //Depois de esvaziar os valores da sessão

*/

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body> 
<?php 

?>
</body>
</html>