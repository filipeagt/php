<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP POO</title>
</head>
<body>
<?php 
//Construct, Destruct e Visibilidade de Propriedades

class Carro{
    //Propriedades
    public $modelo; //mostra
    protected $ano; //não mostra
    private $chassi;    //não mostra

    //Métodos
    function __construct($modelo, int $ano=2000, $chassi="123qwert") {   
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->chassi = $chassi;
    }

    public function transforma_chassi() {
        $this->chassi = "outra string";
        $this->protegida();
        $this->privada();
    }

    protected function protegida() {
        echo "Sou método protegido<br>";
    }

    private function privada() {
        echo "Sou um método privado<br>";
    }

    //Destrutor
    function __destruct() { //Não muito usado
        //echo "chegamos no final da nossa classe";      
    }
}

$carro1 = new Carro('Gol');

//echo "O carro1: ".$carro1->modelo.'<br>';
$carro1->transforma_chassi();

?>
</body>
</html>