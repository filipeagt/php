<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body> 
<?php 
/*cURL - permite que você se conecte e se 
comunique com diferentes tipos de servidores
usando diferentes tipos de protocolos como
protocolos https, ftp, gopher, telnet, dict,
file e ldap. libcurl também suporta 
certificados HTTPS, HTTP POST, HTTP PUT,
upload via FTP e muito mais.

Modo feio de entender: É o Ajax do PHP.
Faz basicamente a mesma coisa só que com
mais poderes.

Pode fazer GET ou POST, mandar e receber
dados diretamente a uma URL.

*/

// Exemplo cURL GET

//Sempre inicializar
$ch = curl_init();

//Apontar a url desejada
curl_setopt($ch, CURLOPT_URL, "https://viacep.com.br/ws/18072856/json/");

//Ativar o retorno como string do servidor
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Executar todo o cURL
$retorno = curl_exec($ch);

//Fechar o cURL
curl_close($ch);

//Mostrar o retorno vindo
//echo "<pre>$retorno</pre>";

$dados = json_decode($retorno, true);
echo $dados["logradouro"];

?>
</body>
</html>