<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP POO</title>
</head>
<body>
<?php 
//Herança e Visibilidade de Métodos

class Pai {
    function __construct(public string $nome="", public int $idade=0) {
        
    }

    //Método público
    public function qualNome() {
        echo "<br>O nome dessa pessoa é ".$this->nome;
    }

    //Método protegido
    protected function qualIdade() {
        echo "<br>A idade dessa pessoa é ".$this->idade;        
    }

    //Método privado
    private function todasInformações() {
        echo "<br>O nome é $this->nome a idade é $this->idade";
    }

}

class Filho extends Pai {

    function __construct(public string $olhos='') {
        parent::__construct();
    }

}

class Neto extends Filho {

}

//Pai
$pai = new Pai();
var_dump($pai);

//Filho
$filho = new Filho('castanhos', 'Filipe', 32);
var_dump($filho);

//Neto
$neto = new Neto();
var_dump($neto);

?>
</body>
</html>