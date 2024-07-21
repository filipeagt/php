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
        $minimo = 1412;
        $salario = isset($_GET["sal"])?$_GET["sal"]:$minimo;//??$minimo;
        $nsalarios = (int)($salario/$minimo);
        $resto = $salario%$minimo;
        $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        
    ?>
    <main>
        <h1>Informe seu salário</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
            <label for="sal">Salário (R$)</label>
            <input type="number" name="sal" id="idsal" value="<?=$salario?>" min="0">
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