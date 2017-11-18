<?php
require_once 'cabecalho.php';
require_once 'banco-produto.php';
require_once 'logica-usuario.php';

verificaUsuario();

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST["categoria_id"];
if (array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
}

if (insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) {
?>
<div class="alert alert-success text-center" role="alert">Produto <strong><?php echo $nome; ?></strong>, de valor R$ <strong><?php echo $preco; ?></strong>, adicionado com sucesso!</div>
<?php
} else {
    $msgError = mysqli_error($conexao);
?>
<div class="alert alert-danger text-center">Produto <strong><?php echo $nome; ?></strong> não foi adicionado: <strong><?php echo $msgError; ?></strong></div>
<?php
}
require_once 'rodape.php';
?>
