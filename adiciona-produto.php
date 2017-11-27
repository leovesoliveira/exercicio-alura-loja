<?php
require_once 'cabecalho.php';
require_once 'banco-produto.php';
require_once 'logica-usuario.php';
require_once 'class/Produto.php';
require_once 'class/Categoria.php';

verificaUsuario();
$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria = $categoria;
if (array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
}

$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);

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
