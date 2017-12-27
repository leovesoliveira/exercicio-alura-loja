<?php
require_once 'cabecalho.php';

$produtoDao = new ProdutoDao($conexao);

$id = $_POST['id'];
$produtoDao->excluiProduto($id);

$_SESSION["success"] = "Produto removido com sucesso!";
header("Location: produto-lista.php");
die();
