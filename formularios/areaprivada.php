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

<head>
    <style>
        body{
            min-heigth: 100vh;
            display:grid;
            place-items:center;
        }
        h1{
            text-align: center;
            background-color: green;
            font-size: 3em;
        }
    </style>
</head>
<body>
    <h1>SEUS DADOS</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php foreach($lista as $usuarios): ?>
            <tr>
                <form method="post" action="editar.php">
                    <input type="hidden" name="id" value="<?=$usuarios['id_usuario']?>">
                    <td><?=$usuarios['id_usuario']?></td>
                    <td><input type="text" name="nome" value="<?=$usuarios['nome']?>"></td>
                    <td><input type="text" name="email" value="<?=$usuarios['email']?>"></td>
                    <td><input type="submit" value="Editar"></td>
                </form>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

