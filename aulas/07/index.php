<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP</title>
</head>
<body>
<?php 
    /*
    TIPOS DE DADOS
    String, Integer, Float, Boolean, Array, Object, NULL
    */
    
    //String
    $exemplo1 = "<h1>Olá, Mundo!<h1>";

    //Integer
    $exemplo2_a = 345;
    $exemplo2_b = -2;
    $inteiro = $exemplo2_a + $exemplo2_b;
    #echo $inteiro;      

    //Float
    $exemplo3 = 3.5;

    //Boolean
    $exemplo4 = false;

    //Array
    $exemplo5 = [1,2.5,"Fusca"];

    //Object
    class Carro {
        public $cor;
        public $modelo;
        public function __construct($cor, $modelo)
        {
            $this->cor = $cor;
            $this->modelo = $modelo;
        }
        public function mensagem() {
            return "<p>O carro é $this->cor e o modelo é $this->modelo.</p>";
        }
    }
    $exemplo6 = new Carro("Preto", "Fusca");
    //echo $exemplo6->mensagem();

    //null
    $x = null;


    var_dump($x);

?>

</body>
</html>
