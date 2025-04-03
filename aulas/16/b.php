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
$carros = array("Fusca", "Uno", "Gol", "Brasília", "Prisma");
$qtd = count($carros);

/*
for($i = 0; $i < $qtd; $i++) {
    echo $carros[$i]."<br>";
}
*/

foreach ($carros as $carro) {
    echo $carro."<br>";
}

?>
</body>
</html>