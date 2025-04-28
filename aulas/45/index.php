<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP POO</title>
</head>
<body>
<?php 
//Classes e métodos abstratos
//Normalmente um arquivo separado para cada class
require('autoload.php');

$carro = new Audi();
$carro->teste("Filipe", 'ABC-1234');

$fruta = new Fruta();
$fruta->teste();

$pessoa = new Pessoa();
$pessoa->teste();

?>
</body>
</html>