<?php 
    $nome = isset($_GET['nome']) ? $_GET['nome'] : '';
    $idade = isset($_GET['idade']) ? $_GET['idade'] : '';
    echo("<h1>Nome: $nome</h1>");
    echo("<h2>Idade: $idade</h2>");
?>