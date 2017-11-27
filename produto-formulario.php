<?php
require_once 'cabecalho.php';
require_once 'banco-categoria.php';
require_once 'logica-usuario.php';
require_once 'class/Produto.php';
require_once 'class/Categoria.php';

verificaUsuario();

$categoria = new Categoria();
$categoria->setId(1);

$produto = new Produto();
$produto->setCategoria($categoria);

$categorias = listaCategorias($conexao);
?>

<h1>Formulário de Cadastro</h1>

<form class="produto-formulario" action="adiciona-produto.php" method="post">
    <?php include 'produto-formulario-base.php'; ?>

    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</form>

<?php require_once 'rodape.php'; ?>
