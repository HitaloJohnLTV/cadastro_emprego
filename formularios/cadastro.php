<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | LTV Jobs</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
</head>
<body>
    <main>
        <h1>Cadastro</h1>
        <form method="POST">
            <div class="inputBox">
                <label for="nome">Informe seu nome</label>
                <input type="text" name="nome" id="nome" autocomplete="off" maxlength="30">
            </div>
            <div class="inputBox">
                <label for="email">Informe seu email</label>
                <input type="email" name="email" id="email" autocomplete="off" maxlength="64">
            </div>
            <div class="inputBox">
                <label for="senha">Informe sua senha</label>
                <input type="password" name="senha" id="senha" autocomplete="off" maxlength="15">
            </div>
            <input type="submit" value="Cadastrar" class="btn-cadastrar">
        </form>
        <p>Já possui uma conta? <a href="login.php" id="link">Faça Login</a></p> <br>
        <p><a href="../home/inicio.php">Voltar para o início</a></p>

    </main>
<?php
//verificar se clicou no botao
if(isset($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    //verificar se esta preenchido
    if(!empty($nome) && !empty($email) && !empty($senha)){
        $u->conectar("db_login", "localhost", "root", "");
        if($u->msgErro == ""){//se estiver ok
            if($u->cadastrar($nome, $email, $senha)){
                header("Location: login.php");
                ?>
                <!-- <div class="msg-sucesso">
                    Cadastrado com sucesso! Acesse para entrar!
                <div> -->
                    
                <?php
            }
            else{
                ?>
                <div class="msg-erro">Email ja cadastrado!</div>
                <?php
            }
        }
        else{
            
            ?>
                <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro;?>
                </div>
            <?php
        }
    }
    else{
        ?>
            <div class="msg-erro">Preencha todos os campos!</div>
        <?php
    }
}
?>
</body>
</html>