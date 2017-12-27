<?php
require_once 'cabecalho.php';
require_once 'logica-usuario.php';

verificaUsuario();

$produtoDao = new ProdutoDao($conexao);

$produtos = $produtoDao->listaProdutos();
?>

<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Desconto</th>
            <th scope="col">Categoria</th>
            <th scope="col">Usado</th>
            <th scope="col">Descrição</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($produtos as $produto) :
    ?>
        <tr>
            <td><?= $produto->getNome() ?></td>
            <td><?= $produto->getPreco() ?></td>
            <td><?= $produto->precoDesconto() ?></td>
            <td><?= $produto->getCategoria()->getNome() ?></td>
            <td style="font-size: 25px; font-weight: bold; text-align:center;"><?= $produto->isUsado() ? "•" : "" ?></td>
            <td><?= substr($produto->getDescricao(), 0, 30) ?></td>
            <td><a href="produto-edita-formulario.php?id=<?= $produto->getId() ?>" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="exclui-produto.php" method="post">
                    <input type="hidden" name="id" value="<?= $produto->getId() ?>">
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
    <?php
    endforeach
    ?>
    </tbody>
</table>

<?php require_once 'rodape.php'; ?>
