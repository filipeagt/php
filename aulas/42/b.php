<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP POO</title>
</head>
<body>
<?php 
//Introdução POO

class Carro{
    //Propriedades
    public $modelo;
    public $ano;

    //Métodos
    function __construct($modelo, int $ano=2000) {   
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    function get_modelo() {
        return $this->modelo;
    }
}

$carro1 = new Carro('Uno', 2015);

echo "O carro1 é ".$carro1->get_modelo();
echo '<br>';

?>
</body>
</html>