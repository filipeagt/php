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
            $cotacao = 5.49;
            $val = $_GET["valor"] ?? 0;
            $dolar = $val/$cotacao;
            $padrao = numfmt_create("pt_BR",NumberFormatter::CURRENCY);
           
            //echo "<p>Seus R$ ".number_format($val,2,",",".")." equivalem a  <strong>US$ ".number_format($dolar,2,",",".")."</strong></p>";
            echo "<p>Seus ".numfmt_format_currency($padrao,$val,"BRL")." equivalem a  <strong>".numfmt_format_currency($padrao,$dolar,"USD")."</strong></p>";
            echo "<p><strong>*Cotação fixa de ".numfmt_format_currency($padrao,$cotacao,"BRL")."</strong> informada diretamente no código.</p>";
            
        ?>
            <button onclick="javascript:history.go(-1)">&#x2190 Voltar</button>
    </section>
</body>
</html>