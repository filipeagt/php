<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP POO</title>
</head>
<body>
<?php 
//Namespaces e melhor organização
require('autoload.php');
/*
$login = new Login();
echo "<br>";
$cadastrar = new Cadastrar();
echo "<br>";
$loginGoogle = new LoginGoogle();
echo "<br>";
$cadastrarGoogle = new CadastrarGoogle();
*/

$login = new src\Login();
echo "<br>";
$loginGoogle = new api\Login();
echo "<br>";
$cadastrar = new src\Cadastrar();
echo "<br>";
$cadastrarGoogle = new api\Cadastrar();
echo "<br>";

?>
</body>
</html>