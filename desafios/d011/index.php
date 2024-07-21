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
        $preco = isset($_POST["preco"])?$_POST['preco']:'0';
        $percentual = isset($_POST["reajuste"])?$_POST["reajuste"]:'0';
        $reajuste = $preco*$percentual/100;
        $novoPreco = $preco + $reajuste;
    ?>    
    <main>
        <h1>Reajustador de Preços</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
            <label for="preco">Preço do Produto (R$)</label>
            <input type="number" name="preco" id="preco" step="0.01" value="<?=$preco?>" min="0.10">
            <label for="reajuste">Qual será o percentual do reajuste? (<strong id="saida"><?=$percentual?>%</strong>)</label>
            <input type="range" name="reajuste" id="reajuste" oninput="atualiza()" value="<?=$percentual?>">
            <input type="submit" value="Reajustar">
        </form>
    </main>

    <section>
        <h2>Resultado do Reajuste</h2>
        <?="<p>O produto custava R$".number_format($preco,2,',','.').", com <strong>$percentual% de aumento</strong> vai passar a custar <strong>R$".number_format($novoPreco,2,',','.')."</strong> a partir de agora.</p>"?>
    </section>
    <script>
        function atualiza() {
            let valor = document.getElementById('reajuste')
            let saida = document.getElementById('saida')
            saida.innerText = `${valor.value}%`
        }
    </script>
</body>
</html>