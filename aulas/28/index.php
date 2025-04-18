
<?php 
/*  JSON

json_encode();  //Converte array ou objeto em uma string JSON.

json_decode();  //Converte texto JSON em um objeto ou array.

*/

$texto = $_POST['texto'];
$dados = json_decode($texto, true);

$dados['aluno'] = "Filipe";

$json = json_encode($dados);

echo $json;

?>
