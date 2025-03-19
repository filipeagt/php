<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body>
<?php 
    /* Manipulação de números */

    //$valor = "150" + 20; //170
    // $valor = 4 * 2.5; //float
    // $valor_convertido = (int)$valor; //também pode converter strings
    // var_dump($valor);

    $valor1 = 100;
    $valor2 = 5.75;
    $valor3 = "teste";
    // var_dump(is_int($valor3));
    // var_dump(is_float($valor2));
    var_dump(is_numeric($valor3));
?> 
</body>
</html>