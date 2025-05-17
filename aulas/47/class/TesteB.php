<?php 
//Proprieades estáticas
class Teste {
    static $idade=20;//Precisa de um um valor inicial

    function qualIdade() {
        echo "<br>".self::$idade;
    }
}

?>