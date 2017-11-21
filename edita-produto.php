<?php
require_once 'cabecalho.php';
require_once 'banco-produto.php';
require_once 'class/Produto.php';

$produto = new Produto();
$produto->id = $_POST['id'];
$produto->nome = $_POST['nome'];
$produto->preco = $_POST['preco'];
$produto->descricao = $_POST['descricao'];
$produto->categoria_id = $_POST['categoria_id'];
if (array_key_exists('usado', $_POST)) {
    $produto->usado = "true";
} else {
    $produto->usado = "false";
}

if (editaProduto($conexao, $produto)) {
?>
<div class="alert alert-success text-center" role="alert">Produto <strong><?php echo $produto->nome; ?></strong> foi editado com sucesso!</div>
<?php
} else {
    $msgError = mysqli_error($conexao);
?>
<p class="text-danger">Não foi possível editar o produto <?php echo $produto->nome; ?>: <?php echo $msgError; ?></p>
<?php
}
require_once 'rodape.php';
?>
