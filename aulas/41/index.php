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
    public $cor;

    //Métodos
    function set_modelo($modelo) {
        $this->modelo = $modelo;
    }

    function get_modelo() {
        return $this->modelo;
    }
}

$carro1 = new Carro();
$carro1->set_modelo('Uno');
//var_dump($carro1);

$carro2 = new Carro();
$carro2->set_modelo('Gol');

echo "O carro1 é ".$carro1->get_modelo();
echo '<br>';
echo "O carro2 é ".$carro2->get_modelo();

?>
</body>
</html>