<?php
session_start();
require_once 'classes/usuarios.php';

$u = new Usuario;
$u->conectar("db_login", "localhost", "root", "");
$lista = [];

$current_id = $_SESSION['id_usuario'];

$sql = $pdo->query("SELECT * FROM usuarios WHERE id_usuario = $current_id");
if($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
$sql->execute();

if(!isset($current_id)){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mural de empregos</title>
    <script src="https://kit.fontawesome.com/d31b81b1c1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="mural.css">
</head>
<body>
    <header>
        <img src="logo-ltvjobs.svg" alt="">

        <nav class="menu">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Mural</a></li>
                <li><a href="#" class="btn-login">Login</a></li>
                <li><a href="#" class="btn-cadastro">Cadastre-se</a></li>
            </ul>
        </nav>
    </header>
    <main>
            <section class="perfil-user">
                <div class="container-user">
                    <div class="perfil-header">
                        <h2>Seu perfil</h2>
                        <i class="fa fa-solid fa-user"></i>
                    </div>
                    <?php foreach($lista as $usuarios): ?>
                        <form method="post" action="editar.php" class="perfil-form">
                        <input type="hidden" name="id" value="<?=$usuarios['id_usuario']?>">
                            <div class="inputBox">
                                <label for="nome">
                                    Nome:<input type="text" name="nome" id="nome" value="<?=$usuarios['nome']?>">
                                </label>
                            </div>
                            <div class="inputBox">
                                <label for="email">
                                    Email:<input type="email" name="email" id="" value="<?=$usuarios['email']?>">
                                </label>
                            </div>
                            <div class="inputBox">
                                <label for="cpf">
                                    CPF:<input type="text" name="cpf" id="cpf">
                                </label>
                            </div>
                            <div class="inputBox">
                                <label for="estado">
                                    Estado:<input type="text" name="estado" id="estado">
                                </label>
                            </div>
                            <input type="submit" value="Editar">
                        </form>
                    <?php endforeach; ?>
                </div>
               
            </section>
        <section class="vagas-emprego">

                <section class="box-vagas">
                    <h2>Cargo</h2>
                    <div class="local-emprego">Local de emprego</div>
                    <div class="salario-emprego">Salário do emprego</div>
                    <p class="descricao-emprego">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet earum molestias aliquam, quo culpa harum ipsum esse reprehenderit eveniet optio eum vitae.</p>
                    <button class="btn-candidatar">Candidatar</button>                
                </section>
                <section class="box-vagas">
                    <h2>Cargo</h2>
                    <div class="local-emprego">Local de emprego</div>
                    <div class="salario-emprego">Salário do emprego</div>
                    <p class="descricao-emprego">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet earum molestias aliquam, quo culpa harum ipsum esse reprehenderit eveniet optio eum vitae.</p>
                    <button class="btn-candidatar">Candidatar</button>                
                </section>
                <section class="box-vagas">
                    <h2>Cargo</h2>
                    <div class="local-emprego">Local de emprego</div>
                    <div class="salario-emprego">Salário do emprego</div>
                    <p class="descricao-emprego">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet earum molestias aliquam, quo culpa harum ipsum esse reprehenderit eveniet optio eum vitae.</p>
                    <button class="btn-candidatar">Candidatar</button>                
                </section>
                <section class="box-vagas">
                    <h2>Cargo</h2>
                    <div class="local-emprego">Local de emprego</div>
                    <div class="salario-emprego">Salário do emprego</div>
                    <p class="descricao-emprego">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet earum molestias aliquam, quo culpa harum ipsum esse reprehenderit eveniet optio eum vitae.</p>
                    <button class="btn-candidatar">Candidatar</button>                
                </section>
        </section>
    </main>
    <footer>
        <p>LTV Jobs &copy Todos os direitos reservados | 2022</p>
        <p>Feito por John e Hítalo</p>
    </footer>
    
</body>
</html>