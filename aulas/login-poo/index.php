<?php 
require_once('class/config.php');
require_once('autoload.php');

if (isset($_POST["email"]) && isset($_POST["senha"]) && !empty($_POST["email"]) && !empty($_POST["senha"])) {
    $email = limpaPost($_POST["email"]);
    $senha = limpaPost($_POST["senha"]);

    $login = new Login();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilo.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <form method="post">
        <h1>Login</h1>

        <div class="input-group">
            <img class="input-icon" src="img/user.png">
            <input type="email" placeholder="Digite seu email" required>
        </div>
        
        <div class="input-group">
            <img class="input-icon" src="img/lock.png">
            <input type="password" placeholder="Digite sua senha" required>
        </div>
       
        <button class="btn-blue" type="submit">Fazer Login</button>
        <a href="cadastrar.php">Ainda não tenho cadastro</a>
    </form>
</body>
</html>