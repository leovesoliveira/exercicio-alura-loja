<?php
include 'cabecalho.php';

$nome = $_GET["nome"];
$preco = $_GET["preco"];

$query = "insert into produtos (nome, preco) values ('{$nome}', {$preco})";
$conexao = mysqli_connect('localhost', 'root', '', 'loja');

if (mysqli_query($conexao, $query)) {
?>
<p class="text-success">Produto <?ph   p echo $nome; ?>, de valor R$ <?php echo $preco; ?>, adicionado com sucesso!</p>
<?php
} else {
?>
<p class="text-danger">Produto <?php echo $nome; ?> não foi adicionado!</p>
<?php
}
include 'rodape.php';
?>
