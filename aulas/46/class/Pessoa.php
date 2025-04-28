<?php 
trait Comer { //Característica, para classes fora de contexto mas com uma ação em comum
    function comer() {
        echo "Humm que fome";
    }
}

class Pessoa {
    use Comer;

    function teste() {
        echo "Essa é a classe pessoa!<br>";
    }
}

//class Animal extends Pessoa {}
class Animal {//Para não precisar extender classe fora de contexto use traits
    use Comer;
}

?>