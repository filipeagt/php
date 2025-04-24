<?php 
require_once('config/conexao.php');

if(isset($_POST['email']) && isset($_POST['senha']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    //Receber os dados vondos do post e limpar
    $email = limparPost($_POST['email']);
    $senha = limparPost($_POST['senha']);
    $senha_cript = sha1($senha);

    //Verificar se existe este usuário
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email=? AND senha=? LIMIT 1");
    $sql->execute(array($email, $senha_cript));
    $usuario = $sql->fetch(PDO::FETCH_ASSOC); //Recebe uma matriz associativa
    if ($usuario) {
        //Existe usuário
        //Verificar se o cadastro foi confirmado
        if($usuario['status'] == "confirmado") {
            //Criar um token
            $token = sha1(uniqid().date('d-m-Y-H-i-s'));

            //Atualizar o token deste usuário no banco
            $sql = $pdo->prepare("UPDATE usuarios SET token=? WHERE email=? AND senha=?");
            if($sql->execute(array($token,$email,$senha_cript))) {
                //Armazenha este token na sessão (SESSION)
                $_SESSION['TOKEN'] = $token;
                header('location: restrita.php');
            } 
        } else {
            $erro_login = "Por favor confirme seu cadastro no e-mail!";
        }
        
    } else {
        $erro_login = "Usuário ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- Biblioteca Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>Login</title>
</head>
<body>
    <form method="post">
        <h1>Login</h1>

        <?php if (isset($_GET['result']) && $_GET['result']=="ok") { ?>
            <div class="sucesso animate__animated animate__headShake">
                <!-- ctrl + f5 se o css não estiver sendo atualizado por causa do cache do navegador -->
                Cadstrado com sucesso!
            </div>
        <?php } ?>
        
        <?php if(isset($erro_login)) { ?>        
            <div style="text-align: center;" class="erro-geral animate__animated animate__headShake" >
            <?php echo $erro_login; ?>
            </div>
        <?php } ?>

        <div class="input-group">
            <img class="input-icon" src="img/user.png">
            <input type="email" name="email" id="email" placeholder="Digite seu email" required>
        </div>
        <div class="input-group">
            <img class="input-icon" src="img/lock.png">
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
        </div>
        <a href="esqueci.php">Esqueceu a senha?</a>       
        <button type="submit" class="btn-blue">Fazer Login</button>
        <a href="cadastrar.php">Ainda não tenho cadastro</a>
    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <?php if (isset($_GET['result']) && $_GET['result']=="ok") { ?>
        <script>
            setTimeout(() => {
                $('.sucesso').addClass('oculto');
            }, 3000);
        </script>
    <?php } ?>
</body>
</html>