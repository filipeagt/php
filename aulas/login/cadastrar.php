<?php 
require_once('config/conexao.php');

//Requerimento do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'config/PHPMailer/src/Exception.php';
require 'config/PHPMailer/src/PHPMailer.php';
require 'config/PHPMailer/src/SMTP.php';


//Verificar se a postagem existe de acordo com os campos
if(isset($_POST['nome_completo']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['repete_senha'])) {
    //Verificar se todos os campos foram preenchidos
    if(empty($_POST['nome_completo']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['repete_senha']) || empty($_POST['termos'])) {
        $erro_geral = "Todos os campos são obrigatórios!";
    } else {
        //Receber valores vindos do post e limpar
        $nome = limparPost($_POST['nome_completo']);
        $email = limparPost($_POST['email']);
        $senha = limparPost($_POST['senha']);
        $senha_cript = sha1($senha);
        $repete_senha = limparPost($_POST['repete_senha']);
        $checkbox = limparPost($_POST['termos']);

        //Verificar se nome tem apenas letras e espaços em branco
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
            $erro_nome = "Somente permitido letras e espaços em branco!";
        }

        //Verificar se email é válido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erro_email = "Formato de e-mail inválido!";
        }

        //Verificar se senha tem mais de seis digitos
        if (strlen($senha) < 6) {
            $erro_senha = "Senha deve ter 6 carateres ou mais";
        }

        //Verificar se repete senha é igual a senha
        if ($senha !== $repete_senha) {
            $erro_repete_senha = "Senha e repetição de senha diferentes";
        }

        //Verificar se checkbox foi marcado
        if ($checkbox !== "ok") {
            $erro_checkbox = "Desativado";
        }

        if (!isset($erro_geral) && !isset($erro_nome) && !isset($erro_email) && !isset($erro_senha) && !isset($erro_repete_senha) && !isset($erro_checkbox)) {
            //Verificar se este email já está cadastrado no banco   
            $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email=? LIMIT 1"); 
            $sql->execute(array($email)); 
            $usuario = $sql->fetch();
            //Se não existir o usuário adicionar no banco
            if(!$usuario) {
                $recupera_senha = "";
                $token = "";
                $codigo_confirmacao = uniqid();
                $status = "novo";
                $data_cadastro = date('d/m/Y');
                $sql = $pdo->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?,?,?,?,?)");
                if ($sql->execute(array($nome,$email,$senha_cript,$recupera_senha,$token,$codigo_confirmacao,$status,$data_cadastro))) {
                    //Se o modo for local
                    if($modo == "local") {
                        header('location: index.php?result=ok');
                    }
                    //Se o modo for produção
                    if($modo == "producao") {
                        //Enviar email para usuário
                        $mail = new PHPMailer(true);

                        try {
                            //Recipients
                            $mail->setFrom('sistema@emailsistema.com', 'Sistema de Login');//Quem está mandando o email
                            $mail->addAddress($email, $nome);

                            //Content
                            $mail->isHTML(true);    //Corpo do email como HTML
                            $mail->Subject = 'Confirme seu cadastro';   //Título do email
                            $mail->Body    = '<h1>Por favor confirme seu e-mail abaixo</h1><br><br><a style="background: green; color: white; padding: 20px; border-radius: 5px; text-decoration: none;" href="https://seusistema.com.br/confirmacao.php?cod_confirm=$'.$codigo_confirmacao.'">Confirmar E-mail</a>';
                            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                            $mail->send();
                            header('location: obrigado.php');
                        } catch (Exception $e) {
                            echo "Houve um problema ao enviar e-mail de confirmação: {$mail->ErrorInfo}";
                        }
                    }
                }
            } else {
                //Já existe usuário apresentar erro
                $erro_geral = "Usuário já cadastrado";
            }
        }
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
    <title>Cadastrar</title>
</head>
<body>
    <form method="post">
        <h1>Cadastrar</h1>

        <?php if(isset($erro_geral)) { ?>        
            <div class="erro-geral animate__animated animate__headShake" >
            <?php echo $erro_geral; ?>
            </div>
        <?php } ?>        
        
        <div class="input-group">
            <img class="input-icon" src="img/card.png">
            <input <?php echo isset($erro_geral) || isset($erro_nome)?'class="erro-input"':'' ?> type="text" name="nome_completo" id="nome_completo" placeholder="Nome Completo" <?php if(isset($_POST["nome_completo"])) echo "value='".$_POST["nome_completo"]."'"; ?> required>
            <?php if(isset($erro_nome)){ ?>
            <div class="erro"><?php echo $erro_nome ?></div>
            <?php } ?>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/user.png">
            <input <?php echo isset($erro_geral) || isset($erro_email)?'class="erro-input"':'' ?> type="email" name="email" id="email" placeholder="Seu melhor email" <?php if(isset($_POST["email"])) echo "value='".$_POST["email"]."'"; ?> required>
            <?php if(isset($erro_email)){ ?>
            <div class="erro"><?php echo $erro_email ?></div>
            <?php } ?>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/lock.png">
            <input <?php echo isset($erro_geral) || isset($erro_senha)?'class="erro-input"':'' ?> type="password" name="senha" id="senha" placeholder="Senha de no mínimo 6 digitos" <?php if(isset($_POST["senha"])) echo "value='".$_POST["senha"]."'"; ?> required>
            <?php if(isset($erro_senha)){ ?>
            <div class="erro"><?php echo $erro_senha ?></div>
            <?php } ?>
        </div>

        <div class="input-group">
            <img class="input-icon" src="img/lock-open.png">
            <input <?php echo isset($erro_geral) || isset($erro_repete_senha)?'class="erro-input"':'' ?> type="password" name="repete_senha" id="repete_senha" placeholder="Repita a senha criada" <?php if(isset($_POST["repete_senha"])) echo "value='".$_POST["repete_senha"]."'"; ?> required>
            <?php if(isset($erro_repete_senha)){ ?>
            <div class="erro"><?php echo $erro_repete_senha ?></div>
            <?php } ?>
        </div>

        <div <?php echo isset($erro_geral) || isset($erro_checkbox)?'class="input-group erro-input"':'class="input-group"' ?>>
            <input type="checkbox" name="termos" id="termos" value="ok" required>
            <label for="termos">Ao se cadastrar você concorda com a nossa <a class="link" href="#">Política de Privacidade</a> e os <a class="link" href="#">Termos de uso</a></label>            
        </div>

        <button type="submit" class="btn-blue">Cadastrar</button>
        <a href="index.php">Já tenho uma conta</a>
    </form>
</body>
</html>