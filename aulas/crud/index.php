<?php 
/*  CRUD MySQL

MySQLi - Exclusivo MySQL
PDO - Compatível com 12 sistemas de bancos de dados

*/

require_once("db/conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas PHP</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,th {
            padding: 5px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .oculto {
            display: none;
        }
    </style>
</head>
<body> 
    <h1>Aula Inserindo Dados</h1>
    <form id="form_salva" method="post">
        <input type="text" name="nome" placeholder="Digite o nome" required>
        <input type="email" name="email" placeholder="Digite o email" required>
        <button type="submit" name="salvar">Salvar</button>
    </form>

    <form class="oculto" id="form_atualiza" method="post">
        <input type="hidden" id="id_editado" name="id_editado" placeholder="ID" required>
        <input type="text" id="nome_editado" name="nome_editado" placeholder="Editar nome" required>
        <input type="email" id="email_editado" name="email_editado" placeholder="Editar email" required>
        <button type="submit" name="atualizar">Atualizar</button>
        <button type="button" id="cancelar" name="cancelar">Cancelar</button>
    </form>

    <form class="oculto" id="form_deleta" method="post">
        <input type="hidden" id="id_deleta" name="id_deleta" placeholder="ID" required>
        <input type="hidden" id="nome_deleta" name="nome_deleta" placeholder="Editar nome" required>
        <input type="hidden" id="email_deleta" name="email_deleta" placeholder="Editar email" required>
        <strong>Tem certeza que quer deletar cliente <span id="cliente"></span>?</strong>
        <button type="submit" name="deletar">Deletar</button>
        <button type="button" id="cancelar_del" name="cancelar_del">Cancelar</button>
    </form>

    <br>

    <?php   //    CREATE
        if (isset($_POST['salvar']) && isset($_POST['nome']) && isset($_POST['email'])) {

            $nome = limparPost($_POST['nome']);
            $email = limparPost($_POST['email']);
            $data = date('d-m-Y');
        
            //Validação de campo vazio
            if ($nome == "" || $nome == null) {
                echo "<strong style='color:red'>Nome não pode ser vazio</strong>";
                exit();
            }
        
            if ($email == "" || $email == null) {
                echo "<strong style='color:red'>E-mail não pode ser vazio</strong>";
                exit();
            }
        
            //Validações de nome e email
            if (!preg_match("/^[áàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑa-zA-Z-' ]*$/",$nome)) {
                echo "<strong style='color:red'>Apenas letras e espaços em branco são permitidos para o nome</strong>";
                exit();
            }
        
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<strong style='color:red'>Formato de e-mail inválido!</strong>";
                exit();
            }

            //  Inserir um dado no banco (modo simples)
            // $sql = $pdo->prepare("INSERT INTO clientes VALUES (null, 'Filipe', 'teste@teste.com', '18-04-2025')");
            // $sql->execute();

            //  Modo correto anti SQL injection
            /*
            $nome = "Taís";
            $email = "email@provedor.com";
            $data = date('d-m-Y');

            $sql = $pdo->prepare("INSERT INTO clientes VALUES (null, ?, ?, ?)");
            $sql->execute(array($nome, $email, $data));
            */
        
            //Inserção no banco de dados
            $sql = $pdo->prepare("INSERT INTO clientes VALUES (null, ?, ?, ?)");
            $sql->execute(array($nome, $email, $data));
        
            echo "<strong style='color:green'>Cliente cadastrado com sucesso!</strong>";
        }
    ?>

    <?php   //  UPDATE
        //  Processo de Atualização
        if(isset($_POST['atualizar']) && isset($_POST['id_editado']) && isset($_POST['nome_editado']) && isset($_POST['email_editado'])) {
            $id = limparPost($_POST['id_editado']);
            $nome = limparPost(($_POST['nome_editado']));
            $email = limparPost(($_POST['email_editado']));

            //Validação de campo vazio
            if ($nome == "" || $nome == null) {
                echo "<strong style='color:red'>Nome não pode ser vazio</strong>";
                exit();
            }
        
            if ($email == "" || $email == null) {
                echo "<strong style='color:red'>E-mail não pode ser vazio</strong>";
                exit();
            }
        
            //Validações de nome e email
            if (!preg_match("/^[áàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑa-zA-Z-' ]*$/",$nome)) {
                echo "<strong style='color:red'>Apenas letras e espaços em branco são permitidos para o nome</strong>";
                exit();
            }
        
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<strong style='color:red'>Formato de e-mail inválido!</strong>";
                exit();
            }
        
            //  Atualização do banco de dados
            $sql = $pdo->prepare("UPDATE clientes SET nome=?, email=? WHERE id=?");
            $sql->execute(array($nome, $email, $id));

            echo "Atualizado(s) ".$sql->rowCount()." registro(s)!";

        }
    ?>

    <?php   //  DELETE
        //Deletar dados
        if (isset($_POST['deletar']) && isset($_POST['id_deleta']) && isset($_POST['nome_deleta']) && isset($_POST['email_deleta'])) {
            $id = limparPost($_POST['id_deleta']);
            $nome = limparPost(($_POST['nome_deleta']));
            $email = limparPost(($_POST['email_deleta']));

            //  Comando para deletar
            $sql = $pdo->prepare("DELETE FROM clientes WHERE id=? AND nome=? AND email=?");
            $sql->execute(array($id, $nome, $email));

            echo "Deletado com sucesso!";
        }
    ?>

    <?php   //  RETRIEVE 
        //  Selecionar dados da tabela
        //$sql = $pdo->prepare("SELECT * FROM clientes ORDER BY id LIMIT 2,3"); //LIMIT início,quantidade
        $sql = $pdo->prepare("SELECT * FROM clientes ORDER BY id ASC");
        $sql->execute();
        $dados = $sql->fetchAll();

        //Exemplo com filtragem
        /*
        $sql = $pdo->prepare("SELECT * FROM clientes WHERE email =  ?");
        $email = 'email@provedor.com';
        $sql->execute(array($email));
        $dados = $sql->fetchAll();
        */

        // echo "<pre>";
        // print_r($dados);
        // echo "</pre>";
    ?>

    <?php 
        if (count($dados) > 0) {
            echo "<br><br>
                <table>
                    <tr>            
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
            ";

            foreach ($dados as $chave => $valor) {
                echo "
                    <tr>
                        <td>".$valor['id']."</td>
                        <td>".$valor['nome']."</td>
                        <td>".$valor['email']."</td>
                        <td><a href='#' class='btn-atualizar' data-id='".$valor['id']."' data-nome='".$valor['nome']."' data-email='".$valor['email']."'>Atualizar</a> | <a href='#' class='btn-deletar' data-id='".$valor['id']."' data-nome='".$valor['nome']."' data-email='".$valor['email']."'>Deletar</a></td>
                    </tr>
                ";
            }

            echo "</table>";
        } else {
            echo "<p>Nenhum cliente cadastrado</p>";
        }

    ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(".btn-atualizar").click(function(){
            var id = $(this).attr('data-id');
            var nome = $(this).attr('data-nome');
            var email = $(this).attr('data-email');

            $('#form_salva').addClass('oculto');
            $('#form_atualiza').removeClass('oculto');
            $('#form_deleta').addClass('oculto');

            $('#id_editado').val(id);
            $('#nome_editado').val(nome);
            $('#email_editado').val(email);

            //alert(`ID: ${id}\nNome: ${nome}\nE-mail: ${email}`);
        });

        $(".btn-deletar").click(function(){
            var id = $(this).attr('data-id');
            var nome = $(this).attr('data-nome');
            var email = $(this).attr('data-email');

            $('#id_deleta').val(id);
            $('#nome_deleta').val(nome);
            $('#email_deleta').val(email);
            $('#cliente').html(nome);

            $('#form_salva').addClass('oculto');
            $('#form_atualiza').addClass('oculto');
            $('#form_deleta').removeClass('oculto');

            //alert(`ID: ${id}\nNome: ${nome}\nE-mail: ${email}`);
        });

        $('#cancelar').click(function() {
            $('#form_salva').removeClass('oculto');
            $('#form_atualiza').addClass('oculto');
            $('#form_deleta').addClass('oculto');
        });

        $('#cancelar_del').click(function() {
            $('#form_salva').removeClass('oculto');
            $('#form_atualiza').addClass('oculto');
            $('#form_deleta').addClass('oculto');
        });
    </script>
</body>
</html>