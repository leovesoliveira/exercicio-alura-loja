<?php include 'cabecalho.php'; ?>
    <h1>Formulário de Cadastro</h1>

    <form class="produto-formulario" action="adiciona-produto.php">
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
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
    </form>
<?php include 'rodape.php'; ?>
