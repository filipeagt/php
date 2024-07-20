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
        $num = isset($_GET["num"])?$_GET["num"]:0;
        $rq = sqrt($num);
        $rc = pow($num,(1/3));
    ?>
    <main>
        <h1>Informe um número</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
            <label for="num">Número</label>
            <input type="number" name="num" id="num" min="0" value="<?=$num?>">
            <input type="submit" value="Calcular Raízes">
        </form>
    </main>
    <section>
        <h2>Resultado final</h2>
        <?php 
            echo "<p>Analizando o <strong>número $num</strong>, temos</p><ul>";
            echo "<li>A sua raiz quadrada é <strong>".number_format($rq,3,',','.')."</strong></li>";
            echo "<li>A sua raiz cúbica é <strong>".number_format($rc,3,',','.')."</strong></li></ul>";
        ?>
    </section>
</body>
</html>