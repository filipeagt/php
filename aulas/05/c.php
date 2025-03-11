<?php 
    //VARIÁVEIS
    $x = 10;
    $y = 5;

    function teste() {
        global $x, $y, $z;
        $z = $x + $y;
        echo "O valor de x dentro: $z";
    }
    teste();
    echo "<br> o valor de x fora: $z";
?>