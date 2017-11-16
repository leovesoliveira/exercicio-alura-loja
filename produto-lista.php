<?php
include 'cabecalho.php';
include 'conecta.php';
include 'banco-produto.php';

$produtos = listaProdutos($conexao);

if (array_key_exists("excluido", $_GET) && $_GET['excluido'] == true) :
?>
    <p class="alert-success">Produto removido com sucesso!</p>
<?php
endif
?>

<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Categoria</th>
            <th scope="col">Descrição</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($produtos as $produto) :
    ?>
        <tr>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td><?= $produto['categoria_nome'] ?></td>
            <td><?= substr($produto['descricao'], 0, 30) ?></td>
            <td>
                <form action="exclui-produto.php" method="post">
                    <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
    <?php
    endforeach
    ?>
    </tbody>
</table>

<?php include 'rodape.php'; ?>
