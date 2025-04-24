<?php 
require_once('config/conexao.php');

//Verificação de autenticação
$user = auth($_SESSION['TOKEN']);
if ($user) {
    echo "<h1>ESSA É A PÁGINA RESTRITA 2</h1>";
    echo "<br><br><a style='background: green; color: white; padding: 20px; border-radius: 5px; text-decoration: none;' href='logout.php'>Sair do sitema</a>";
} else {
    //Redirecionar par login
    header('location: index.php');
}

?>