<?php 
session_start();

/* 
//Não funcionou declarando aqui, foi daclarado direto no cadastrar.php
//Requerimento do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
*/
// Dois modos possíveis: local e producao
$modo = 'local';

if ($modo == 'local') {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "login";
}

if ($modo == 'producao') {
    $servidor = "";
    $usuario = "";
    $senha = "";
    $banco = "";
}

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Banco conectado com sucesso!";
} catch(PDOException $erro) {
    echo "Falha ao seconectar com o banco! ";//.$erro->getMessage();
}

function limparPost($dados) {
    $dados = trim($dados);
    $dados = stripslashes($dados);
    $dados = htmlspecialchars($dados);
    return $dados;
}

function auth($token) {
    global $pdo;
    //Verificar se tem autorização
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE token=? LIMIT 1");
    $sql->execute(array($token));
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    //Se não encontrar o usuário
    if(!$usuario) {
        return false;
    } else {
        return $usuario;
    }
}

?>