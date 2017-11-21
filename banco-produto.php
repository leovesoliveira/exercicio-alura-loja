<?php
require_once 'conecta.php';
require_once 'class/Produto.php';

function listaProdutos($conexao) {
    $produtos = array();
    $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p. categoria_id = c.id");

    while ($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }

    return $produtos;
}

function insereProduto($conexao, Produto $produto) {
    $nome = mysqli_real_escape_string($conexao, $produto->nome);
    $preco = mysqli_real_escape_string($conexao, $produto->preco);
    $descricao = mysqli_real_escape_string($conexao, $produto->descricao);
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$produto->nome}', {$produto->preco}, '{$produto->descricao}', {$produto->categoria_id}, {$produto->usado})";
    return mysqli_query($conexao, $query);
}

function editaProduto($conexao, Produto $produto) {
    $nome = mysqli_real_escape_string($conexao, $produto->nome);
    $preco = mysqli_real_escape_string($conexao, $produto->preco);
    $descricao = mysqli_real_escape_string($conexao, $produto->descricao);
    $query = "update produtos set nome = '{$produto->nome}', preco = {$produto->preco}, descricao = '{$produto->descricao}', categoria_id = {$produto->categoria_id}, usado = {$produto->usado} where id = '{$produto->id}'";
    return mysqli_query($conexao, $query);
}

function excluiProduto($conexao, $id) {
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}
