<?php 
abstract class Carro { // abstract class precisa de pelo menos um método abstract
    abstract protected function teste($nome);    //Não tem implementação
    //Método podem ser public ou protected, nunca private
}

class Audi extends Carro { //Arquivo deve ter o nome da primeira classe concreta para carregar via autoload
    function teste($nome, string $placa="") { //atributo adicional deve ter um valor padrão para funcionar
        echo "$nome, essa é a classe concreta Audi!<br>";
    }
}
?>