<div class="form-group row">
    <label for="nome" class="col-sm-2 col-form-label">Nome:</label>

    <div class="col-sm-10">
        <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome do Produto..." value="<?= $produto->getNome() ?>" /><br/>
    </div>
</div>

<div class="form-group row">
    <label for="preco" class="col-sm-2 col-form-label">Preço:</label>

    <div class="col-sm-10">
        <input class="form-control" type="number" name="preco" id="preco" placeholder="Preço do Produto..." value="<?= $produto->getPreco() ?>" /><br/>
    </div>
</div>

<div class="form-group row">
    <label for="categorias" class="col-sm-2 col-form-label">Categorias:</label>

    <div class="col-sm-10">
        <select name="categoria_id" id="categorias" class="form-control">
        <?php foreach ($categorias as $categoria) :
            $categoriaSelecionada = $produto->getCategoria()->getId() == $categoria->getId();
            $selecionada = $categoriaSelecionada ? "selected='selected'" : "";
        ?>
            <option value="<?= $categoria->getId() ?>" <?= $selecionada ?>><?= $categoria->getNome() ?></option>
        <?php endforeach ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2">Usado:</label>

    <div class="col-sm-10">
        <label class="form-check-label">
            <input name="usado" class="form-check-input" type="checkbox" value="true" <?= $produto->isUsado() ?> />
            Marque se for usado.
        </label>
    </div>
</div>

<div class="form-group row">
    <label for="tipoProduto" class="col-sm-2 col-form-label">Tipo:</label>

    <div class="col-sm-10">
        <select name="tipoProduto" id="tipoProduto" class="form-control">
        <?php
        $tipos = array("Importado China", "Importado Russia");
        foreach ($tipos as $tipo) :
            $tipoSemEspaco = str_replace(' ', '', $tipo);
            $esseEhOTipo = get_class($produto) == $tipoSemEspaco;
            $selecaoTipo = $esseEhOTipo ? "selected='selected'" : "";
        ?>
            <option value="<?= $tipoSemEspaco ?>" <?= $selecaoTipo ?>>
                <?= $tipo ?>                    
            </option>
        <?php endforeach ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="cpi" class="col-sm-2 col-form-label">CPI:<br /><span style="font-size:12px;">(Caso seja Importado)</span></label>

    <div class="col-sm-10">
        <input class="form-control" type="text" name="cpi" id="cpi" placeholder="CPI..." value="<?php if ($produto->temCpi()) { echo $produto->getCpi(); } ?>" /><br/>
    </div>
</div>

<div class="form-group row">
    <label for="codigoChines" class="col-sm-2 col-form-label">Código Chinês:<br /><span style="font-size:12px;">(Caso seja Importado da China)</span></label>

    <div class="col-sm-10">
        <input class="form-control" type="text" name="codigoChines" id="codigoChines" placeholder="Código Chinês..." value="<?php if ($produto->temCodigoChines()) { echo $produto->getCodigoChines(); } ?>" /><br/>
    </div>
</div>

<div class="form-group row">
    <label for="codigoRusso" class="col-sm-2 col-form-label">Código Russo:<br /><span style="font-size:12px;">(Caso seja Importado da Russia)</span></label>

    <div class="col-sm-10">
        <input class="form-control" type="text" name="codigoRusso" id="codigoRusso" placeholder="Código Russo..." value="<?php if ($produto->temCodigoRusso()) { echo $produto->getCodigoRusso(); } ?>" /><br/>
    </div>
</div>

<div class="form-group row">
    <label for="descricao" class="col-sm-2 col-form-label">Descrição:</label>

    <div class="col-sm-10">
        <textarea class="form-control" name="descricao" id="descricao" placeholder="Descrição do Produto..." /><?= $produto->getDescricao() ?></textarea><br/>
    </div>
</div>
