<?php
include 'conecta.php';
include 'banco-usuario.php';
include 'logica-usuario.php';

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);

if ($usuario == null) {
    $_SESSION["danger"] = "Usuário ou senha inválidos!";
    header("Location: index.php");
} else {
    $_SESSION["success"] = "Logado com sucesso!";
    logaUsuario($usuario["email"]);
    header("Location: index.php");
}
die();
