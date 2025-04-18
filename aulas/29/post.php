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

// Exemplo cURL POST

//Sempre inicializar
$ch = curl_init();

//Apontar a url desejada
curl_setopt($ch, CURLOPT_URL, "http://localhost/aulas/29/teste.php");

//Opção para dizer que é POST (Padão é GET)
curl_setopt($ch, CURLOPT_POST, 1);

//Os campos que queremos mandar via POST
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('valor1' => 'Filipe', 'valor2' => 'Almeida')));

//Ativar retorno como string do servidor
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Executar todo o cURL
$resultado = curl_exec($ch);

//Fechar o cURL
curl_close($ch);

//Mostrar o retorno vindo
echo "<pre>$resultado</pre>";

?>
</body>
</html>