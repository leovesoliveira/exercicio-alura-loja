<?php
include 'cabecalho.php';
include 'conecta.php';
include 'banco-categoria.php';
include 'banco-produto.php';

$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
$categorias = listaCategorias($conexao);
$usado = $produto['usado'] ? "checked='checked'" : "";
?>

<h1>Formulário de Cadastro</h1>

<form class="produto-edita-formulario" action="edita-produto.php" method="post">
    <input type="hidden" name="id" value="<?= $produto['id'] ?>">
    
    <?php include 'produto-formulario-base.php'; ?>

    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>

<?php include 'rodape.php'; ?>
