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
        $atual = date('Y');
        $nasc = isset($_GET["nasc"])?$_GET['nasc']:2000;
        $ano = isset($_GET["ano"])?$_GET['ano']:$atual;
        $idade = $ano - $nasc;
    ?>
    
    <main>
        <h1>Calculando a sua idade</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
            <label for="nasc">Em que ano você nasceu?</label>
            <input type="number" name="nasc" id="nasc" value="<?=$nasc?>">
            <label for="ano">Quer saber sua idade em que ano? (Atualmente estamos em <strong><?=$atual?></strong>)</label>
            <input type="number" name="ano" id="ano" value="<?=$ano?>">
            <input type="submit" value="Qual será minha idade">
        </form>
    </main>

    <section>
        <h2>Resultado</h2>
        <?="Quem nasceu em $nasc vai ter <strong>$idade anos</strong> em $ano!"?>
    </section>
</body>
</html>