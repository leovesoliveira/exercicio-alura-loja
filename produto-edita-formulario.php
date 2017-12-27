<?php
require_once 'cabecalho.php';

$produtoDao = new ProdutoDao($conexao);
$categoriaDao = new CategoriaDao($conexao);

$id = $_GET['id'];
$produto = $produtoDao->buscaProduto($id);
$categorias = $categoriaDao->listaCategorias();
$selecao_usado = $produto->isUsado() ? "checked='checked'" : "";
$produto->setUsado($selecao_usado);

?>

<h1>Formulário de Cadastro</h1>

<form class="produto-edita-formulario" action="edita-produto.php" method="post">
    <input type="hidden" name="id" value="<?= $id ?>">

    <?php include 'produto-formulario-base.php'; ?>

    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>

<?php require_once 'rodape.php'; ?>
