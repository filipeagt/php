<?php 
require_once('DB.php');

class Login{
    protected string $tabela = 'usuarios';
    public string $email;
    private string $senha;
    public string $nome;
    private string $token;
    public array $erro=[];

    public function auth($email, $senha) {
        //Criptografar a senha
        $senha_cripto = sha1($senha);
    
        //Verificar se tem este usuário cadastrado
        $sql = "SELECT * FROM $this->tabela WHERE email=? AND senha=? LIMIT 1";
        $sql = DB::prepare($sql);
        $sql->execute(array($email, $senha_cripto));
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);

        if($usuario) {
            //Criar um token
            $this->token = sha1(uniqid().date('d-m-Y-H-i-s'));

            //Atulizar este token no banco
            $sql = "UPDATE $this->tabela SET token=? WHERE email=? AND senha=? LIMIT 1";
            $sql = DB::prepare($sql);
            if($sql->execute(array($this->token, $email, $senha_cripto))) {
                //Colocar o token na sessão
                $_SESSION["TOKEN"] = $this->token;
                //Redirecionamos nosso usuário para a área restrita
                header('location: restrita/index.php');
            } else {
                $this->erro["erro_geral"] = "Falha ao se comunicar com o servidor!";
            }

        } else {
            $this->erro["erro_geral"] = "Usuário ou senha incorretos!";
        }
    }

    public function isAuth($token) {

        $sql = "SELECT * FROM $this->tabela WHERE token=? LIMIT 1";
        $sql = DB::prepare($sql);
        $sql->execute(array($token));
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            $this->nome = $usuario["nome"];
            $this->email = $usuario["email"];
        } else {
            header('location: ../index.php');
        }
    }
    
}
?>