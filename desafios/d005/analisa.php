<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP 005</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>    
    <main>
        <h1>Analisador de Número Real</h1>
        <?php 
            $num = $_GET["numero"];
            $int = floor($num);
            $frac = $num-$int;
            echo "<p>Analisando o número <strong>".number_format($num,3,",",".")."</strong> informado pelo usuário:</p>";
            echo "<ul>";
            echo "<li>A parte inteira do número é <strong>".number_format($int,0,',','.')."</strong></li>";
            echo "<li>A parte fracionária do número é <strong>".number_format($frac,3,',','.')."</strong></li>";
            echo "</ul>";
        ?>
            <button onclick="javascript:history.go(-1)">Voltar</button>
    </main>
</body>
</html>