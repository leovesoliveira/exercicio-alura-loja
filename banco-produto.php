<?php
require_once 'conecta.php';

function listaProdutos($conexao) {
    $produtos = array();
    $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p. categoria_id = c.id");

    while ($produto_array = mysqli_fetch_assoc($resultado)) {

        $nome = $produto_array['nome'];
        $preco = $produto_array['preco'];
        $categoria = new Categoria();
        $categoria->setNome($produto_array['categoria_nome']);
        $descricao = $produto_array['descricao'];
        $usado = $produto_array['usado'];

        $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
        $produto->setId($produto_array['id']);

        array_push($produtos, $produto);
    }

    return $produtos;
}

function insereProduto($conexao, Produto $produto) {
    $nome = mysqli_real_escape_string($conexao, $produto->getNome());
    $preco = mysqli_real_escape_string($conexao, $produto->getPreco());
    $descricao = mysqli_real_escape_string($conexao, $produto->getDescricao());
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->isUsado()})";
    return mysqli_query($conexao, $query);
}

function editaProduto($conexao, Produto $produto) {
    $nome = mysqli_real_escape_string($conexao, $produto->getNome());
    $preco = mysqli_real_escape_string($conexao, $produto->getPreco());
    $descricao = mysqli_real_escape_string($conexao, $produto->getDescricao());
    $query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', categoria_id = {$produto->getCategoria()->getId()}, usado = {$produto->isUsado()} where id = '{$produto->getId()}'";
    return mysqli_query($conexao, $query);
}

function excluiProduto($conexao, $id) {
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    $produto_buscado = mysqli_fetch_assoc($resultado);

    $id = $produto_buscado['id'];
    $nome = $produto_buscado['nome'];
    $preco = $produto_buscado['preco'];
    $descricao = $produto_buscado['descricao'];
    $categoria = new Categoria();
    $categoria->setId($produto_buscado['categoria_id']);
    $usado = $produto_buscado['usado'];

    $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);

    return $produto;
}
