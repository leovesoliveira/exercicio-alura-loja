<?php
require_once 'cabecalho.php';
require_once 'logica-usuario.php';
require_once 'class/Produto.php';
require_once 'class/Categoria.php';

verificaUsuario();

$tipoProduto = $_POST['tipoProduto'];
$categoria_id = $_POST['categoria_id'];

$factory = new ProdutoFactory();
$produto = $factory->criaPor($tipoProduto, $_POST);
$produto->atualizaBaseadoEm($_POST);

$produto->getCategoria()->setId($categoria_id);

if (array_key_exists('usado', $_POST)) {
    $produto->setUsado("true");
} else {
    $produto->isUsado("false");
}

$produtoDao = new ProdutoDao($conexao);

if ($produtoDao->insereProduto($produto)) {
?>
<div class="alert alert-success text-center" role="alert">Produto <strong><?= $produto->getNome(); ?></strong> adicionado com sucesso!</div>
<?php
} else {
    $msgError = mysqli_error($produtoDao->getConexao());
?>
<div class="alert alert-danger text-center">Produto <strong><?= $produto->getNome(); ?></strong> não foi adicionado: <strong><?= $msgError; ?></strong></div>
<?php
}
require_once 'rodape.php';
?>
