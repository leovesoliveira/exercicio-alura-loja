<?php
require_once 'cabecalho.php';
require_once 'banco-produto.php';
require_once 'logica-usuario.php';
require_once 'class/Produto.php';

verificaUsuario();

$produto = new Produto();
$produto->nome = $_POST["nome"];
$produto->preco = $_POST["preco"];
$produto->descricao = $_POST["descricao"];
$produto->categoria_id = $_POST["categoria_id"];
if (array_key_exists('usado', $_POST)) {
    $produto->usado = "true";
} else {
    $produto->usado = "false";
}

if (insereProduto($conexao, $produto)) {
?>
<div class="alert alert-success text-center" role="alert">Produto <strong><?php echo $produto->nome; ?></strong> adicionado com sucesso!</div>
<?php
} else {
    $msgError = mysqli_error($conexao);
?>
<div class="alert alert-danger text-center">Produto <strong><?php echo $produto->nome; ?></strong> não foi adicionado: <strong><?php echo $msgError; ?></strong></div>
<?php
}
require_once 'rodape.php';
?>
