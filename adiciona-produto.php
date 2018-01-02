<?php
require_once 'cabecalho.php';
require_once 'logica-usuario.php';
require_once 'class/Produto.php';
require_once 'class/Categoria.php';

verificaUsuario();
$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$cpi = $_POST["cpi"];
$tipoProduto = $_POST["tipoProduto"];

if (array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
}

if ($tipoProduto == "Importado") {
    $produto = new Importado($nome, $preco, $descricao, $categoria, $usado);
    $produto->setCpi($cpi);
} else {
    $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
}


$produtoDao = new ProdutoDao($conexao);

if ($produtoDao->insereProduto($produto)) {
?>
<div class="alert alert-success text-center" role="alert">Produto <strong><?= $produto->getNome(); ?></strong> adicionado com sucesso!</div>
<?php
} else {
    $msgError = mysqli_error($produtoDao->conexao);
?>
<div class="alert alert-danger text-center">Produto <strong><?= $produto->getNome(); ?></strong> não foi adicionado: <strong><?= $msgError; ?></strong></div>
<?php
}
require_once 'rodape.php';
?>
