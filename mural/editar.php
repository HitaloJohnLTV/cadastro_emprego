<?php
require_once 'classes/usuarios.php';
$u = new Usuario;
$u->conectar("db_login", "localhost", "root", "");
$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$cpf = filter_input(INPUT_POST, 'cpf');
$estado = filter_input(INPUT_POST, 'estado');


if($id && $nome && $email){
    $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, cpf = :cpf, estado = :estado WHERE id_usuario = :id");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':cpf', $cpf);
    $sql->bindValue(':estado', $estado);
    $sql->bindValue(':id', $id);

    $sql->execute();
    header("Location: ../mural/mural.php");
}
else{
    echo 'erro';
}