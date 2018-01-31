<?php
require_once 'cabecalho.php';
require_once 'class/Produto.php';
require_once 'class/Categoria.php';

$tipoProduto = $_POST['tipoProduto'];
$produto_id = $_POST['id'];
$categoria_id = $_POST['categoria_id'];

$factory = new ProdutoFactory();
$produto = $factory->criaPor($tipoProduto, $_POST);
$produto->atualizaBaseadoEm($_POST);

$produto->setId($produto_id);
$produto->getCategoria()->setId($categoria_id);

if (array_key_exists('usado', $_POST)) {
    $produto->isUsado("true");
} else {
    $produto->isUsado("false");
}

$produtoDao = new ProdutoDao($conexao);

if ($produtoDao->editaProduto($produto)) {
?>
<div class="alert alert-success text-center" role="alert">Produto <strong><?= $produto->getNome(); ?></strong> foi editado com sucesso!</div>
<?php
} else {
    $msgError = mysqli_error($produtoDao->conexao);
?>
<p class="text-danger">Não foi possível editar o produto <?= $produto->getNome(); ?>: <?= $msgError; ?></p>
<?php
}
require_once 'rodape.php';
?>
