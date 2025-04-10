<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body>
<?php 
    // Manipulando datas e hora - date()

    //Configuração hora servidor
    date_default_timezone_set('America/Sao_Paulo'); 

    //Data completa
    echo date('d/m/Y');
    echo '<br>';

    //Hora
    echo date('H:i:s');
    echo '<br><br>';

    //Calcular dias entre datas (Padrão americano)
    $hoje = date('Y-m-d');
    $vencimento = '2025-05-20';

    $diferenca = strtotime($vencimento) - strtotime($hoje);
    $dias = floor($diferenca/(60*60*24));

    //Conversão para o padrão BR
    $venc = explode('-', $vencimento);
    $venc_formatado = "$venc[2]/$venc[1]/$venc[0]";

    $data_hoje = explode('-', $hoje);
    $hoje_formatado = "$data_hoje[2]/$data_hoje[1]/$data_hoje[0]";

    echo "Vencimento: $venc_formatado <br>";
    echo "Hoje: $hoje_formatado <br><br>";
    echo "Adiferença é de $dias dias entre as datas<br><br>";

    //Comparar datas
    /*
    $data1 = '2021-09-15';
    $data2 = '2021-09-20';

    if (strtotime($data1) > strtotime($data2)) {
        echo "A data 1 é maior que a data 2";
    } else if (strtotime($data1) < strtotime($data2)) {
        echo "A data 1 é menor que a data 2";
    } else {
        echo "A data 1 é igual a data 2";
    }
    */

    $data1 = date('Y-m-d');
    $data2 = '2025-04-06';

    if (strtotime($data1) > strtotime($data2)) {
        echo "A data 1 é maior que a data 2<br>";
        echo "Vencido! <br>";
    } else if (strtotime($data1) < strtotime($data2)) {
        echo "A data 1 é menor que a data 2<br>";
        echo "Tudo tranquilo<br>";
    } else {
        echo "A data 1 é igual a data 2<br>";
        echo "Vence hoje!<br>";
    }
?>
</body>
</html>