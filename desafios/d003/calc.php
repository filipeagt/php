<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP 003</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>       
               
        
    </header>
    <section>
        <h1>Resultado Final</h1>
        <?php 
            $val = $_GET["valor"];
            $dolar = $val/5.49;
           
            echo "<p>Seus R$ $val equivalem a  <strong>US$ $dolar</strong></p>";
            echo "<p><strong>*Cotação fixa de R$5,49</strong> informada diretamente no código.</p>";
            
        ?>
            <button onclick="javascript:history.go(-1)">&#x2190 Voltar</button>
    </section>
</body>
</html>