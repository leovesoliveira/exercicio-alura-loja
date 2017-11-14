<?php
include 'conecta.php';
include 'banco-produto.php';

$id = $_POST['id'];
excluiProduto($conexao, $id);

header("Location: produto-lista.php?excluido=true");
die();
