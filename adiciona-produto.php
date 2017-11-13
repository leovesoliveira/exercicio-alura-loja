<?php
include 'cabecalho.php';
include 'conecta.php';

function insereProduto($conexao, $nome, $preco) {
    $query = "insert into produtos (nome, preco) values ('{$nome}', {$preco})";
    return mysqli_query($conexao, $query);
}

$nome = $_GET["nome"];
$preco = $_GET["preco"];

if (insereProduto($conexao, $nome, $preco)) {
?>
<p class="text-success">Produto <?ph   p echo $nome; ?>, de valor R$ <?php echo $preco; ?>, adicionado com sucesso!</p>
<?php
} else {
    $msgError = mysqli_error($conexao);
?>
<p class="text-danger">Produto <?php echo $nome; ?> não foi adicionado: <?php echo $msgError; ?></p>
<?php
}
include 'rodape.php';
?>
