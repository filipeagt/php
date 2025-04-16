<?php 
// Cookies
/*
    - Criar / Moodificar / Deletar
    setcookie(nomeChave, valor, validade);
    - Pegar valor Cookie
    $_COOKIE['nome']

*/

// Criar um cookie de nome
//setcookie('nome', 'Filipe', time() + (86400 * 30)); //Válido por 30 dias

//Modificar - Alterar o nomeChave
//setcookie('nome', 'Taís', time() + (86400 * 30));

//Deletar - Time negativo
setcookie('nome', '', time() - 3600);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body> 
    <h1>Cookies 🍪</h1>
<?php 
    if (isset($_COOKIE['nome'])) {
        $nome = $_COOKIE['nome'];
        echo "O nome é $nome";
    } else {
        echo "não tem nenhum Cookie";
    }
?>
</body>
</html>