<?php 
function loadClass($nomeClasse) {
    $caminho = __DIR__."/class/$nomeClasse.php";
    if(is_file($caminho)) {
        require($caminho);
    }
}

spl_autoload_register('loadClass');
?>