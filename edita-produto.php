<?php
require_once 'cabecalho.php';
require_once 'banco-produto.php';
require_once 'class/Produto.php';
require_once 'class/Categoria.php';

$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);

$produto = new Produto();
$produto->setId($_POST['id']);
$produto->setNome($_POST['nome']);
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);
$produto->setCategoria($categoria);
if (array_key_exists('usado', $_POST)) {
    $produto->setUsado("true");
} else {
    $produto->setUsado("false");
}

if (editaProduto($conexao, $produto)) {
?>
<div class="alert alert-success text-center" role="alert">Produto <strong><?= $produto->getNome(); ?></strong> foi editado com sucesso!</div>
<?php
} else {
    $msgError = mysqli_error($conexao);
?>
<p class="text-danger">Não foi possível editar o produto <?= $produto->getNome(); ?>: <?= $msgError; ?></p>
<?php
}
require_once 'rodape.php';
?>
