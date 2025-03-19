<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body>
<?php 
    /* MANIPULAÇÃO DE STRINGS */
    $palavra = "Olá, mundo!";

    //strlen()
    //echo strlen($palavra);

    //str_word_count()
    //echo str_word_count($palavra);

    //strrev()
    //echo strrev('Filipe');

    //strpos()
    //var_dump(strpos($palavra, "fase")); //retorna false se não encontrar

    //str_replace()
    //echo str_replace("mundo", "Filipe", $palavra);

    $data = "18-03-2025";
    $data_formatada = str_replace("-", "/", $data);
    //echo $data_formatada;

    
?>
</body>
</html>