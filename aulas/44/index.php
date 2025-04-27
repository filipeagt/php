<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP POO</title>
</head>
<body>
<?php 
//Constantes e Autoloading de Classes
//Normalmente um arquivo separado para cada class
require('autoload.php');

$carro = new Carro();
$carro->teste();

$fruta = new Fruta();
$fruta->teste();

$pessoa = new Pessoa();
$pessoa->teste();

?>
</body>
</html>