<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body>
<?php 
// Arrays (Matrizes)
$idade = array("Filipe"=>31, "Taís"=>31, "Theo"=>5);

$idade["Filipe"] = 32;

// asort($idade); //Array associativo, ordena por valor 
// ksort($idade);  // Ordena por chave
// arsort($idade);  // Valor descendente
krsort($idade);  // Chave descendente

foreach ($idade as $chave => $valor) {
    echo "O nome é $chave e a idade é $valor <br>";
}

?>
</body>
</html>