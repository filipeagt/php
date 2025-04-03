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
$carros = array("Fusca", "Uno", "Gol", "Fusion", "Prisma", "Brasília");
//sort($carros); //Funciona para números
rsort($carros); //Ordenação reversa

foreach ($carros as $carro) {
    echo $carro."<br>";
}

?>
</body>
</html>