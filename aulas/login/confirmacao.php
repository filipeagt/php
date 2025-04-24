<?php 
require_once('config/conexao.php');

if (isset($_GET['cod_confirm']) && !empty($_GET['cod_confirm'])) {
    //LIMPA O GET
    $cod = limparPost($_GET['cod_confirm']);

    //Consultar se algum usuario tem esse código de confirmação
    $sql = $pdo->prepare(("SELECT * FROM usuarios WHERE codigo_confirmacao=? LIMIT 1"));
    $sql->execute(array($cod));
    $usuario = $sql->fetch((PDO::FETCH_ASSOC));
    if ($usuario) {
        //Atualizar status par confirmado
        $status = 'confirmado';
        $sql = $pdo->prepare("UPDATE usuarios SET status=? WHERE codigo_confirmacao=?");
            if($sql->execute(array($status, $cod))) {
                header('location: index.php?result=ok');
            } 
    } else {
        echo "<h1>Código de confirmação inválido!</h1>";
    }
}
?>