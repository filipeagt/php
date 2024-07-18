<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP 002</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>       
               
        
    </header>
    <section>
        <h1>Trabalhando com números aleatórios</h1>
        <p>Gerando um número aleatório entre 0 e 100...</p>
        <?php 
            $num = rand(0, 100);
            
            echo "<p>O valor gerado foi <strong>$num</strong></p>";
            
        ?>
            <button onclick="javascript:history.go(0)">&#x1F446 Gerar outro</button>
    </section>
</body>
</html>