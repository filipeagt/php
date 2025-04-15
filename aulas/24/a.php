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

$pasta = "arquivos/";

if (!is_dir($pasta)) {
    mkdir($pasta, 0755);
}

$nome_do_arquivo = date('y-m-d-H-i-s').".txt";
//echo $nome_do_arquivo;
$arquivo = fopen($pasta.$nome_do_arquivo, 'a+');
fwrite($arquivo, 'Uma linha injetada pelo PHP'.PHP_EOL);
fwrite($arquivo, 'Uma linha injetada 2'.PHP_EOL);
fwrite($arquivo, 'Uma linha injetada 3'.PHP_EOL);
fclose($arquivo);

$caminho_arquivo = $pasta.$nome_do_arquivo;

if (file_exists($caminho_arquivo) && is_file($caminho_arquivo)) {
    $abrir_arquivo = fopen($caminho_arquivo, 'r');
    //echo $caminho_arquivo;
    while(!feof($abrir_arquivo)) {
        echo fgets($abrir_arquivo)."<br>"; //Lê uma linha do arquivo
    }

    fclose($abrir_arquivo);
}
?>
</body>
</html>