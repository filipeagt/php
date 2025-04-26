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
     
    //Método público
    function mostraDados() {
        $this->qualIdade();
        //$this->todasInformações();    //Erro fatal
    }

}

//Pai
$pai = new Pai();
var_dump($pai);

//Filho
$filho = new Filho("João", 20);
$filho->mostraDados();

?>
</body>
</html>