<?php
require_once 'cabecalho.php';
require_once 'banco-categoria.php';
require_once 'banco-produto.php';

$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
$categorias = listaCategorias($conexao);
$selecao_usado = $produto->usado ? "checked='checked'" : "";
$produto->usado = $selecao_usado;
?>

<h1>Formulário de Cadastro</h1>

<form class="produto-edita-formulario" action="edita-produto.php" method="post">
    <input type="hidden" name="id" value="<?= $produto->id ?>">

    <?php include 'produto-formulario-base.php'; ?>

    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>

<?php require_once 'rodape.php'; ?>
