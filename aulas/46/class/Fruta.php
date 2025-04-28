<?php 
//Interfaces não podem ter propriedades, classe abstrata pode
//Interfaces só podem ter métodos públicos, classe abstrata pode ter publico ou protegido
//Métodos abstratos em ambas
interface MetodosFrutas {
    function criar($nome, $cor);
    function completo();
}

class Fruta implements MetodosFrutas {
    protected string $nome;
    protected string $cor;

    //Método da classe
    function teste() {
        echo "Essa é a classe fruta<br>";
    }


    //Métodos da interface
    function criar($nome, $cor) {
        $this->nome = $nome;
        $this->cor = $cor;
    }

    function completo() {
        echo "A fruta é $this->nome e a cor é $this->cor.<br>";
    }
}
?>