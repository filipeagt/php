<?php 
session_start();    //inicializa
session_unset();    //limpa
session_destroy();  //destroi
header('location: index.php'); //redireciona
?>