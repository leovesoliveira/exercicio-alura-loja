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
    <?php
    foreach ($produtos as $produto) :
    ?>
        <tr>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['preco'] ?></td>
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
</table>

<?php include 'rodape.php'; ?>
