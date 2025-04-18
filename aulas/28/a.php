<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body> 
<?php 
/*  JSON

json_encode();  //Converte array ou objeto em uma string JSON.

json_decode();  //Converte texto JSON em um objeto ou array.

*/

$texto = '
{
  "cep": "18072-856",
  "logradouro": "Rua Seraphim Banietti",
  "complemento": "",
  "unidade": "",
  "bairro": "Caguassu",
  "localidade": "Sorocaba",
  "uf": "SP",
  "estado": "São Paulo",
  "regiao": "Sudeste",
  "ibge": "3552205",
  "gia": "6695",
  "ddd": "15",
  "siafi": "7145"
}
';

//echo "<pre>$texto</pre>";

$dados = json_decode($texto, true); //com o parametro opcional true, a varável vira uma matriz associativa em vez de objeto. Vantagem: mais fácil de acrescentar coisas.

$dados["aluno"] = "Filipe";

//var_dump($dados);

//echo $dados->cep; //Acesso sem true
//echo $dados["cep"]; //Acesso com true

$json = json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); //JSON_PRETTY_PRINT - formata json JSON_UNESCAPED_UNICODE - exibe acentos
echo "<pre>$json</pre>";

?>
</body>
</html>