<?php 
//Configurações gerais
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "primeiro_banco";

//Conexão
try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "Falha ao se conectar com o banco ";//.$erro->getMessage();
}


//Função para limpar entradas
function limparPost($dado) {
    $dado = trim($dado);
    $dado = stripslashes($dado);
    $dado = htmlspecialchars($dado);

    return $dado;
}

/*  
    Backup dos dados (phpMyAdmin)
    - Clicar no nome do banco (menu lado esquerdo)
    - Exportar
    - Executar

    Apagar a base de dados
    - Clicar no nome do banco
    - Operações
    - Apagar a Base de Dados (DROP)
    - ok

    Importar arquivo .sql
    - Novo
    - Digitar nome do banco (Collation utf8mb4_general_ci)
    - Criar
    - Importar
    - Procurar (Selecionar arquivo)
    - Executar

*/

?>