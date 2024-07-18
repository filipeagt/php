<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP 001</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>       
               
        
    </header>
    <section>
        <h1>Resultado Final</h1>
        <?php 
            $num = $_GET["numero"];
            $ant = $num - 1;
            $suc = $num + 1;
            echo "<p>O número escolhido foi <strong>$num</strong></p>";
            echo "<p>O seu <em>antecessor</em> é $ant</p>";
            echo "<p>O seu <em>sucessor</em> é $suc</p>"
        ?>
            <button onclick="javascript:history.go(-1)">&#x2190 Voltar</button>
    </section>
</body>
</html>