<?php
include 'cabecalho.php';
include 'conecta.php';
include 'banco-produto.php';

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];

if (insereProduto($conexao, $nome, $preco, $descricao)) {
?>
<p class="text-success">Produto <?php echo $nome; ?>, de valor R$ <?php echo $preco; ?>, adicionado com sucesso!</p>
<?php
} else {
    $msgError = mysqli_error($conexao);
?>
<p class="text-danger">Produto <?php echo $nome; ?> não foi adicionado: <?php echo $msgError; ?></p>
<?php
}
include 'rodape.php';
?>
