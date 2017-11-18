<?php
include 'cabecalho.php';
include 'conecta.php';
include 'banco-categoria.php';
include 'logica-usuario.php';

verificaUsuario();

$produto = array("nome" => "", "preco" => "", "categoria_id" => "1", "descricao" => "",);
$usado = "";
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

<?php include 'rodape.php'; ?>
