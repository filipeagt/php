<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body>
<?php 
    // Include e Require

    include("teste.php");   //Se o arquivo não existir da warning mas continua executando

    require("teste.php");   //Se não existir da erro fatal e para a execução

    // include_once require_once evitam recarregamento de arquivos

    //Continuação
    echo "<br><br>Continua executando?"
?>
</body>
</html>