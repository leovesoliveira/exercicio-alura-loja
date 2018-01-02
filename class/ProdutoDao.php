<?php
class ProdutoDao {
    private $conexao;

    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function listaProdutos() {
        $produtos = array();
        $resultado = mysqli_query($this->conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p. categoria_id = c.id");

        while ($produto_array = mysqli_fetch_assoc($resultado)) {
            $categoria = new Categoria();
            $categoria->setNome($produto_array['categoria_nome']);

            $produto_id = $produto_array['id'];
            $nome = $produto_array['nome'];
            $preco = $produto_array['preco'];
            $descricao = $produto_array['descricao'];
            $usado = $produto_array['usado'];
            $cpi = $produto_array['cpi'];
            $tipoProduto = $produto_array['tipoProduto'];

            if ($tipoProduto == "Importado") {
                $produto = new Importado($nome, $preco, $descricao, $categoria, $usado);
                $produto->setCpi($cpi);
            } else {
                $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
            }

            $produto->setId($produto_id);

            array_push($produtos, $produto);
        }

        return $produtos;
    }

    function insereProduto(Produto $produto) {
        $cpi = "";
        if ($produto->temCpi()) {
            $cpi = $produto->getCpi();
        }

        $tipoProduto = get_class($produto);

        $nome = mysqli_real_escape_string($this->conexao, $produto->getNome());
        $preco = mysqli_real_escape_string($this->conexao, $produto->getPreco());
        $descricao = mysqli_real_escape_string($this->conexao, $produto->getDescricao());
        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado, cpi, tipoProduto) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->isUsado()}, '{$cpi}', '{$tipoProduto}')";
        return mysqli_query($this->conexao, $query);
    }

    function editaProduto(Produto $produto) {
        $cpi = "";
        if ($produto->temCpi()) {
            $cpi = $produto->getCpi();
        }

        $tipoProduto = get_class($produto);

        $nome = mysqli_real_escape_string($this->conexao, $produto->getNome());
        $preco = mysqli_real_escape_string($this->conexao, $produto->getPreco());
        $descricao = mysqli_real_escape_string($this->conexao, $produto->getDescricao());
        $query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', categoria_id = {$produto->getCategoria()->getId()}, usado = {$produto->isUsado()}, cpi = '{$cpi}', tipoProduto = '{$tipoProduto}' where id = '{$produto->getId()}'";
        return mysqli_query($this->conexao, $query);
    }

    function excluiProduto($id) {
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($this->conexao, $query);
    }

    function buscaProduto($id) {
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        $produto_buscado = mysqli_fetch_assoc($resultado);

        $categoria = new Categoria();
        $categoria->setId($produto_buscado['categoria_id']);

        $produto_id = $produto_buscado['id'];
        $nome = $produto_buscado['nome'];
        $preco = $produto_buscado['preco'];
        $descricao = $produto_buscado['descricao'];
        $usado = $produto_buscado['usado'];
        $cpi = $produto_buscado['cpi'];
        $tipoProduto = $produto_buscado['tipoProduto'];

        if ($tipoProduto == "Importado") {
            $produto = new Importado($nome, $preco, $descricao, $categoria, $usado);
            $produto->setCpi($cpi);
        } else {
            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
        }

        $produto->setId($produto_id);

        return $produto;
    }
}
