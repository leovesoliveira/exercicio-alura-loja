<?php
class ProdutoDao {
    private $conexao;

    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function listaProdutos() {
        $produtos = array();
        $resultado = mysqli_query($this->conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p. categoria_id = c.id");

        while ($produto_array = mysqli_fetch_assoc($resultado)) {
            $tipoProduto = $produto_array['tipoProduto'];
            $produto_id = $produto_array['id'];
            $categoria_nome = $produto_array['categoria_nome'];

            $factory = new ProdutoFactory();
            $produto = $factory->criaPor($tipoProduto, $produto_array);
            $produto->atualizaBaseadoEm($produto_array);

            $produto->setId($produto_id);
            $produto->getCategoria()->setNome($categoria_nome);

            array_push($produtos, $produto);
        }

        return $produtos;
    }

    public function insereProduto(Produto $produto) {
        $cpi = "";
        if ($produto->temCpi()) {
            $cpi = $produto->getCpi();
        }

        $codigoChines = "";
        if ($produto->temCodigoChines()) {
            $codigoChines = $produto->getCodigoChines();
        }

        $codigoRusso = "";
        if ($produto->temCodigoRusso()) {
            $codigoRusso = $produto->getCodigoRusso();
        }

        $tipoProduto = get_class($produto);

        $nome = mysqli_real_escape_string($this->conexao, $produto->getNome());
        $preco = mysqli_real_escape_string($this->conexao, $produto->getPreco());
        $descricao = mysqli_real_escape_string($this->conexao, $produto->getDescricao());
        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado, cpi, tipoProduto, codigoChines, codigoRusso) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->isUsado()}, '{$cpi}', '{$tipoProduto}', '{$codigoChines}', '{$codigoRusso}')";

        return mysqli_query($this->conexao, $query);
    }

    public function editaProduto(Produto $produto) {
        $cpi = "";
        if ($produto->temCpi()) {
            $cpi = $produto->getCpi();
        }

        $codigoChines = "";
        if ($produto->temCodigoChines()) {
            $codigoChines = $produto->getCodigoChines();
        }

        $codigoRusso = "";
        if ($produto->temCodigoRusso()) {
            $codigoRusso = $produto->getCodigoRusso();
        }

        $tipoProduto = get_class($produto);

        $nome = mysqli_real_escape_string($this->conexao, $produto->getNome());
        $preco = mysqli_real_escape_string($this->conexao, $produto->getPreco());
        $descricao = mysqli_real_escape_string($this->conexao, $produto->getDescricao());
        $query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', categoria_id = {$produto->getCategoria()->getId()}, usado = {$produto->isUsado()}, cpi = '{$cpi}', tipoProduto = '{$tipoProduto}', codigoChines = '{$codigoChines}', codigoRusso = '{$codigoRusso}' where id = '{$produto->getId()}'";
        return mysqli_query($this->conexao, $query);
    }

    public function excluiProduto($id) {
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($this->conexao, $query);
    }

    public function buscaProduto($id) {
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        $produto_buscado = mysqli_fetch_assoc($resultado);

        $tipoProduto = $produto_buscado['tipoProduto'];
        $produto_id = $produto_buscado['id'];
        $categoria_id = $produto_buscado['categoria_id'];

        $factory = new ProdutoFactory();
        $produto = $factory->criaPor($tipoProduto, $produto_buscado);
        $produto->atualizaBaseadoEm($produto_buscado);

        $produto->setId($produto_id);
        $produto->getCategoria()->setId($categoria_id);

        return $produto;
    }
}
