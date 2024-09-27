<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senha</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <?php 
        $senha = isset($_GET["next"])?$_GET["next"]:0;
    ?>
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
        <label for="next">Póxima senha</label>
        <input type="number" name="next" id="next" min="0" max="999" value="<?= $senha < 999 ? $senha+1 : 0 ?>" required maxlength="3">
        <input type="submit" value="Chamar">
    </form>
    <?php 
        $arquivo = fopen("data/senha.txt","w");
        fwrite($arquivo, "$senha");
        fclose($arquivo);
    ?>
</body>
</html>