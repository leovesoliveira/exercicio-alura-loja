<?php
include 'cabecalho.php';
include 'conecta.php';
include 'banco-categoria.php';
include 'logica-usuario.php';

verificaUsuario();

$categorias = listaCategorias($conexao);
?>

<h1>Formulário de Cadastro</h1>

<form class="produto-formulario" action="adiciona-produto.php" method="post">
    <div class="form-group row">
        <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome do Produto..." /><br/>
        </div>
    </div>

    <div class="form-group row">
        <label for="preco" class="col-sm-2 col-form-label">Preço:</label>
        <div class="col-sm-10">
            <input class="form-control" type="number" name="preco" id="preco" placeholder="Preço do Produto..." /><br/>
        </div>
    </div>

    <div class="form-group row">
        <label for="categorias" class="col-sm-2 col-form-label">Categorias:</label>
        <div class="col-sm-10">
            <select name="categoria_id" id="categorias" class="form-control">
            <?php foreach ($categorias as $categoria) : ?>
                <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
            <?php endforeach ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2">Usado:</label>
        <div class="col-sm-10">
            <label class="form-check-label">
                <input name="usado" class="form-check-input" type="checkbox" value="true" />
                Marque se for usado.
            </label>
        </div>
    </div>

    <div class="form-group row">
        <label for="descricao" class="col-sm-2 col-form-label">Descrição:</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="descricao" id="descricao" placeholder="Descrição do Produto..." /></textarea><br/>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </div>
</form>

<?php include 'rodape.php'; ?>
