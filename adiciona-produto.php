<?php
require_once 'cabecalho.php';
require_once 'banco-produto.php';
require_once 'logica-usuario.php';
require_once 'class/Produto.php';
require_once 'class/Categoria.php';

verificaUsuario();

$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);

$produto = new Produto();
$produto->setNome($_POST["nome"]);
$produto->setPreco($_POST["preco"]);
$produto->setDescricao($_POST["descricao"]);
$produto->setCategoria($categoria);
if (array_key_exists('usado', $_POST)) {
    $produto->setUsado("true");
} else {
    $produto->setUsado("false");
}

if (insereProduto($conexao, $produto)) {
?>
<div class="alert alert-success text-center" role="alert">Produto <strong><?= $produto->getNome(); ?></strong> adicionado com sucesso!</div>
<?php
} else {
    $msgError = mysqli_error($conexao);
?>
<div class="alert alert-danger text-center">Produto <strong><?= $produto->getNome(); ?></strong> não foi adicionado: <strong><?= $msgError; ?></strong></div>
<?php
}
require_once 'rodape.php';
?>
