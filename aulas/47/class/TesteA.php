<?php 
//Métodos estaticos podem ser chamados sem instanciar a classe
class Teste {
    public static function ola() {//Pecisa ser publico para chamar sem instanciar
        echo "Olá, mundo estático!<br>";
    }

    function teste() {
        self::ola();
    }
}

class TesteFilho extends Teste {
    function __construct() {
        parent::ola();
    }
}

class Aleatoria {
    function qualquer() {
        Teste::ola();
    }
}
?>