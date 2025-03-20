<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body>
<?php 
    /* Constantes */
    define("EXEMPLO", "oi"); //São globais
    //define("EXEMPLO", 5.89; da erro
    
    function teste() {
        echo EXEMPLO;
        echo "<br>";
    }

    teste();

    define("carros", ["Fusca", "Gol", "Uno"]); //Funciona a partir do php 7 
    
?>
</body>
</html>