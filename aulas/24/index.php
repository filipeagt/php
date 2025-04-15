<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body> 
<?php 
// Manipulação de Arquivos
// fopen() Abrir / criar
// fwrite() Escrever no arquivo
// fclose() Fechar o arquivo
// feof() Durante a leitura avisa que chegou ao fim do arquivo
// fgets() Pega uma linha do arquivo ateé o 1024 bytes
// file_put_contents() Cria arquivo / Sobrescreve
// file_get_contents() Pega todo o conteúdo em uma string
// unlink() Deleta o arquivo
// copy() Copia arquivo


$arquivo = "teste.html";
$titulo = "<h1>Filipe</h1>";

file_put_contents($arquivo, '
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body>' 
    .$titulo.
'</body>
</html>
');

?>
</body>
</html>