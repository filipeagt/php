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
//consts podem ser acessadas sem instanciar a classe

class Exemplo {
    const nomeConstante = "Teste123"; //pode ser public, protected ou private

    function teste() {
        echo self::nomeConstante;
    }
}

/*
//Instanciei a classe
$exemplo = new Exemplo();
echo $exemplo::nomeConstante;
*/

//echo Exemplo::nomeConstante; //Sem instanciar

$exemplo = new Exemplo();
$exemplo->teste();


?>
</body>
</html>