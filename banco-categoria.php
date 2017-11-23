<?php
require_once 'conecta.php';
require_once 'class/Categoria.php';

function listaCategorias($conexao) {
    $categorias = array();
    $resultado = mysqli_query($conexao, "select * from categorias");

    while ($categoria_array = mysqli_fetch_assoc($resultado)) {
        $categoria = new Categoria();
        $categoria->id = $categoria_array['id'];
        $categoria->nome = $categoria_array['nome'];

        array_push($categorias, $categoria);
    }

    return $categorias;
}
