<?php
require_once 'cabecalho.php';
require_once 'class/Produto.php';
require_once 'class/Categoria.php';

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);
$descricao = $_POST['descricao'];
if (array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
}

$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
$produto->setId($_POST['id']);

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
