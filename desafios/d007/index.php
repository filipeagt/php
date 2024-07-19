<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $minimo = 1400;
        $salario = $_GET["sal"]??$minimo;
        $nsalarios = floor($salario/$minimo);
        $resto = $salario%$minimo;
        $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        
    ?>
    <main>
        <h1>Informe seu salário</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
            <label for="salario">Salário (R$)</label>
            <input type="number" name="sal" id="idsal" value="1400" step="0.01" min="<?=$minimo?>">
            <p>Considerando um salário mínimo de <strong><?=numfmt_format_currency($padrao,$minimo,'BRL')?></strong></p>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <section>
        <h2>Resultado Final</h2>
        <?="<p>Quem recebe um salário de ".numfmt_format_currency($padrao,$salario,'BRL')." ganha <strong>$nsalarios salários mínimos</strong> + ".numfmt_format_currency($padrao,$resto,'BRL').".</p>"?>
    </section>
</body>
</html>