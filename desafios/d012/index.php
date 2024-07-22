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
        $s = isset($_POST["segundos"])?$_POST["segundos"]:0;  
        $restos = $s%60;      
        $m = floor($s/60);
        $restom = $m%60;        
        $h = floor($m/60);
        $restoh = $h%24;
        $d = floor($h/24);
        $restod = $d%7;
        $sem = floor($d/7);
             
        
    ?>    
    <main>
        <h1>Calculadora de Tempo</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
            <label for="segundos">Qual é o total de segundos?</label>
            <input type="number" name="segundos" id="segundos" value="<?=$s?>" min="0" required>
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section>
        <h2>Totalizando tudo</h2>
        <?="<p>Analisando o valor que você digitou, <strong>".number_format($s,0,',','.')." segundos</strong> equivalem a um total de:</p><ul>"?>
        <?="<li>$sem semanas</li>"?>
        <?="<li>$restod dias</li>"?>
        <?="<li>$restoh horas</li>"?>
        <?="<li>$restom minutos</li>"?>
        <?="<li>$restos segundos</li></ul>"?>
    </section>
</body>
</html>