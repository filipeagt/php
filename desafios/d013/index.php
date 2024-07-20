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
        $v = $_POST['valor']??0;
        $n100 = floor($v/100);
        $n50 = floor($v%100/50);
        $n10 = floor($v%100%50/10);
        $n5 = $v%100%50%10/5;
        $padrao = numfmt_create('pt_BR', NumberFormatter::CURRENCY);
    ?>    
    <main>
        <h1>Caixa Eletrônico</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
            <label for="valor">Qual valor você deseja sacar? (R$)</label>
            <input type="number" name="valor" id="valor" step="5" value="<?=$v?>">
            <p>*Notas disponíveis: R$100, R$50, R$10 e R$5</p>
            <input type="submit" value="Sacar">
        </form>
    </main> 
        
    <section>
        <h2>Saque de <?=numfmt_format_currency($padrao,$v,'BRL')?> realizado</h2>
        <p>O caixa eletrônico vai te entregar as seguintes notas:</p><ul>
        <?="<li><img src='imagens/100-reais.jpg' alt='R$100'>x$n100</li>"?>
        <?="<li><img src='imagens/50-reais.jpg' alt='R$50'>x$n50</li>"?>
        <?="<li><img src='imagens/10-reais.jpg' alt='R$10'>x$n10</li>"?>
        <?="<li><img src='imagens/5-reais.jpg' alt='R$5'>x$n5</li></ul>"?>
    </section>
</body>
</html>