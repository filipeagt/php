<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
</head>
<body>
<?php 
// SUPERGLOBAIS

/*
$GLOBALS
$_SERVER
$_REQUEST
$_POST
$_GET
$_FILES
$_ENV
$_COOKIE
$_SESSION
*/

$a = 10;
$b = 20;

function soma() {
    //global $a, $b, $c;
    //$c = $a + $b;
    $GLOBALS['c'] = $GLOBALS['a'] + $GLOBALS['b'];
}

soma();
echo $c;

?>
</body>
</html>