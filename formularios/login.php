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
    <title>Login | LTV Jobs</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
</head>
<body>
    <main>
        <h1>Login</h1>
        <form method="POST">
            <div class="inputBox">
                <label for="email">Informe email</label>
                <input type="text" name="email" id="email" autocomplete="off">
            </div>

            <div class="inputBox">
                <label for="senha">Informe sua senha</label>
                <input type="password" name="senha" id="senha" autocomplete="off">
                <label id="lbleye"><img src="view.svg" id="eye"></label>
            </div>
            <input type="submit" value="Entrar" class="btn-cadastrar">
        </form>
        <p>Não possui uma conta? <a href="cadastro.php" id="link">Cadastre-se</a></p> <br>
        <p><a href="../home/inicio.php">Voltar para o início</a></p>
    </main>
<?php
if(isset($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if(!empty($email) && !empty($senha)){
        $u->conectar("db_login", "localhost", "root", "");
        if($u->msgErro == ""){
            if($u->logar($email, $senha)){
                header("Location: ../mural/mural.php");
            }
            else{
                ?>
                    <div class="msg-erro">Email e/ou senha estão incorretos!
                        
                    </div>
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
    <script src="mostrarsenha.js"></script>

</body>
</html>