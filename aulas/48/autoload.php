<?php 
function loadClass($nomeClasse) {
    $caminho = __DIR__."/class/$nomeClasse.php";
    $caminhoCompleto = str_replace("\\",DIRECTORY_SEPARATOR,$caminho);
    if(is_file($caminhoCompleto)) {
        require_once($caminhoCompleto);
    }
}

spl_autoload_register('loadClass');
?>