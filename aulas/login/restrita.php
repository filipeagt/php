<?php 
require_once('config/conexao.php');
//print_r($_SESSION);

//Verificação de autenticação
$user = auth($_SESSION['TOKEN']);
if ($user) {
    echo "<h1>SEJA BEM-VINDO <strong style='color: red'>".$user['nome']."</strong>!</h1>";
    echo "<br><br><a style='background: green; color: white; padding: 20px; border-radius: 5px; text-decoration: none;' href='logout.php'>Sair do sitema</a>";
} else {
    //Redirecionar par login
    header('location: index.php');
}

/*
//Verificar se tem autorização
$sql = $pdo->prepare("SELECT * FROM usuarios WHERE token=? LIMIT 1");
$sql->execute(array($_SESSION['TOKEN']));
$usuario = $sql->fetch(PDO::FETCH_ASSOC);
//Se não encontrar o usuário
if(!$usuario) {
    header(("location: index.php"));
} else {
    echo "<h1>SEJA BEM-VINDO <strong style='color: red'>".$usuario['nome']."</strong>!</h1>";
    echo "<br><br><a style='background: green; color: white; padding: 20px; border-radius: 5px; text-decoration: none;' href='logout.php'>Sair do sitema</a>";
}
*/

?>