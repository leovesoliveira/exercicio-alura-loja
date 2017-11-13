<?php
include 'conecta.php';
include 'banco-produto.php';

$id = $_GET['id'];
excluiProduto($conexao, $id);

header("Location: produto-lista.php?excluido=true");
die();
