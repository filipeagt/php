<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body> 
<?php 
// Manipulação de pastas ou diretórios (Alterada a permissão)
// sudo chmod -R 777 /opt/lampp/htdocs/aulas/23


$pasta =  "nova-pasta/imagem"; //Letras minúsculas, sem espaços e caracteres especiais
//$dupla = "teste/nova-pasta/";

if (!is_dir($pasta)) { //Verifica se pasta existe antes de criar
    mkdir($pasta, 0755, true); //caminho, chmod, recursivo
} else {
    //rename($pasta, "imagem"); //troca nome ou move a pasta
    //rename($pasta, "teste");
    //rmdir($pasta);
}

?>
</body>
</html>