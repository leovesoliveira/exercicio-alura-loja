<div class="form-group row">
    <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome do Produto..." value="<?= $produto['nome'] ?>" /><br/>
    </div>
</div>

<div class="form-group row">
    <label for="preco" class="col-sm-2 col-form-label">Preço:</label>
    <div class="col-sm-10">
        <input class="form-control" type="number" name="preco" id="preco" placeholder="Preço do Produto..." value="<?= $produto['preco'] ?>" /><br/>
    </div>
</div>

<div class="form-group row">
    <label for="categorias" class="col-sm-2 col-form-label">Categorias:</label>
    <div class="col-sm-10">
        <select name="categoria_id" id="categorias" class="form-control">
        <?php foreach ($categorias as $categoria) :
            $categoriaSelecionada = $produto['categoria_id'] == $categoria['id'];
            $selecionada = $categoriaSelecionada ? "selected='selected'" : "";
        ?>
            <option value="<?= $categoria['id'] ?>" <?= $selecionada ?>><?= $categoria['nome'] ?></option>
        <?php endforeach ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2">Usado:</label>
    <div class="col-sm-10">
        <label class="form-check-label">
            <input name="usado" class="form-check-input" type="checkbox" value="true" <?= $usado ?> />
            Marque se for usado.
        </label>
    </div>
</div>

<div class="form-group row">
    <label for="descricao" class="col-sm-2 col-form-label">Descrição:</label>
    <div class="col-sm-10">
        <textarea class="form-control" name="descricao" id="descricao" placeholder="Descrição do Produto..." /><?= $produto['descricao'] ?></textarea><br/>
    </div>
</div>