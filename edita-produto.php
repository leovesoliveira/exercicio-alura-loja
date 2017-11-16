<?php
include 'cabecalho.php';
include 'conecta.php';
include 'banco-produto.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
if (array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
}

if (editaProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)) {
?>
<p class="text-success">Produto <?php echo $nome; ?> foi editado com sucesso!</p>
<?php
} else {
    $msgError = mysqli_error($conexao);
?>
<p class="text-danger">Não foi possível editar o produto <?php echo $nome; ?>: <?php echo $msgError; ?></p>
<?php
}
include 'rodape.php';
?>
