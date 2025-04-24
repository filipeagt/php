<?php 
require_once('config/conexao.php');

//Requerimento do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'config/PHPMailer/src/Exception.php';
require 'config/PHPMailer/src/PHPMailer.php';
require 'config/PHPMailer/src/SMTP.php';

if (isset($_GET['cod']) && !empty($_GET['cod'])) {
    //LIMPA O GET
    $cod = limparPost($_GET['cod']);

    //Verificar se a postagem existe de acordo com os campos
    if(isset($_POST['senha']) && isset($_POST['repete_senha'])) {
        //Verificar se todos os campos foram preenchidos
        if(empty($_POST['senha']) || empty($_POST['repete_senha'])) {
            $erro_geral = "Todos os campos são obrigatórios!";
        } else {
            //Receber valores vindos do post e limpar        
            $senha = limparPost($_POST['senha']);
            $senha_cript = sha1($senha);
            $repete_senha = limparPost($_POST['repete_senha']);

            //Verificar se senha tem mais de seis digitos
            if (strlen($senha) < 6) {
                $erro_senha = "Senha deve ter 6 carateres ou mais";
            }

            //Verificar se repete senha é igual a senha
            if ($senha !== $repete_senha) {
                $erro_repete_senha = "Senha e repetição de senha diferentes";
            }

            if (!isset($erro_geral) && !isset($erro_senha) && !isset($erro_repete_senha)) {
                //Verificar se esta recuperação de senha existe   
                $sql = $pdo->prepare("SELECT * FROM usuarios WHERE recupera_senha=? LIMIT 1"); 
                $sql->execute(array($cod)); 
                $usuario = $sql->fetch();
                //Se não existir o usuário 
                if(!$usuario) {
                    echo "Recuperação de senha inválida!";
                } else {
                    //Já existe usuário com esse código de recuperação
                    //Atualizar a senha deste usuário no banco
                    $sql = $pdo->prepare("UPDATE usuarios SET senha=? WHERE recupera_senha=?");
                    if($sql->execute(array($senha_cript, $cod))) {
                        //Redirecionar para o login
                        header('location: index.php');
                    } 
                }
            }
        }
    }
} else {
    header('location: index.php');
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
    <title>Trocar a Senha</title>
</head>
<body>
    <form method="post">
        <h1>Trocar a Senha</h1>

        <?php if(isset($erro_geral)) { ?>        
            <div class="erro-geral animate__animated animate__headShake" >
            <?php echo $erro_geral; ?>
            </div>
        <?php } ?> 
            
        <div class="input-group">
            <img class="input-icon" src="img/lock.png">
            <input <?php echo isset($erro_geral) || isset($erro_senha)?'class="erro-input"':'' ?> type="password" name="senha" id="senha" placeholder="Nova senha de no mínimo 6 digitos" <?php if(isset($_POST["senha"])) echo "value='".$_POST["senha"]."'"; ?> required>
            <?php if(isset($erro_senha)){ ?>
            <div class="erro"><?php echo $erro_senha ?></div>
            <?php } ?>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/lock-open.png">
            <input <?php echo isset($erro_geral) || isset($erro_repete_senha)?'class="erro-input"':'' ?> type="password" name="repete_senha" id="repete_senha" placeholder="Repita a nova senha criada" <?php if(isset($_POST["repete_senha"])) echo "value='".$_POST["repete_senha"]."'"; ?> required>
            <?php if(isset($erro_repete_senha)){ ?>
            <div class="erro"><?php echo $erro_repete_senha ?></div>
            <?php } ?>
        </div>

        <button type="submit" class="btn-blue">Alterar a senha</button>

    </form>
</body>
</html>