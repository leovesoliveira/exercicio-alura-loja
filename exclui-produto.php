<?php
require_once 'banco-produto.php';

$id = $_POST['id'];
excluiProduto($conexao, $id);

$_SESSION["success"] = "Produto removido com sucesso!";
header("Location: produto-lista.php");
die();
