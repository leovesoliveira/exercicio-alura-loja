<?php include 'cabecalho.php'; ?>
<?php
    $nome = $_GET["nome"];
    $preco = $_GET["preco"];
?>

    <p>Produto <?php echo $nome; ?>, de valor R$ <?php echo $preco; ?>, adicionado com sucesso!</p>
<?php include 'rodape.php'; ?>
