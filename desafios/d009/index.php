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
        $n1 = isset($_GET["n1"])?$_GET["n1"]:0;
        $n2 = isset($_GET["n2"])?$_GET["n2"]:0;
        $p1 = isset($_GET["p1"])?$_GET["p1"]:1;
        $p2 = isset($_GET["p2"])?$_GET["p2"]:1;
        $ms = ($n1+$n2)/2;
        $mp = ($n1*$p1+$n2*$p2)/($p1+$p2);
    ?>
    
    <main>
        <h1>Médias Aritméticas</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
            <label for="n1">1° Valor</label>
            <input type="number" name="n1" id="n1" value="<?=$n1?>">
            <label for="p1">1° Peso</label>
            <input type="number" name="p1" id="p1" value="<?=$p1?>">
            <label for="n2">2° Valor</label>
            <input type="number" name="n2" id="n2" value="<?=$n2?>">
            <label for="p2">2° Peso</label>
            <input type="number" name="p2" id="p2" value="<?=$p2?>">
            <input type="submit" value="Calcular Médias">
        </form>
    </main>
    <section>
        <h2>Calculo das Médias</h2>
        <?="<p>Analisando os valores $n1 e $n2:</p><ul>"?>
        <?="<li>A <strong>Média Aritmética Simples</strong> entre os valores é igual a ".number_format($ms,2,',','.').".</li>"?>
        <?="<li>A <strong>Média Aritmética Ponderada</strong> com os pesos $p1 e $p2 é igual a ".number_format($mp,2,',','.').".</li></ul>"?>
    </section>
</body>
</html>