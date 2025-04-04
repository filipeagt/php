<?php 
    $nome = htmlspecialchars(isset($_GET['nome']) ? $_GET['nome'] : "Mundo!"); //Evita injeção de script
    $cor = htmlspecialchars(isset($_GET['cor']) ? $_GET['cor'] : "white");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
    <style>
        body {
            background-color: <?php echo $cor; ?>;
        }
    </style>
</head>
<body <?php if ($nome ==  "Filipe") { echo "style='color:gray;'";} ?> >
<!-- $_GET 17:00 -->
<h1>Olá <?php echo $nome; ?></h1>

<a href="index.php?nome=Taís&cor=rosybrown">Ir para Taís</a><br>
<a href="index.php?nome=Filipe&cor=skyblue">Ir para Filipe</a>
</body>
</html>