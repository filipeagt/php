<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body>
<?php 
// functions - não são case sensitive

function EscreverMensagem($nome) {
    return "Olá, tudo bom $nome?";
}

function soma(int $valor1, int $valor2) {
    return $valor1 + $valor2;
}

//call
//echo escrevermensagem("Filipe");
//echo soma(1, "30 anos");   erro fatal
//echo soma(1, 30); //funciona a partir do php 8


?>
</body>
</html>