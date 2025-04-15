<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h1 class="mt-5 text-center">Upload de Arquivos</h1>
    <form method="post" enctype="multipart/form-data" class="m-3"> <!--enctype="multipart/form-data" atributo necessário para enviar arquivos ao servidor-->
        <div class="input-group">
            <input type="file" class="form-control" id="arquivo" name="arquivo" aria-describedby="arquivo" aria-label="Upload" required>
            <button class="btn btn-primary" type="submit" id="enviar" name="enviar">Enviar</button>
        </div>
    </form>
</div>

<?php 
if (isset($_POST['enviar'])) {
    // echo "<pre>";
    // var_dump($_FILES); //Informações sobre o arquivo a ser enviado
    // echo "</pre>";

    /*
    array(1) {
        ["arquivo"]=>
        array(5) {
          ["name"]=>
          string(11) "filipe.jpeg"
          ["type"]=>
          string(10) "image/jpeg"
          ["tmp_name"]=>
          string(25) "/opt/lampp/temp/phpN4WtiC"
          ["error"]=>
          int(0)
          ["size"]=>
          int(10255)
        }
      }
    */

    //Validações
    $tamanhoMax = 2097152; // 2MB
    $permitido = array("jpg", "png", "jpeg", "mp4");
    $extensao = strtolower(pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION));

    //Verificar se tem o tamanho permitido
    if ($_FILES['arquivo']['size'] >= $tamanhoMax) {
        echo '<div class="alert alert-danger" role="alert">
            Tamanho máximo de 2 MB. Não foi possível fazer upload.
        </div>';
    } else {
        //Verificar se extensão é permitida
        if (in_array($extensao, $permitido)) {
            // echo "permitido";
            $pasta = "imagens/";
            if(!is_dir($pasta)) {
                mkdir($pasta, 0755);
            }

            $tmp = $_FILES['arquivo']['tmp_name'];
            $novoNome = uniqid().".$extensao";

            if(move_uploaded_file($tmp, $pasta.$novoNome)) {
                echo '<div class="alert alert-success" role="alert">
                    Upload realizado com sucesso!
                </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                    Erro: Não foi possível fazer upload!
                </div>';
            }

        } else {
            echo '<div class="alert alert-danger" role="alert">
                Erro: Extensão ('.$extensao.') não permitida.
            </div>';
        }
    }
}

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>