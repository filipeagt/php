<?php 
    $nome = isset($_POST['nome']) ? limpaPost($_POST['nome']) : '';
    $idade = isset($_POST['idade']) ? limpaPost($_POST['idade']) : '';
    echo("<h1>Nome: $nome</h1>");
    echo("<h2>Idade: $idade</h2>");

    function limpaPost($valor) {
        $valor = trim($valor);
        $valor = stripslashes($valor);
        $valor = htmlspecialchars($valor);
         return $valor;
    }
?>