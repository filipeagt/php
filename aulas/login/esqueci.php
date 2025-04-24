<?php 
require_once('config/conexao.php');

//Requerimento do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'config/PHPMailer/src/Exception.php';
require 'config/PHPMailer/src/PHPMailer.php';
require 'config/PHPMailer/src/SMTP.php';

if(isset($_POST['email']) && !empty($_POST['email'])) {
    //Receber dados vindos do post e limpar
    $email = limparPost($_POST['email']);
    $status = 'confirmado';

    //Verificar se existe este usuário
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email=? AND status=? LIMIT 1");
    $sql->execute(array($email, $status));
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    if ($usuario) {
        //Existe o usuário
        //Enviar email para usuário cadastrar nova senha
        $mail = new PHPMailer(true);
        $cod = sha1(uniqid());

        //Atualizar o código de recuperção deste usuário no banco
        $sql = $pdo->prepare("UPDATE usuarios SET recupera_senha=? WHERE email=?");
        if($sql->execute(array($cod,$email))) {
            //Enviar email
            try {
                //Recipients
                $mail->setFrom('sistema@emailsistema.com', 'Sistema de Login');//Quem está mandando o email
                $mail->addAddress($email, $nome);
    
                //Content
                $mail->isHTML(true);    //Corpo do email como HTML
                $mail->Subject = 'Recuperar a senha!';   //Título do email
                $mail->Body    = '<h1>Recuperar a senha:</h1><br><br><a style="background: green; color: white; padding: 20px; border-radius: 5px; text-decoration: none;" href="https://seusistema.com.br/confirmacao.php?cod=$'.$cod.'">Recuperar a senha</a>';
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
                $mail->send();
                header('location: email-enviado-recupera.php');
            } catch (Exception $e) {
                echo "Houve um problema ao enviar e-mail de confirmação: {$mail->ErrorInfo}";
            } 
        }

        
    } else {
        $erro_usuario = "Houve uma falha ao buscar este e-mail. Tente novamente";
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
    <title>Esqueceu a senha</title>
</head>
<body>
    <form method="post">
        <h1>Recuperar Senha</h1>

        <?php if(isset($erro_usuario)) { ?>        
            <div style="text-align: center;" class="erro-geral animate__animated animate__headShake" >
            <?php echo $erro_usuario; ?>
            </div>
        <?php } ?>

        <p>Informe o email cadastrado no Sistema</p>

        <div class="input-group">
            <img class="input-icon" src="img/user.png">
            <input type="email" name="email" id="email" placeholder="Digite seu email" required>
        </div>
    
        <button type="submit" class="btn-blue">Recuperar a Senha</button>
        <a href="index.php">Voltar para login</a>
    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</body>
</html>